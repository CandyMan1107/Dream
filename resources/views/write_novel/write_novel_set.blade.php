<div class="default-padding"></div>
@extends('layouts.master')


@section('content')
  <style>
    .set_row {
      border-top: #EAEAEA 2px solid;
      padding: 10px;
    }

    .main_title {
      color:#BDBDBD;
      font-size:24px;
    }

    .menu_title {
      font-size:18px;
      padding-right: 8px;
    }

    .menu_input {
      border:none;
    }

    .menu_select {
      border: #BDBDBD 2px solid;
      padding: :5px;
    }
    .check_box {
      background-color: blue;
    }

    .check_novel_period {
      padding-left: 10px;
      padding-right: 10px;
    }

    .check_circle {
      vertical-align: middle;
      width: 13px;
      height: 13px;
      background: #BDBDBD;
      -moz-border-radius: 50px;
      -webkit-border-radius: 50px;
      border-radius: 50px;
    }

    .selected_period > img {
      background: #00D8FF;
    }
    .novel_period_day_table {
      display: inline-block;
      border-collapse:separate;
      border-spacing:1px;
      vertical-align: middle;
    }
    .novel_period_day {
      border:#BDBDBD 2px solid;
      width:30px;
      height:30px;
      text-align:center;
    }
    .selected_day {
      border:#00D8FF 2px solid;
      color: #00D8FF;
    }

    .image_list_box {
      background-color:#EAEAEA;
    }
    .image_list{
      height:200px;
      width:80%;
      margin-left: auto;
      margin-right: auto;
    }
    .image_cell {
      display: inline-block;
      height:100%;
      width:50px;
      text-align: center;
    }


    .image_cell > img {
      background-color: yellow;
      height:100%;
      width:65%;
      margin-left: auto;
    	margin-right: auto;
    	display: block;
    }

    .selected-image {
      border:2px solid #5CD1E5;
    }

    .img_upload_btn{
      color:#00D8FF;
      border: #00D8FF 2px solid;
      border-radius: 5px;
      padding:2px;
    }
    .intro_box {
      border:#EAEAEA 2px solid;
      margin-bottom: 10px;
      overflow-y: scroll;
      padding-left: 5px;
    }

    .detail_intro_box {
      height:250px;
    }

    .summary_intro_box {
      height:100px;
    }

    .btn_div {
      text-align: center;
      align-items: center;
      height: 100px;
    }
    .func_btn {
      vertical-align: middle;
      border: #7CC8C9 2px solid;
      color: #7CC8C9;
      font-size: 24px;
      width: 80%;
      height: 60px;
      padding-top: 10px;
      margin: 0 auto;

    }

  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="write_novel_set">
    <div class="container">
      <div class="row set_row">
        <div class="col-md-12 main_title">새 소설 쓰기</div>
      </div>

      <div class="row set_row">
        <div class="col-md-12">
          <span class="menu_title">소설 제목</span>
          <input class="menu_input" type="text" placeholder="소설 제목을 입력해주세요." size=50>
        </div>
      </div>
      <div class="row set_row">
        <div class="col-md-6">
          <span class="menu_title">장르</span>
          <select class="menu_select" name="">
            <option value="">로맨스</option>
            <option value="">판타지</option>
            <option value="">SF</option>
            <option value="">무협</option>
            <option value="">추리</option>
            <option value="">호러</option>
            <option value="">시대극</option>
          </select>
        </div>

        <div class="col-md-6">
          <span class="menu_title">연재 주기</span>
          <span class="check_novel_period free_publish selected_period"><img src="{{URL::asset('img/write_novel/check.png')}}" class="check_circle">자유 연재</span>
          <span class="check_novel_period day_publish"><img src="{{URL::asset('img/write_novel/check.png')}}" class="check_circle">요일 연재</span>

          <table class="novel_period_day_table day_activate">
            <tr>
              <td class="novel_period_day selected_day">월</td>
              <td class="novel_period_day">화</td>
              <td class="novel_period_day">수</td>
              <td class="novel_period_day">목</td>
              <td class="novel_period_day">금</td>
              <td class="novel_period_day">토</td>
              <td class="novel_period_day">일</td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-10 menu_title">표지 이미지
          <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="">
            <input id="imgFile" name="imgFile" type='file'>
          </form></div>
        <div class="col-md-2"><span class="img_upload_btn" data-href="{{URL::to('uploadImg/image_list')}}">이미지 업로드</span></div>
      </div>


      <!--표지 이미지가 들어갈 리스트-->
      <div class="row set_row image_list_box">
        <div class="image_list center-slick" data-href="{{URL::to('upload/images')}}">

        </div>
      </div>



      <div class="row set_row">
        <div class="col-md-12 menu_title">소설 소개</div>
      </div>
      <div class="intro_box detail_intro_box" contenteditable="true">
        detail intro box
      </div>
      <div class="intro_box summary_intro_box" contenteditable="true">
        summary intro box
      </div>

      <div class="row set_row modal-dialog modal-sm">
        <div class="col-md-6 btn_div"><div class="func_btn">취소</div></div>
        <div class="col-md-6 btn_div"><div class="func_btn">저장</div></div>
      </div>

    </div>
  </div>

