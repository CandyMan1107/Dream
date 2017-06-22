$(document).ready(function () {
    $("div").filter("container-fluid").find("i").each(function () {
        $(this).click(function () {
            alert("collapse!");
        });
    });
});