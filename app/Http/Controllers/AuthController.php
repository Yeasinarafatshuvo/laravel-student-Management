<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.registration');
    }

    public function save(Request $request)
    {
        //user input data validation
        $request->validate([
            'name' => 'required',
            'email' => 'required | email |unique:admins',
            'password' => 'required | min:5 |max:12'
        ]);

        //data insert into database
        
        $admin = new Admin;

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return back()->with('success', 'New user has been successfully added to database');
        }else{
            return back()->with('fail', 'something went wrong, try again latter');
        }
    }


    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required | email ',
            'password' => 'required | min:5 | max:12'
        ]);

        //Here check the user given email if match than return whole row of this user
        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        }else {
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');
            }else {
                return back()->with('fail',  'Incorrect password');
            }
        }

    }

    public function logout()
    {
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }

    }

    public function dashboard()
    {
        $students = Student::all();
        $data = ['LoggedUserInfo' => Admin::where('id', '=', session('LoggedUser'))->first()];
        return view('students.dashboard', $data, ['students' => $students]);
    }



}
