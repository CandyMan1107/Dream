<style>
.row{
    margin: 150px;
    padding: 100px auto;
}
button.btn-primary {
    background-color: #000;
}
.radio {
    margin: 10px;
    padding: 5px;
}
</style>

@extends('layouts.master')
@section('content')
@include('partials.mySubNavi')

<script>
//포인트 충전 시
$(document).ready(function(){
	$("#point_add").click(function(){
		$.ajax({
			url:'/point',
			success:function(data){
                location.href="/mypage";
                alert("충전 성공");
            },
            error:function(){
                alert("충전 실패");
            }
		})
	});
});

// 정보 수정
// $(document).ready(function(){
// 	$("#modify_button").click(function(){
// 		$.ajax({
// 			url:'/modify',
//             // data:{

//             // },
// 			success:function(data){
//                 location.href="/";
//                 alert("변경 성공");
//             },
//             error:function(){
//                 location.href="/mypage";
//                 alert("변경 실패");
//             }
// 		})
// 	});
// });

// 포인트 value값 가져오기
$(document).ready(function(){
    $(".input_radio").on("click",function(){
        $(".input_radio").prop("checked",false);
        $(this).prop("checked",true);

        $(".input_radio").attr("name", null);
        $(this).attr("name","selceted");

    });
});
</script>

<div class="container">
    <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">마이페이지</div>
            <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="/modify">  
                 <!-- <form class="form-horizontal" role="form" method="POST">  -->
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
                            <input id="password2" value="{{$value->password}}" type="password" class="form-control" required>
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
                                포인트 충전 </button>
                        <div class="col-md-3">
                            <input id="readonly" value="{{$value->point}}" type="text" class="form-control" readonly>
                        </div>
                    </div>
                    @endforeach
                        <div class="form-group"> 
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" id="modify_button" class="btn btn-primary">
                                정보 수정
                            </button>

                            <button type="reset" class="btn btn-primary col-md-offset-1">
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
<!-- 포인트 충천 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
        <form role="form" method="get" action="/point"> 
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">포인트 충전</h4>
            </div>
                    <!-- 충전창 바디  -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-md-4">보유 포인트</label><br><br>
                            <div class="col-md-4"><input value="{{$value->point}} Point" class="form-control" readonly></div>
                        </div>
                    </div>
                        <div class="radio">
                            <div class="radio">
                                 <div style="float:left;">
                                    <label>
                                        <input type="radio" class="input_radio" value="1000">
                                        1000 Point
                                    </label>
                                </div>
                                <div style="float:right;">
                                    <label>
                                        10000원
                                    </label>
                                </div><br><br><br>

                                <div style="float:left;">
                                    <label>
                                        <input type="radio" class="input_radio" value="2000">
                                        2000 Point
                                    </label>
                                </div>
                                <div style="float:right;">
                                    <label>
                                        20000원
                                    </label>
                                </div><br><br><br> 
                                
                                 <div style="float:left;">
                                    <label>
                                        <input type="radio" class="input_radio" value="3000">
                                        3000 Point
                                    </label>
                                </div>

                                <div style="float:right;">
                                    <label>
                                        30000원
                                    </label>
                                </div><br><br><br>

                                <div style="float:left;">
                                    <label>
                                        <input type="radio" class="input_radio" value="4000">
                                        4000 Point
                                    </label>
                                </div>
                                <div style="float:right;">
                                <label>
                                    40000원
                                </label>
                                </div><br><br><br>
                                
                                <div style="float:left;">
                                    <label>
                                        <input type="radio" class="input_radio" value="5000">
                                        5000 Point
                                    </label>
                                </div>
                                <div style="float:right;">
                                    <label>
                                        50000원
                                    </label>
                                </div><br><br><br> 

                            </div>
                        </div>
                <div class="modal-footer">
                    <button type="submit" id="point_add" class="btn btn-primary">충전</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">취소</button> 
                    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- 포인트 충전 끝  -->
@endsection