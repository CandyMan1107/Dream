@extends('layouts.master')
@section('content')
<br><br><br><br><br><br><br><br>
<table height="400px" width="500px">
    <html>
    <body>
    <center>
        <form action="/register" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            아디 : <input type="text" name="user_id"><br>
            닉네임 : <input type="text" name="name"><br>
            비번 : <input type="password" name="password"><br>
            비번확인 : <input type="password" name="check_password"><br>
            이메일 : <input type="email" name="email"><br>
            <input type="submit" name="register" value="회원가입">
        </form>
    </center>
    </body>
    </html>
</table>
@endsection

