function genre_info(data) {
    $(function () {
        $("h3[name='genre']").each(function () {
            $aGenre = $(this).text();
            $genre = $.trim($aGenre);

            if ($genre == "martial") {
                $(this).text("무협");
            } else if ($genre == "fantasy") {
                $(this).text("판타지");
            } else if ($genre == "romance") {
                $(this).text("로맨스");
            } else if ($genre == "horror") {
                $(this).text("호러");
            }
        });

        $("h5[name='genre']").each(function () {
            $aGenre = $(this).text();
            $genre = $.trim($aGenre);

            if ($genre == "martial") {
                $(this).text("무협");
            } else if ($genre == "fantasy") {
                $(this).text("판타지");
            } else if ($genre == "romance") {
                $(this).text("로맨스");
            } else if ($genre == "horror") {
                $(this).text("호러");
            }
        });

    });
}