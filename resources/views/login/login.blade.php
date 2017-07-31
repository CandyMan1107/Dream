@extends('layouts.master')
@section('content')
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<table height="400px" width="500px">
    <html>
    <body>
    <center>
        <form action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            아디 : <input type="text" name="user_id"><br>
            비번 : <input type="password" name="password"><br>
            <input type="submit" name="login" value="로그인">
        </form>
    </center>
    </body>
    </html>
</table>
@endsection