$(document).ready(function () {
    /**************************************
    /novel/today_novel_by_day.blade.php
    **************************************/
    $("li[name=dayCircle]").each(function () {
        $(this).click(function () {
            $(this).addClass("selectedDay");
            $(this).siblings().removeClass("selectedDay");
            // alert("CLICK");
        });
    });

    //     $("td").each(function () {
    //         $(this).click(function () {
    //             $(this).addClass("selected");
    //             $(this).siblings().removeClass("selected");
    //         });
    //     });
    // });
});