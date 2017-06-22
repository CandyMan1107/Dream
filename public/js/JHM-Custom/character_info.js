function character_info(data) {
    $(document).ready(function () {
        // $img_num = $("div[name=background-view]").children("img").length;
        $("div[name=background-info]").hide();

        $("img").each(function () {
            $(this).click(function () {
                if (!$(this).hasClass("selectedCharacter")) {
                    $id = $(this).attr("id");
                    $arrayId = $id - 1;
                    // alert($id);
                    $(this).addClass("selectedCharacter");
                    $(this).siblings().removeClass("selectedCharacter");
                    // $("div[name=background-view]").find("img").first().css("border", "1px solid red");
                    $("div[name=background-view]").find("img").first().before($(this));
                    $("div").animate({                
                        scrollTop :  0            
                    },  400);

                    // if ($("div[name=background-info]").hide()) {
                        // alert("NOT NULL!");
                        $("td[name='name']").empty();
                        $("td[name='age']").empty();
                        $("td[name='gender']").empty();
                        $("td[name='info']").empty();
                        $("td[name='refer_info']").empty();

                        $("div[name=background-info]").show();

                        $("td[name='name']").append(data[$arrayId]['name']);
                        $("td[name='age']").append(data[$arrayId]['age']);
                        $("td[name='gender']").append(data[$arrayId]['gender']);
                        $("td[name='info']").append(data[$arrayId]['info']);
                        $("td[name='refer_info']").append(data[$arrayId]['refer_info']);
                    // }
                    //  else if ($("div[name=background-info]").show()) {
                    //     $("td[name='name']").empty();
                    //     $("td[name='age']").empty();
                    //     $("td[name='gender']").empty();
                    //     $("td[name='info']").empty();
                    //     $("td[name='refer_info']").empty();
                    // }

                } else {
                    $(this).removeClass("selectedCharacter");
                    $("div[name=background-info]").hide();
                    $("td[name='name']").empty();
                    $("td[name='age']").empty();
                    $("td[name='gender']").empty();
                    $("td[name='info']").empty();
                    $("td[name='refer_info']").empty();
                }

            });
        });

    });
}