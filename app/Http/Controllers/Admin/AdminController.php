<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transfer;

class AdminController extends Controller
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function showAdminLogin()
    {
        return view('auth.admin.login');
    }


    public function login(Request $request)
    {
        // Validator::make($request->all(),)
        $user_name = $request->username;
        $password = $request->password;

        $user = User::where('is_admin', 1)
            ->where('email', $user_name)
            ->orWhere('account_id', $user_name)
            ->orWhere('account_number', $user_name)
            ->first();

        if (!$user) {
            return redirect()->back()->with(['username' => 'We were unable to find your account']);
        }

        if (auth()->attempt(['email' => $user->email, 'password' => $password])) {
            return redirect()->to('/admin');
        }
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('is_admin', 0)->take(5);
        $transactions = Transfer::all()->take(5);

        return view('admin.index', compact('users', 'transactions'));
    }

    /**
     * Displays the users on the admin panel
     */

    public function getUsers()
    {
        $page_data = get_users_page_details();
        // dd($page_data);
        $users =  $this->users::where('is_admin', 0)->get();
        // $btn_name = 'Add User';
        // $btn_icon = 'fa-plus';
        // $page = 'Users';
        return view('admin.users', compact('users', 'page_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContactRequest()
    {
        $contacts = ContactUs::all();
    }

    public function history($id = null)
    {
        $users = user::where('is_admin',0)->get();
        $transactions = Transfer::all();
        if(!is_null($id)){
            $user = User::find($id);
            $transactions = $user->transfers;
        }
        $page_data = array('page' => 'Transaction History', 'btn_name' => '', 'btn_icon' => '');
        return view('admin.history',compact('page_data','transactions','users'));
    }
}
