$(document).ready(function () {
    $current = new Date();

    $("li[name=dayCircle]").each(function () {
        $(this).click(function () {
            $(this).addClass("selectedDay");
            $(this).siblings().removeClass("selectedDay");
            // alert("CLICK");
            
            alert($current.toDateString());
            // 요일 빼놓고 explode 팡팡!
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