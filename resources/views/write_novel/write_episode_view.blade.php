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

    .novel-title{
      font-size:18;
      font-weight: bold;
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

    /*회색 #BDBDBD  파랑 #fdfdfd*/
    .set-notice-btn{
      display: inline-block;
      text-align: center;
      padding: 4px;
      width:100px;
      color: #BDBDBD;
      font-size: 16px;
      line-height: normal;
      background-color: #fdfdfd;
      cursor: pointer;
      border: 2px solid #BDBDBD;
      margin: 0 auto;
    }

    .selected-notice{
      color: #00D8FF;
      border: 2px solid #00D8FF;
    }

    .set-charge-btn{
      display: inline-block;
      text-align: center;
      padding: 4px;
      width:100px;
      color: #BDBDBD;
      font-size: 16px;
      line-height: normal;
      background-color: #fdfdfd;
      cursor: pointer;
      border: 2px solid #BDBDBD;
      margin: 0 auto;
    }

    .selected-charge{
      color: #00D8FF;
      border: 2px solid #00D8FF;
    }

    /* 커버 이미지 */

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

    .cover-img {
      position:relative;
      height:100%;
      width:65%;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    .cover-img > img {
      height:100%;
      width:100%;

    }
    .quitBox {
      display: inline-block;
      position:absolute;
      right:0;
      margin-right:auto;
      background: #f90;
      color: #fff;
      font-family: 'Helvetica', 'Arial', sans-serif;
      font-size: 2em;
      font-weight: bold;
      text-align: center;
      width: 40px;
      height: 40px;
      border-radius: 5px;
    }

    .selected-image {
      border:2px solid #5CD1E5;
    }

    .img_upload_label{
      display: inline-block;
      padding: .5em .75em;
      color: #00D8FF;;
      font-size: inherit;
      line-height: normal;
      vertical-align: middle;
      background-color: #fdfdfd;
      cursor: pointer;
      border: 2px solid #00D8FF;;
      border-radius: .25em;

    }
    .img_upload_btn{
      position: absolute;
      width: 1px; height: 1px;
      padding: 0; margin: -1px;
      overflow: hidden;
      clip:rect(0,0,0,0);
      border: 0;
    }

    /*에디터 부*/
    .edit-box {
      border:#EAEAEA 2px solid;
      margin-bottom: 10px;
      overflow-y: scroll;
      padding-left: 5px;
    }

    .episode-editor-div {
      height:500px;
      width:85%;
    }

    .writers-postscript-div {
      height:100px;
    }

    .btn_div {
      text-align: center;
      align-items: center;
      height: 100px;
    }
    .func_btn {
      cursor: pointer;
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
        <div class="col-md-12 main_title">회차 / 공지 쓰기</div>
      </div>

      <div class="row set_row">
        <div class="col-md-12">
          <span class="menu_title">소설 제목</span>
          <span class="novel-title">{{ $tasks['novelTitle'] }}</span>
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-12">
          <label class="set-notice-btn selected-notice" data-notice="episode">회차</label>
          <label class="set-notice-btn" data-notice="notice">공지</label>
          <label class="set-charge-btn selected-charge" data-charge="free">무료</label>
          <label class="set-charge-btn" data-charge="charge">유료</label>
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-12">
          <span class="menu_title">회차 제목</span>
          <input id="episode-title" class="menu_input" type="text" placeholder="회차 제목을 입력해주세요." size=50>
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-10 menu_title">표지 이미지
        </div>

        <div class="col-md-2">
          <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="">
            <label class="img_upload_label">이미지 업로드
              <input class="img_upload_btn" id="imgFile" name="imgFile" type='file'>
            </label>
          </form>
        </div>
      </div>

      <div class="row set_row image_list_box">
        <div class="image_list center-slick" data-href="{{URL::to('upload/images')}}">
        </div>
      </div>

      <div class="row set_row">
        <div class="col-md-12 menu_title">내용</div>
      </div>
      <div class="edit-box episode-editor-div" contenteditable="true">
        episode content
      </div>
      <div class="edit-box writers-postscript-div" contenteditable="true">
        writers postscript
      </div>

      <div class="row set_row">
        <div class="col-md-3 btn_div"><div class="func_btn episode-cancel">취소</div></div>
        <div class="col-md-3 btn_div"><div class="func_btn episode-temp-save">임시저장</div></div>
        <div class="col-md-3 btn_div"><div class="func_btn episode-preview">미리보기</div></div>
        <div class="col-md-3 btn_div"><div class="func_btn episode-save">저장</div></div>
      </div>

    </div>
  </div>

<script>
  (function ($) {
    // 회차/공지 선택
    $('.set-notice-btn').on("click", function(){
      $(".set-notice-btn").removeClass("selected-notice");
      $(this).addClass("selected-notice");
    });

    // 유.무료 선택
    $('.set-charge-btn').on("click", function(){
      $(".set-charge-btn").removeClass("selected-charge");
      $(this).addClass("selected-charge");
    });

    // 표지 이미지 리스트 슬릭 설정
    $('.center-slick').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3
    });

    // 기존의 표지 이미지 출력
    getCoverImage();
    function getCoverImage(){
      <?php for($i=0; $i < count($tasks['coverImg']); $i++){?>

        var addSlickEle = "";
        addSlickEle += "<div class='image_cell'>";
        addSlickEle += "  <div class='cover-img' data-href={{ $tasks['coverImg'][$i]->cover_img_src }} >";
        addSlickEle += "    <div class='quitBox'>";
        addSlickEle += "      <span id='x'>X</span>";
        addSlickEle += "    </div>";
        addSlickEle += "    <img draggable='false' src={{URL::asset('upload/images')}}/{{ $tasks['coverImg'][$i]->cover_img_src }}";
        addSlickEle += "  </div>";
        addSlickEle += "</div>";
        $(".image_list").slick('slickAdd',addSlickEle);
        $(".image_cell").find(".quitBox").hide();

        // 클릭이벤트
        $(".image_cell").off().on('click',function(){
          $('.image_cell').removeClass("selected-image");
          $(this).addClass("selected-image");
        });

        // 마우스오버 : 삭제버튼 show
        $(".image_cell").on('mouseover',function(){
          $(this).find(".quitBox").show();
        });
        // 마우스아웃 : 삭제버튼 hide
        $(".image_cell").on('mouseout',function(){
          $(this).find(".quitBox").hide();
        });

        // X박스 클릭 : 이미지 삭제
        $(".image_cell").find(".quitBox").off().on("click",function(){
          var imageCell = $(this).parent().parent();

          var coverImg = $(this).parent();
          var index = imageCell.attr("data-slick-index");

          coverImg.animate({
            opacity:0.25,
            width:"0",
            height:"0",
            top:"50%"
          }, 500, function(){
            $(".image_list").slick('slickRemove',index);
            $(".image_list").slick('slickAdd',"");
          });

          // DB처리
          $.ajax({
              type: "get",
              url: "/write_novel/removeCover",
              data: {
                "userId" : '1',
                "removeFile" : coverImg.attr("data-href")
              },
              success: function (data) {
                console.log(data);
              },
              error: function (error) {
                alert("오류발생");
              }
          });
        });
      <?php } ?>
    }

    // 커버 이미지 업로드 이벤트
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
              url: "/write_novel/addCover",
              type: "post",
              data: new FormData($("#upload_form")[0]),
              processData: false,
              contentType: false,
              success: function(data){
                  //슬릭 생성
                  var addSlickEle = "";
                  addSlickEle += "<div class='image_cell'>";
                  addSlickEle += "  <div class='cover-img' data-href="+data+">";
                  addSlickEle += "    <div class='quitBox'>";
                  addSlickEle += "      <span id='x'>X</span>";
                  addSlickEle += "    </div>";
                  addSlickEle += "    <img draggable='false' src={{URL::asset('upload/images')}}/"+data+">";
                  addSlickEle += "  </div>";
                  addSlickEle += "</div>";
                  $(".image_list").slick('slickAdd',addSlickEle);
                  $(".image_cell").find(".quitBox").hide();

                  // 클릭이벤트
                  $(".image_cell").off().on('click',function(){
                    $('.image_cell').removeClass("selected-image");
                    $(this).addClass("selected-image");
                  });

                  // 마우스오버 : 삭제버튼 show
                  $(".image_cell").on('mouseover',function(){
                    $(this).find(".quitBox").show();
                  });
                  // 마우스아웃 : 삭제버튼 hide
                  $(".image_cell").on('mouseout',function(){
                    $(this).find(".quitBox").hide();
                  });

                  // X박스 클릭 : 이미지 삭제
                  $(".image_cell").find(".quitBox").off().on("click",function(){
                    var imageCell = $(this).parent().parent();

                    var coverImg = $(this).parent();
                    var index = imageCell.attr("data-slick-index");

                    coverImg.animate({
                      opacity:0.25,
                      width:"0",
                      height:"0",
                      top:"50%"
                    }, 500, function(){
                      $(".image_list").slick('slickRemove',index);
                      $(".image_list").slick('slickAdd',"");
                    });

                    // DB처리
                    $.ajax({
                        type: "get",
                        url: "removeCover",
                        data: {
                          "userId" : '1',
                          "removeFile" : coverImg.attr("data-href")
                        },
                        success: function (data) {
                          console.log(data);
                        },
                        error: function (error) {
                          alert("오류발생");
                        }
                    });

                  });

              }
            });
        }
    });

    // 취소 버튼
    $(".episode-cancel").on("click",function(){
      history.go(-1);
    });

    // 저장 버튼
    $(".episode-save").on("click",function(){
      // 소설 정보 변수화
      var novelId  = {{ $tasks['novelId']}};
      var isNotice = $(".selected-notice").attr("data-notice")=="notice" ? 1 : 0 ;
      var isCharge = $(".selected-charge").attr("data-charge")=="charge" ? 1 : 0;
      var coverImg = $(".selected-image").find(".cover-img").attr("data-href");
      var title    = $("#episode-title").val();
      var episode  = $(".episode-editor-div").html();
      var postScript = $(".writers-postscript-div").html();


      // ajax 소설 저장 요청
      createEpisode(novelId, isNotice, isCharge, coverImg, title, episode, postScript);
      // 마이페이지 - 소설 목록 페이지 이동


    });

    // DB 소설 생성
    function createEpisode(novelId, isNotice, isCharge, coverImg, title, episode, postScript){
      $.ajax({
          type: "get",
          url: "/write_novel/create_episode",
          data: {
            "novelId"  : novelId,
            "isNotice" : isNotice,
            "isCharge" : isCharge,
            "coverImg" : coverImg,
            "title"    : title,
            "episode"  : episode,
            "postScript": postScript
          },
          success: function (data) {
            alert(data);
          },
          error: function (error) {
            alert("오류발생");
          }
      });
    }

  })(jQuery);


</script>
@endsection
