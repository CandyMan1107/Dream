// 마지막 스크롤 TOP 위치
var lastScrollY = 0;

$(document).ready(function () {
    // quickMenu 함수 1/1000초마다 실행
    setInterval(quickMenu, 1);

    $("#remoteMenu").click(function () {
        if (!$(this).hasClass("fa fa-plus-square-o")) {
            $(this).attr("class", "fa fa-plus-square-o");
        } else {
            $(this).attr("class", "fa fa-minus-square-o");
        }
    });
});

function quickMenu() {
    //현재 스크롤 top 위치, .scrollTop() - 선택한 element의 scroll 가능한 영역에서 가장 위쪽 위치
    currentY = $(window).scrollTop();

    //위치가 틀린 경우
    if (currentY != lastScrollY) {
        //percent=움직임속도 * (현재 scrollTop위치) - (마지막 scrollTop위치) 
        percent = 0.1 * (currentY - lastScrollY);
        //percent가 0보다 크면 수를 올림  작으면 수를 내림. 
        percent = (percent > 0 ? Math.ceil(percent) : Math.floor(percent));
        //quickMenu의 style:top을 현재의 top에서 percent를 더한 값(음수라면 빼지겠지?)으로 바꿔준다. 
        $("#quickMenu").css("top", parseInt($("#quickMenu").css("top")) + percent);
        //현재 위치를 lastScrollY에 저장해준다.
        lastScrollY = lastScrollY + percent;
    }

    // 현재 ((윈도우넓이/2) +510) 을 left로 지정
    $("#quickMenu").css("left", ($(window).width() / 2) + 510);
}