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
                    <form class="form-horizontal" role="form" method="POST" action="/modify">
                        {{ csrf_field() }}
                        @foreach($user_id as $value)
                        <div class="form-group">
                            <label class="col-md-4 control-label">아이디</label>
                            <div class="col-md-5">
                                <input id="user_id" value="{{$value->user_id}}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">비밀번호</label>
                            <div class="col-md-5">
                                <input id="password" value="{{$value->password}}" type="password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">비밀번호 확인</label>
                            <div class="col-md-5">
                                <input value="{{$value->password}}" type="password" class="form-control" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label">닉네임</label>
                            <div class="col-md-5">
                                <input id="name" value="{{$value->name}}" type="text" class="form-control" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">이메일 주소</label>
                            <div class="col-md-5">
                                <input id="readonly" value="{{$value->email}}" type="email" class="form-control" readonly>
                            </div>
                        </div>
                        @endforeach
                         <div class="form-group"> 
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    수정하기
                                </button>

                                <button type="reset" class="btn btn-primary col-md-offset-2">
                                    취소
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
