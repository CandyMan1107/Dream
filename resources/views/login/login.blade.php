<style>
#frm{
    border: solid gray 1px;
    width: 20%;
    border-radius: 5px;
    margin: 100px auto;
    background: white;
}
#btn {
    color: #fff;
    background: #337ab7;
    padding: 5px;
}
</style>
@extends('layouts.master')
@section('content')
<br><br><br><br><br><br><br>
<html>
<head>
</head>
<body id="body">
<center>
    <div id="frm">
        <form action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <br>
            아디 : <input type="text" name="user_id"><br>
            비번 : <input type="password" name="password"><br><br>
            <input id="btn" type="submit" name="login" value="로그인">
        </form>
</div>
</center>
</body>
</html>
@endsection