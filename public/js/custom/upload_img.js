(function ($) {
  // 이미지 submit 시 이미지를 올리고,
  // 생성 시 입력받은 클래스의 div에 이미지 태그를 생성 태그는 img_cell Div내에 생성
  // 이미지 경로는 image_list 클래스의 data-href값을 가져온다.
  $(".img_submit").bind("click", function(){
    var divName = $(".copy_div").val();
    var contentDiv = $("." + divName, opener.document);
    var url = $(".img_input").val();
    var imgRoot = $(".image_list", opener.document).data("href");
    var filename = url.substring(url.lastIndexOf("\\")+1);

    contentDiv.html(contentDiv.html() + "<div class='image_cell'><img src='" +imgRoot + "/" + filename + "'></div>");

  });
})(jQuery);
