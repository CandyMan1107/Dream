function history_info(data) {
    $(function () {
        $("div[name=history-info]").hide();

        $test = $("div").filter("#timeline").attr("id");

        if ($test == $("div").filter("#timeline").attr("id")) {
            $("li[name='event_list']").on("click", function () {
                $arrayId = $(this).attr("id");
                // alert(data[$arrayId]['event_name']);

                if ($("div[name=history-info]").is(':visible') == false) {
                    $("div[name=history-info]").show();

                    $("td[name='event-name']").empty();
                    $("td[name='event-content']").empty();
                    $("td[name='event-refer_info']").empty();
                    $("td[name='event-other']").empty();
                    $("td[name='event-day']").empty();

                    $start_day = data[$arrayId]['start_day'];
                    $end_day = data[$arrayId]['end_day']
                    $event_day = $start_day + " ~ " + $end_day;

                    $("td[name='event-name']").append(data[$arrayId]['event_name']);
                    $("td[name='event-content']").append(data[$arrayId]['event_content']);
                    $("td[name='event-refer_info']").append(data[$arrayId]['refer_info']);
                    $("td[name='event-other']").append(data[$arrayId]['other']);
                    $("td[name='event-day']").append($event_day);
                } else {
                    $("div[name=history-info]").hide();
                }

                

            });
        }


    });
}