<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Validator;
use Session;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function login_index() {
        return view('login.login');
    }
    
    public function login(Request $req){
        $user_id = $req->input('user_id');
        $password = $req->input('password');

        $checkLogin = DB::table('users')->where(['user_id' => $user_id, 'password' => $password])->get();
        
        if(count($checkLogin) > 0) {
            session_start();
            $_SESSION['user_id'] = $user_id;
            
            return redirect('/');
        }
        else {
            return view('login.login');
        }
    }

    public function register_index() {
        return view('login.register');
    }

    public function register(Request $req) {
        DB::table('users')->insert(
            [
                'user_id' => $req->get('user_id'),
                'name' => $req->get('name'),
                'email' => $req->get('email'),
                'password' => $req->get('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return redirect('/');
    }

    public function mypage_index() {
           return view('login.mypage');
    }
    
    public function myinfo(Request $req) {
        $user_id = $req->input('user_id');
        
        $_SESSION['user_id'] = $user_id;

        $user_info = DB::table('users')->select('user_id')->get('');
        $name = DB::table('users')->select('name')->get('');
        $email = DB::table('users')->select('email')->get('');
        $password = DB::table('users')->select('password')->get('');
        $created_at = DB::table('users')->select('created_at')->get('');

        return view('login.mypage')->with(
            'user_id', $user_info,
            'name', $name,
            'email', $email,
            'password', $password,
            'created_at', $created_at
            );
    }

    public function logout() {
        session_start();
        session_destroy();
        
        return redirect('/');
    }
}
