<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Session;
use Redirect;
use Validator;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function login_index() {
        return view('login.login');
    }
    
    public function login(Request $req){
        $user_id = $req->input('user_id');
        
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');

        $checkLogin = DB::table('users')->where(['user_id' => $user_id, 'password' => $password])->get();
        
        // 로그인 성공 시 세션 생성
        if(count($checkLogin) > 0) {
            Session::put('user_id', $user_id, 'name', $name, 'email', $email);
            Session::get('user_id', $user_id);

            return Redirect::to('/');
        }
        else {
            echo "<script>alert(\"로그인 실패\");</script>";
            return view('login.login');
        }
    }

    public function register_index() {
        return view('login.register');
    }

    // 회원가입
    public function register(Request $req) {
        $user_id = $req->input('user_id');
        $name = $req->input('name');
        $email = $req->input('email');

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

        Session::put('user_id', $user_id, 'name', $name, 'email', $email);
        Session::get('user_id', $user_id);
        
        return redirect('/');
    }

    public function mypage_index() {
           return view('login.mypage');
    }
    
    public function myinfo(Request $req) {
        $user_id = Session::get('user_id');
        $user_info = DB::select('select * from users where user_id = ?', [$user_id]);
        
        return view('login.mypage')->with('user_id', $user_info);
    }

    // 회원정보 수정
    public function modify(Request $req) {
        $modify_password = $req->input('password');

        // $modify = DB::update('update users set name = ?, password = ?', [$modify_name, $modify_password]);
        $modify_info = DB::update('update users set password = ?', [$modify_password]);

        return redirect('/mypage');
    }

    public function point_add(Request $req) {
        $point_select = $req->input('point');

        $point_added = DB::update('update users set point = ?', [$point_select]);
        
        return redirect('/mypage');
    }

    //로그아웃
    public function logout(Request $req) {
        $req->session()->flush();
        return redirect('/');
    }
}
