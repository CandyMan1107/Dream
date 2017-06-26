$(function () {
    $("input[name='genre']").each(function () {
        $welcomeStr = $(this).val();
        $welcomeGenre = $.trim($welcomeStr);

        if ($welcomeGenre == "martial") {
            $welcomeGenre = "무협";
        } else if ($welcomeGenre == "fantasy") {
            $welcomeGenre = "판타지";
        } else if ($welcomeGenre == "romance") {
            $welcomeGenre = "로맨스";
        } else if ($welcomeGenre == "scifi") {
            $welcomeGenre = "SF";
        } else if ($welcomeGenre == "horror") {
            $welcomeGenre = "호러";
        } else if ($welcomeGenre == "detective") {
            $welcomeGenre = "추리";
        }

        $(this).siblings("h3[name='genre']").append($welcomeGenre);
        $(this).siblings("h5").append($welcomeGenre);
    });
});