<script>
  (function ($) {
    // 자유/요일연재 선택
    $('.check_novel_period').bind("click", function(){
      // 체크 되어 있지 않다면
      $('.check_novel_period').removeClass("selected_period");
      $(this).addClass("selected_period");

      // 요일 연재의 경우 요일 활성화
      if($(this).hasClass("day_publish")){
        activateDayCell();
      // 요일연재가 아닐경우 요일 비활성화
      } else {
        deactivateDayCell();
      }
    });

    // 요일 선택
    $(".novel_period_day").bind("click", function(){
      // 요일 선택이 활성화 된 경우에만 선택됨
      if($(".novel_period_day_table").hasClass("day_activate")){
        if($(this).hasClass("selected_day"))
          $(this).removeClass("selected_day");
        else
          $(this).addClass("selected_day");
      }
    });
    // 요일 선택 비활성화
    function deactivateDayCell(){
      $(".novel_period_day_table").removeClass("day_activate");
      $(".novel_period_day").removeClass("selected_day");
      $(".novel_period_day_table").hide();
    }

    // 요일 선택 활성화
    function activateDayCell(){
      if(!$(".novel_period_day_table").hasClass("day_activate")){
        $(".novel_period_day_table").addClass("day_activate");
        $(".novel_period_day_table").show();
      }
    }

    // 메뉴없는 윈도우를 현재 윈도우 중간에 팝업
    function popupLink(link,popHeight,popWidth){
      var winHeight = document.body.clientHeight;	// 현재창의 높이
      var winWidth  = document.body.clientWidth;	// 현재창의 너비
      var winX      = window.screenLeft;	// 현재창의 x좌표
      var winY      = window.screenTop;	// 현재창의 y좌표

      var popX = winX + (winWidth - popWidth)/2;
      var popY = winY + (winHeight - popHeight)/2;
      window.open(link,"","width="+popWidth+"px,height="+popHeight+"px,top="+popY+",left="+popX+",menubar=1,scrollbars=no,resizable=no");
    }

    // 이미지 업로드 팝업
    $(".img_upload_btn").bind("click", function(){
      popupLink($(".img_upload_btn").data('href'), 300, 500);
    });


    $('.center-slick').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

    // 업로드한 이미지 이벤트
    $('.image_cell').on('click',function(){
      alert("what");

    });


    $("#imgFile").change(function () {
        // 파일이 있을경우
        if (this.files && this.files[0]) {

            // ajax로 DB추가
            var input = $("#imgFile");
            console.log(new FormData($("#imgFile")[0]));
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              url: "addCover",
              type: "post",
              data: new FormData($("#upload_form")[0]),
              processData: false,
              contentType: false,
              success: function(data){
                  //슬릭 생성
                  $(".image_list").slick('slickAdd', "<div class='image_cell'><img class='cover-img' src={{URL::asset('upload/images')}}/"+data+" data-href="+data+"></div>")
                  $(".image_cell").on('click',function(){
                    $('.image_cell').removeClass("selected-image");
                    $(this).addClass("selected-image");
                  });
              }
            });
        }
    });


    deactivateDayCell();
  })(jQuery);


</script>
@endsection
