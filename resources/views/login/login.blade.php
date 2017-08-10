<style>
.row{
    margin: 200px;
    padding: 100px auto;
}
</style>

@extends('layouts.master')
@section('content')
<div id="login_pannel" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">로그인</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/login" method="post"  role="form" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">아이디</label>
                        <div class="col-md-5">
                            <input id="id" type="text" class="form-control" name="user_id" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">비밀번호</label>
                        <div class="col-md-5">
                            <input id="password" type="password" class="form-control" name="password" required>

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="login">
                                로그인
                            </button>

                            <a href="/register" class="btn btn-primary col-md-offset-1">
                                회원가입
                            </a>

                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection