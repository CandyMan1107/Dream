$(document).ready(function () {
    /**************************************
    /novel/read/novel_read_view.blade.php
    **************************************/
    $("li").filter(".viewScreen").each(function() {
        $(this).click(function () {
            if($(this).hasClass("viewOff")) {
                $(this).removeClass("viewOff").addClass("viewOn");
                $(this).siblings().removeClass("viewOn").addClass("viewOff");
            }
        });
    });

    $("li").filter(".fontList").each(function() {
        $(this).click(function () {
            if(!$(this).hasClass("on-font")) {
                $(this).removeClass("off-font").addClass("on-font");
                $(this).siblings().removeClass("on-font").addClass("off-font");
            }

            var font = $(this).attr("value");
            // alert(font);
            $("div").filter(".example-text").css("font-family", font);   
            $("div").filter(".novel-viewer").css("font-family", font);      
        });
    });

    $("li").filter(".colorBox").each(function() {
        var color = $(this).attr("value");
        $(this).css("background", color);

        $(this).click(function() {
            if(!$(this).hasClass("on-colorBox")) {
                $(this).removeClass("off-colorBox").addClass("on-colorBox");
                $(this).siblings().removeClass("on-colorBox").addClass("off-colorBox");
            }

            var fontColor = $(".fontColor").attr("value");
            alert(fontColor);
            var backColor = $("li").filter(".back-color").attr("value");

            // $("div").filter(".example-text").css("color", fontColor);   
            // $("div").filter(".example-text").css("background", backColor);
            // $("div").filter(".novel-viewer").css("color", fontColor);   
            // $("div").filter(".novel-viewer").css("background", backColor);
        });
    });

    /**************************************
    /novel/today_novel_by_day.blade.php
    **************************************/
    // $(document).ready(function () {
    //     $("li").each(function () {
    //         $(this).click(function () {
    //             $(this).addClass("selected");
    //             $(this).siblings().removeClass("selected");
    //         });
    //     });

    //     $("td").each(function () {
    //         $(this).click(function () {
    //             $(this).addClass("selected");
    //             $(this).siblings().removeClass("selected");
    //         });
    //     });
    // });
});