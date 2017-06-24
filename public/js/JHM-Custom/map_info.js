function map_info(data) {
    $(function () {
        $("div[name=map-info]").hide();

        $test = $("div[name='map-view']").attr("name");

        if ($test == $("div[name='map-view']").attr("name")) {
            $("img").filter(".map_list").on("click", function () {
                // alert("click!");
                if ($("div[name=map-info]").is(':visible') == false) {
                    $("div[name=map-info]").show();

                    $src = $("img").filter(".map_list").attr("src");
                    $imgId = $("img").filter(".map_list").attr("id");
                    
                    // alert($src);
                    // alert($imgId);

                    $img = "<img src='"+$src+"' alt='map image' class='text-right' id='"+$imgId+"'>";


                    // alert($img);

                    $("div[name=map-info]").empty();

                    $("div[name=map-info]").append($img);
                } else {
                    $("div[name=map-info]").hide();
                }
            });
        }
    });
}