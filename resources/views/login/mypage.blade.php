<style>
.row{
    margin: 150px;
    padding: 100px auto;
}
button.btn-primary {
    background-color: #000;
}
</style>

@extends('layouts.master')

@section('content')
@include('partials.mySubNavi')
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
                                <input id="password" name="password" value="{{$value->password}}" type="password" class="form-control" required>
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
                                <input name="name" value="{{$value->name}}" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">이메일</label>
                            <div class="col-md-5">
                                <input id="readonly" value="{{$value->email}}" type="email" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">보유 포인트</label>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
	                                포인트 충천
                            </button>
                        
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                            <div class="modal-body">
                                        
                                            </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-3">
                            <input id="readonly" value="{{$value->point}}" type="text" class="form-control" readonly>
                        </div>
                        </div>
                        @endforeach
                         <div class="form-group"> 
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    정보 수정
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
