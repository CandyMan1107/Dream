<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Validator;
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
            
            return redirect('/');
        }
        else {
            return redirect('/login');
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
}
