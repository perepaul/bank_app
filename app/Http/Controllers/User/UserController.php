<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transfer;
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
        }else{
            $user->balance -= $request->amount;
            $user->save();
        }

        $data = $request->except('_token');
        $data['reference'] = Str::limit(uniqid(),10,'');
        $transfer = new Transfer($data);

        $user->transfers()->save($transfer);
        // Transfer::create($request->except('_token'));
        return response()->json([
            "success"=>true,
            "message"=>"Transfer Successful",
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

        $user_last_transtaction_amount = substr($transfers->orderBy('id','Desc')->take(1)->pluck('amount')[0],1);
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
        $data['image'] = $file_name = uniqid().'.'.$request->file('image')->extension();
        $check = User::create($data);
        if($check && $request->hasFile('image')){
            $request->file('image')->storeAs('/profile_images', $file_name,'public');
        }
        
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
            $request->file('image')->storeAs('/profile_images', $file_name,'public');
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
        //
    }
}
