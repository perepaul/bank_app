<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function showAdminLogin(){
        return view('auth.admin.login');
    }


    public function login(Request $request)
    {
        // Validator::make($request->all(),)
        $user_name = $request->username;
        $password = $request->password;

        $user = User::where('is_admin',1)
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
        return view('admin.index');
    }

    /**
     * Displays the users on the admin panel
     */

    public function getUsers()
    {
        $page_data = get_users_page_details();
        // dd($page_data);
        $users =  $this->users::where('is_admin',0)->paginate(15);
        // $btn_name = 'Add User';
        // $btn_icon = 'fa-plus';
        // $page = 'Users';
        return view('admin.users',compact('users','page_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
