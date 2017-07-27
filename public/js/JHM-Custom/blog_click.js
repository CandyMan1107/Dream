$(function () {
    $("a[name='blog_click']").each(function () {
        $(this).click(function () {
            $hrefStr = $(this).children("input[name='blog_href']").val();

            // IF $hrefStr in &
            if ($hrefStr.match("&")) {
                // alert("IT IS BOARD'S HREF!");
                $hrefArr = $hrefStr.split("&");

                $blog_menu_id = $hrefArr[0];
                $post_id = $hrefArr[1];

                alert($post_id);
            } else {

            }
            // alert($hrefStr);
        });
    });
});