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
    popupLink("uploadImg", 300, 500);
  });

})(jQuery);
