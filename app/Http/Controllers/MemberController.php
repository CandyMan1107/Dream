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
           header("Location:localhost");
        }
        else {
            echo "로긴 실패";
        }    
    }

    public function register_index() {
        return view('login.register');
    }

    public function register(Request $req) {
        $data=Input::except(array('token'));

        $rule = array(
            'user_id' => 'required',
            'name' => 'required',
            'password' => 'required',
            'check_password' => 'required|same:password',
            'email' => 'required',
        );

        $message = array(
            'check_password.required' => '비번 입력안햇다',
            'check_password.same' => '비번 안똑같다',
        );

        $validattor = Validator::make($data, $rule, $message);

        if($validattor->fails()) {
            echo "가입 실패";
        } else{
            Register::formstore(Input::except(array('_token', 'check_password')));

            return Redirect::to('register')->with('success', 'successfully registered');
        }
    }
}
