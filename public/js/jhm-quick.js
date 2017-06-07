$(document).ready(function () {
    // 기존 css에서 플로팅 배너 위치(top)값을 가져와 저장한다.
    var floatPosition = parseInt($("#quickMenu").css('top'));


    $(window).scroll(function () {


        // 현재 스크롤 위치를 가져온다.
        var scrollTop = $(window).scrollTop();
        var newPosition = scrollTop + floatPosition + "px";

        var limit = parseInt($("#writer-word").position().top) - 500;
        // 애니메이션 없이 바로 따라감
        // $("#quickMenu").css('top', newPosition);

        // $("div").filter("#quickMenu").text("플로팅 메뉴 / " + scrollTop + " / " + newPosition + " / " + limit);

        if (scrollTop > limit) {
            $("#quickMenu").stop();
        } else {
            $("#quickMenu").stop().animate({
                "top": newPosition
            }, 500);
        }

    });
    // }).scroll();

    $("#remoteMenu").click(function () {
        if (!$(this).hasClass("fa fa-plus-square-o")) {
            $(this).attr("class", "fa fa-plus-square-o");
        } else {
            $(this).attr("class", "fa fa-minus-square-o");
        }
    });

    // 현재 ((윈도우넓이/2) +510) 을 left로 지정
    $("#quickMenu").css("left", ($(window).width() / 2) + 510);

});