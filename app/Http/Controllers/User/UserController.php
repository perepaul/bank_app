<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\OTP;
use Illuminate\Http\Request;
use App\User;
use App\Transfer;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validator::make($request->all(),)
        $user_name = $request->username;
        $password = $request->password;

        $user = User::where('is_admin',0)
        ->where('email',$user_name)
        ->orWhere('account_id', $user_name)
        ->orWhere('account_number',$user_name)
        ->first();

        if(!$user)
        {
            return redirect()->back()->with(['username'=>'We were unable to find your account']);
        }

        if(auth()->attempt(['email'=>$user->email,'password'=>$password]))
        {
            return redirect()->to('/dashboard');
        }
    }

    public function transfer()
    {
        return view('user_dashboard.transfer');
    }

    public function makeTransfer(Request $request)
    {

        $user = User::find(auth()->user()->id);
        foreach($request->all() as $key => $val){
            if($val == "" or $val == null){
                return response()->json([
                    "success"=>false,
                    "message"=>"One or more fields are empty",
                ],400);
            }
        }
        if($user->status > 1)
        {
            return response()->json([
                "success"=>false,
                "message"=>"Unknown error, please contact us through our website",
            ],400);
        }
        if($request->amount > $user->balance){

            // dd($user->balance);
            return response()->json([
                "success"=>false,
                "message"=>"Insufficient Funds",
            ],400);
        }

        return response()->json([
            "success"=>true,
            "message"=>"Transfer is valid",
        ],200);

    }


    public function sendOtp(Request $request)
    {
        $data =  $this->getAuthToken();

        $user = User::find(auth()->user()->id);

        $token = rand(0,9).rand(0,9).rand(0,9).rand(0,9);
        $expires_at = Carbon::now()->addMinutes(3);
        $otp = new OTP(['token'=>$token,'expires_at'=>$expires_at]);
        if($user->otp)
        {
            $user->otp()->delete();
        }
        $user->otp()->save($otp);

        // dd(Carbon::now()->format('U') == $expires_at->format('U')?'true':'false');

        $param = [
            'body'=>'You\'re about to transfer '.$request->amount.' to '.$request->name.' use '.$token.' to authorize transfer',
            'to'=>$user->phone_number
        ];


        if($data['success']){

            $curl = curl_init();    
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connect.routee.net/sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($param),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$data['access_token'],
                "content-type: application/json"
            ),
            ));    
            $response = curl_exec($curl);
            $err = curl_error($curl);    
            curl_close($curl);
            
            $response = json_decode($response,true);

            $bad_status = array('400001009','400005000','400000000','403000000');

            if ($err) {
                return response()->json([
                    'success'=>false,
                    'message'=>'We were unable to connect to your phone, try again'
                ]);

            } else if(isset($response['code'])){

                if(in_array($response['code'],$bad_status)){
                    return response()->json([
                        'success'=>false,
                        'message'=>'We were unable to connect to your phone, try again'
                    ]);
                }
            }
        }

        return response()->json([
            'success'=>true,
            'message'=>'Enter Token sent to phone'
        ],200);

    }


    public function sendAccountBalance($transfer)
    {
        $data =  $this->getAuthToken();

        $user = User::find(auth()->user()->id);
        $balance = $user->balance;
        $first_3 = substr($user->account_number,0,3);
        $last_3 = substr($user->account_number,-3);

        $acct = $first_3.'xxxx'.$last_3;
        $msg = "Transfer from ".$acct." To ".$transfer->reciepient_name." on ".$transfer->created_at." was successful. Avail. Bal. $".$balance;
        $param = array(
            'body'=>$msg,
            'to'=>$user->phone_number
        );

        $curl = curl_init();    
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://connect.routee.net/sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($param),
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$data['access_token'],
                "content-type: application/json"
            ),
            ));    
            $response = curl_exec($curl);
            $err = curl_error($curl);    
            curl_close($curl);
            
            $response = json_decode($response,true);

            // $bad_status = array('400001009','400005000','400000000','403000000');

            // if ($err) {
            //     return response()->json([
            //         'success'=>false,
            //         'message'=>'We were unable to connect to your phone, try again'
            //     ]);

            // } else if(isset($response['code'])){

            //     if(in_array($response['code'],$bad_status)){
            //         return response()->json([
            //             'success'=>false,
            //             'message'=>'We were unable to connect to your phone, try again'
            //         ]);
            //     }
            // }
        

    }

    public function getAuthToken()
    {
       $auth = base64_encode(config('routee.app_id').':'.config('routee.app_secret'));

       $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://auth.routee.net/oauth/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "grant_type=client_credentials",
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic {$auth}",
            "content-type: application/x-www-form-urlencoded"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        return ['success'=>false,'access_token'=>null];
        } else {
            $response =  json_decode($response,true);
        return ['success'=>true,'access_token'=>$response['access_token']];
        }

    }


    public function validateOtp(Request $request)
    {

        $user = User::find(auth()->user()->id);

        $expires_at = $user->otp->expires_at;
        if($request->token !== $user->otp->token)
        {
            return response()->json([
                'success'=>false,
                'message'=>'Invalid Token'
            ]);
        }

        if(Carbon::now()->format('U') > $expires_at->format('U'))
        {
            return response()->json([
                'success'=>false,
                'message'=>'Token Expired'
            ]);
        }

        $data = $request->except('_token','token');
        $data['reference'] = Str::limit(uniqid(),10,'');
        $transfer = new Transfer($data);


        $user->balance -= $request->amount;
        $trans = $user->transfers()->save($transfer);
        $user->save();

        $this->sendAccountBalance($trans);


        

        return response()->json([
            'success'=>true,
            'message'=>'transfer successful'
        ],200);
        
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $transfers = $user->transfers();
        $latest_transactions = $transfers->orderBy('id','Desc')->take(10)->get();
        $user_last_five_transfers = $transfers->orderBy('id','Desc')->take(5)->get();

        $user_last_transtaction_amount =$transfers->orderBy('id','Desc')->take(1)->pluck('amount');
        if($user_last_transtaction_amount->isEmpty())
        {
            $user_last_transtaction_amount = 0;
        }else{
            $user_last_transtaction_amount = $user_last_transtaction_amount[0];
        }

        // dd((int) $user_last_transtaction_amount);



        // dd($user_last_transtaction_amount);
        // $user_last_transaction_amount = $user
        return view('user_dashboard.index',compact('latest_transactions','user_last_five_transfers','user_last_transtaction_amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transfers()
    {
        $user = User::find(auth()->user()->id);
       $transfers =  $user->transfers()->paginate(5);
       return view('user_dashboard.transfers',compact('transfers'));
    }



    public function statement()
    {
        $user = User::find(auth()->user()->id);
       $transfers =  $user->transfers()->paginate(10);
       return view('user_dashboard.statement',compact('transfers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['visible_password'] = $request->password;
        $data['is_admin'] = 0;
        if($request->hasFile('image')){
            $data['image'] = $file_name = uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path().'/profile_images', $file_name);

            // $request->file('image')->storeAs('/profile_images', $file_name,'public');
        }
        $check = User::create($data);

        session()->flash('message','User Created Successfully');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->except('_token');
        $data['visible_password'] = $request->password;
        if($request->hasFile('image') && $request->file('image')){
            $data['image'] = $file_name = uniqid().'.'.$request->file('image')->extension()?? $user->image;
            $request->file('image')->move(public_path().'/profile_images', $file_name);
            // $request->file('image')->storeAs('/profile_images', $file_name,'public');
        }
        $check = $user->update($data);

        session()->flash('message','User Created Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $last_part = explode('/',$user->image);
        if(end($last_part) != 'default.png'){
            unlink('storage/profile_images/'.end($last_part));
        }

        $user->delete();
        return redirect()->back();

    }
}
