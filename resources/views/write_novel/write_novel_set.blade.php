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

    .image_list{
      height:200px;
      width:100%;
    }
    .image_cell {
      display: inline-block;
      border:black 2px solid;
      height:100%;
      width:170px;
      text-align: center;
    }

    .image_cell > img {
      background-color: yellow;
      height:100%;
      width:75%;
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
  <div class="write_novel_set">
    <div class="container">
      <div class="row set_row">
        <div class="col-md-12 main_title">새 소설 쓰기</div>
      </div>

      <div class="row set_row">
        <div class="col-md-12">
          <span class="menu_title">소설 제목</span>
          <input class="menu_input" type="text" name="" placeholder="소설 제목을 입력해주세요." size=50>
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
        <div class="col-md-10 menu_title">표지 이미지</div>
        <div class="col-md-2"><span class="img_upload_btn" data-href="{{URL::to('uploadImg/image_list')}}">이미지 업로드</span></div>
      </div>

      <!--표지 이미지가 들어갈 리스트-->
      <div class="row set_row image_list" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}' data-href="{{URL::to('upload/images')}}">
      </div>

      <div class="novel_intro">
        <div class="row set_row">
          <div class="col-md-12 menu_title">소설 소개</div>
        </div>
        <div class="intro_box detail_intro_box" contenteditable="true">
          detail intro box
        </div>
        <div class="intro_box summary_intro_box" contenteditable="true">
          summary intro box
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-6 btn_div"><div class="func_btn">취소</div></div>
        <div class="col-md-6 btn_div"><div class="func_btn">저장</div></div>
      </div>

    </div>
  </div>

<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/slick.js')}}"></script>
<script src="{{URL::asset('js/custom/write_novel.js')}}"></script>
@endsection
