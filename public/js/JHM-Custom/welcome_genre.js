function welcome_genre(data) {
    $(function () {
        $welcomeStr = $("input[name='genre']").val();
        $welcomeGenre = $.trim($welcomeStr);

        if ($welcomeGenre == "martial") {
            $welcomeGenre = "무협";
        } else if ($welcomeGenre == "fantasy") {
            $welcomeGenre = "판타지";
        } else if ($welcomeGenre == "romance") {
            $welcomeGenre = "로맨스";
        } else if ($welcomeGenre == "sf") {
            $welcomeGenre = "SF";
        } else if ($welcomeGenre == "horror") {
            $welcomeGenre = "호러";
        } else if ($welcomeGenre == "mystery") {
            $welcomeGenre = "추리";
        }

        $("h3[name='genre']").append($welcomeGenre);
        $("h5[name='genre']").append($welcomeGenre);
    });
}