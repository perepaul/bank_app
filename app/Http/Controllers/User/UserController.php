<?php

namespace App\Http\Controllers\User;

use App\OTP;
use App\User;
use App\Transfer;
use Carbon\Carbon;
use App\Helpers\Sms;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TokenMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $sms;

    public function __construct()
    {
        $this->sms = new Sms();
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validator::make($request->all(),)
        $user_name = $request->username;
        $password = $request->password;

        $user = User::where('is_admin', 0)
            ->where('email', $user_name)
            ->orWhere('account_id', $user_name)
            ->orWhere('account_number', $user_name)
            ->first();
        // dd($user);
        if (!$user) {
            return redirect()->back()->with(['username' => 'We were unable to find your account']);
        }

        if (auth()->attempt(['email' => $user->email, 'password' => $password])) {
            // $user = auth()->user();
            // auth()->logout();
            // session()->put('2fa-user', $user);
            // return redirect()->route('2fa')->with('user', $user);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('username', 'invalid login details');
        }
    }

    public function twofactor()
    {
        $this->middleware('guest');
        $user = session()->get('2fa-user');
        if (!$user) {
            return redirect()->route('login');
        }

        $this->twoFactorOtp($user);

        return view('auth.2fa', ['user' => $user]);
    }

    private function twoFactorOtp($user)
    {
        $token = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $expires_at = Carbon::now()->addMinutes(3);
        $otp = new OTP(['token' => $token, 'expires_at' => $expires_at]);
        if ($user->otp) {
            $user->otp()->delete();
        }
        $user->otp()->save($otp);
        $res = $this->sendMessage([
            'to' => $user,
            'from' => '5TH 3RD SMS',
            'body' => "Your otp is <strong>{$token}</strong>. Do not share this code with anybody.",
            'subject' => 'Please verify your action'
        ]);
    }

    private function validateTwoFactorOtp($user, $token)
    {
        $expires_at = $user->otp->expires_at;
        if ($token !== $user->otp->token) {
            return redirect()->back()->withErrors(['token' => 'Invalid Token. We have resent a new token']);
        }

        if (Carbon::now()->format('U') > $expires_at->format('U')) {
            return redirect()->back()->withErrors(['token' => 'Token expired. We have resent a new token']);
        }
        if ($user->is(session()->get('2fa-user'))) {
            auth()->login($user);
            $param = [
                'body' => 'There was a successful log in on your account on ' . now()->format('d/m/Y H:s, e'),
                'to' => $user,
                'from' => '5TH 3RD SMS',
                'subject' => 'Login Alert on your account.'
            ];

            $res = $this->sendMessage($param);
            session()->forget('2fa-user');

            return redirect()->to('/dashboard');
        }
        return redirect()->to('/login');
    }
    public function twofactorauth(Request $request, $id)
    {
        if (auth()->check() && auth()->user()->is_admin == 0) {
            return redirect()->to('/dashboard', 302);
        }
        $request->validate([
            'token' => 'required|string'
        ]);
        $user = User::findOrFail($id);
        return $this->validateTwoFactorOtp($user, $request->token);
    }

    public function transfer()
    {
        return view('user_dashboard.transfer');
    }

    public function makeTransfer(Request $request)
    {

        // dd($request->all());
        $user = User::find(auth()->user()->id);
        foreach ($request->all() as $key => $val) {
            if ($val == "" or $val == null) {
                return response()->json([
                    "success" => false,
                    'title' => 'Validation failed',
                    "message" => "One or more fields are empty",
                ], 400);
            }
        }
        if ($user->status == 2) {
            $param = [
                'body' => 'Account is in-active, contact us on our website or send us an email to rectify.',
                'to' => $user,
                'from' => '5TH 3RD SMS',
                'subject' => 'Your account is in-active'
            ];
            $res = $this->sendMessage($param);
            return response()->json([
                "success" => false,
                "title" => "Acount is in-active",
                "message" => "Your account is in-active, contact us on our website or send us an email to rectify",
            ], 400);
        }
        if ($user->status == 3) {
            $param = [
                'body' => 'Account on hold, contact us on our website or send us an email to rectify',
                'to' => $user,
                'from' => '5TH 3RD SMS',
                'subject' => 'Your account is on hold'
            ];
            $res = $this->sendMessage($param);
            return response()->json([
                "success" => false,
                "title" => "Acount on hold",
                "message" => "Kindly Contact us to rectify issues on your account",
            ], 400);
        }
        if ($request->amount > $user->balance) {
            $param = [
                'body' => 'You don\'t have enough funds to complete the transaction.',
                'to' => $user,
                'from' => '5TH 3RD SMS',
                'subject' => 'Insufficient Funds'
            ];
            $res = $this->sendMessage($param);



            return response()->json([
                "success" => false,
                "message" => "Insufficient Funds",
            ], 400);
        }

        return response()->json([
            "success" => true,
            "message" => "Transfer is valid",
        ], 200);
    }


    public function sendOtp(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $token = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
        $expires_at = Carbon::now()->addMinutes(3);
        $otp = new OTP(['token' => $token, 'expires_at' => $expires_at]);
        if ($user->otp) {
            $user->otp()->delete();
        }
        $user->otp()->save($otp);

        // dd(Carbon::now()->format('U') == $expires_at->format('U')?'true':'false');

        $param = [
            'body' => 'You\'re about to transfer ' . $request->amount . ' to ' . $request->name . ' use <strong>' . $token . '</strong> to authorize transfer',
            'to' => $user,
            'from' => '5TH 3RD SMS',
            'subject' => 'Transfer Confirmation.'
        ];


        $res = $this->sendMessage($param);

        if (!$res['success']) {
            return response()->json($res, 400);
        }


        return response()->json($res, 200);
    }

    private function sendMessage($param)
    {
        $to = $param['to'];
        $body = $param['body'];
        $subject = $param['subject'];
        $sms = str_replace('<strong>','',$body);
        $sms = str_replace('</strong>','',$sms);
        // $response = $this->sms->sendSms($to->phone_number, $sms);


        // if (!$response) {
        //     return [
        //         'success' => false,
        //         'message' => 'We were unable to connect to your phone, try again'
        //     ];
        // }

        Mail::to($to->email)->send(new TokenMailable($body,$subject,$to));

        return [
            'success' => true,
            'message' => 'Enter Token sent to your email'
        ];
    }


    public function sendAccountBalance($transfer)
    {

        $user = User::find(auth()->user()->id);
        $balance = $user->balance;
        $first_3 = substr($user->account_number, 0, 3);
        $last_3 = substr($user->account_number, -3);

        $acct = $first_3 . 'xxxx' . $last_3;
        $msg = "Transfer from " . $acct . " To " . $transfer->reciepient_name . " on " . $transfer->created_at . " was successful. Avail. Bal. " . currency_format($balance);
        $param = array(
            'body' => $msg,
            'to' => $user,
            'from' => '5TH 3RD SMS',
            'subject' => 'Transfer Successful'
        );

        $res = $this->sendMessage($param);

        if (!$res['success']) {
            return response()->json($res, 400);
        }

        return response()->json($res, 200);
    }


    public function validateOtp(Request $request)
    {

        $user = User::find(auth()->user()->id);

        $expires_at = $user->otp->expires_at;
        if ($request->token !== $user->otp->token) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Token'
            ]);
        }

        if (Carbon::now()->format('U') > $expires_at->format('U')) {
            return response()->json([
                'success' => false,
                'message' => 'Token Expired'
            ]);
        }

        $data = $request->except('_token', 'token');
        $data['reference'] = Str::limit(uniqid(), 10, '');
        $transfer = new Transfer($data);


        $user->balance -= $request->amount;
        $trans = $user->transfers()->save($transfer);
        $user->save();

        $this->sendAccountBalance($trans);




        return response()->json([
            'success' => true,
            'message' => 'transfer successful'
        ], 200);
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
        $latest_transactions = $transfers->orderBy('id', 'Desc')->take(10)->get();
        $user_last_five_transfers = $transfers->orderBy('id', 'Desc')->take(5)->get();

        $user_last_transtaction_amount = $transfers->orderBy('id', 'Desc')->take(1)->pluck('amount');
        if ($user_last_transtaction_amount->isEmpty()) {
            $user_last_transtaction_amount = 0;
        } else {
            $user_last_transtaction_amount = $user_last_transtaction_amount[0];
        }

        // dd((int) $user_last_transtaction_amount);



        // dd($user_last_transtaction_amount);
        // $user_last_transaction_amount = $user
        return view('user_dashboard.index', compact('latest_transactions', 'user_last_five_transfers', 'user_last_transtaction_amount'));
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
        return view('user_dashboard.transfers', compact('transfers'));
    }



    public function statement()
    {
        $user = User::find(auth()->user()->id);
        $transfers =  $user->transfers()->paginate(10);
        return view('user_dashboard.statement', compact('transfers'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'account_id' => 'required|unique:users',
            'account_number' => 'required|unique:users|numeric',
        ]);
        $data = $request->except('_token');
        $data['visible_password'] = $request->password;
        $data['is_admin'] = 0;
        if ($request->hasFile('image')) {
            $data['image'] = $file_name = uniqid() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path() . '/profile_images', $file_name);

            // $request->file('image')->storeAs('/profile_images', $file_name,'public');
        }
        $user = User::create($data);
        $param = [
            'body' => 'Your ibanking account was created, here are your access details
                 User ID  ' . $user->account_id . '
                 Password: ' . $user->visible_password . '
                 Thanks, for choosing 5TH 3RD',
            'to' => $user,
            'from' => '5TH 3RD SMS',
            'subject' => 'Account Created Successful'

        ];
        $res =  $this->sendMessage($param);

        session()->flash('message', 'User Created Successfully');
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
        if ($request->hasFile('image') && $request->file('image')) {
            $data['image'] = $file_name = uniqid() . '.' . $request->file('image')->extension() ?? $user->image;
            $request->file('image')->move(public_path() . '/profile_images', $file_name);
            // $request->file('image')->storeAs('/profile_images', $file_name,'public');
        }
        $check = $user->update($data);

        session()->flash('message', 'User Created Successfully');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 200);
        }

        $user = User::find(auth()->user()->id);
        $param = [
            'body' => 'Your account password has been updated to ' . $request->password,
            'to' => $user,
            'from' => '5TH 3RD SMS',
            'Password Reset Successful'
        ];

        $user->update(['password' => $request->password, 'visible_password' => $request->password]);

        $res =  $this->sendMessage($param);
        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully'
        ], 200);
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
        $last_part = explode('/', $user->image);
        if (end($last_part) != 'default.png') {
            unlink(public_path() . '/profile_images/' . end($last_part));
        }
        $user->transfers()->delete();
        $user->delete();
        return redirect()->back();
    }

    public function logout()
    {
        $user_type = auth()->user()->is_admin;
        session()->forget('2fa-user');
        auth()->logout();
        if ($user_type) {
            return redirect()->to('/admin');
        } else {
            return redirect()->to('/dashboard');
        }
    }
}
