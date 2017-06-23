$(function () {
    $("a[name=arrow-back]").on("click", function () {
        var data = parseInt($(this).data("id"));
        if (data <= 0) {
            alert("첫화 입니다.");
            event.preventDefault();
        }
    });

    // $("a[name=arrow-forward]").on("click", function () {
    //     var data = $(this).data("id");
    //     alert(data);
    //     if (!isset(data)) {
    //         alert("마지막화 입니다.");
    //         event.preventDefault();
    //     }
    // });
   
});