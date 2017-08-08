<style>
.row{
    margin: 200px;
    padding: 100px auto;
}
</style>

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">마이페이지</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/register">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="user_id" class="col-md-4 control-label">아이디</label>
                            <div class="col-md-5">
                            @php
                                var_dump($_SESSION['user_id']);
                            @endphp
                                <input id="user_id" type="text" class="form-control" name="user_id" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">비밀번호</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" name="password" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">비밀번호 확인</label>
                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="check_password" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">닉네임</label>
                            <div class="col-md-5">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">이메일 주소</label>
                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        {{--<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="register">
                                    확인
                                </button>

                                <button type="reset" class="btn btn-primary col-md-offset-2">
                                    　취소　
                                </button>
                            </div>
                        </div>
                        --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
