function info_genre(data) {
    $(function () {
        $infoGenre = $.trim(data[0]['genre']);

        if ($infoGenre == "martial") {
            $infoGenre = "무협";
        } else if ($infoGenre == "fantasy") {
            $infoGenre = "판타지";
        } else if ($infoGenre == "romance") {
            $infoGenre = "로맨스";
        } else if ($infoGenre == "sf") {
            $infoGenre = "SF";
        } else if ($infoGenre == "horror") {
            $infoGenre = "호러";
        } else if ($infoGenre == "mystery") {
            $infoGenre = "추리";
        }

        $("h5[name='genre']").append($infoGenre);

    });
}