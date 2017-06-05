$(document).ready(function () {
    /**************************************
    /novel/read/novel_read_view.blade.php
    **************************************/
    // 기본 설정은 Web
    $("ul[name=bookMode]").hide();

    $("li").filter(".viewScreen").each(function() {
        $(this).click(function () {
            if($(this).hasClass("viewOff")) {
                $(this).removeClass("viewOff").addClass("viewOn");
                $(this).siblings().removeClass("viewOn").addClass("viewOff");

                if($(this).hasClass("webMode")) {
                    // alert("WEB");
                    $("ul[name=bookMode]").hide();
                } else if($(this).hasClass("bookMode")) {
                    // alert("BOOK");
                    $("ul[name=bookMode]").show();
                }
            }
        });
    });

    $("li").filter(".fontList").each(function() {
        var font = $(this).attr("value");
        $(this).css("font-family", font);
        $(this).click(function () {
            if(!$(this).hasClass("on-font")) {
                $(this).removeClass("off-font").addClass("on-font");
                $(this).siblings().removeClass("on-font").addClass("off-font");
            }

            // var font = $(this).attr("value");
            // alert(font);
            $("div").filter(".example-text").css("font-family", font);   
            $("div").filter(".novel-viewer").css("font-family", font);      
        });
    });

    $("li").filter(".sizeList").each(function() {
        $(this).click(function () {
            if(!$(this).hasClass("on-font")) {
                $(this).removeClass("off-font").addClass("on-font");
                $(this).siblings().removeClass("on-font").addClass("off-font");
            }

            var size = $(this).text();
            // alert(size);
            $("div").filter(".example-text").css("font-size", size);   
            $("div").filter(".novel-viewer").css("font-size", size);
        });
    });

    $("li").filter(".lineList").each(function() {
        $(this).click(function () {
            if(!$(this).hasClass("on-font")) {
                $(this).removeClass("off-font").addClass("on-font");
                $(this).siblings().removeClass("on-font").addClass("off-font");
            }
            
            var line = $(this).text();
            // alert(line);
            $("div").filter(".example-text").css("line-height", line);   
            $("div").filter(".novel-viewer").css("line-height", line);
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

            if($(this).hasClass("font-color")) {
                var fontColor = $(this).attr("value");
                // alert(fontColor);
                $("div").filter(".example-text").css("color", fontColor);
                $("div").filter(".novel-viewer").css("color", fontColor);
            } else if($(this).hasClass("back-color")) {
                var backColor = $(this).attr("value");
                // alert(backColor);
                $("div").filter(".example-text").css("background", backColor);
                $("div").filter(".novel-viewer").css("background", backColor);
            }
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