function day_info(data) {
    $(function () {
        $aDay = $.trim(data[0]["period"]);

        $dayStr = $aDay.split("/");

        if ($dayStr.indexOf("mon") != -1) {
            $i = jQuery.inArray("mon", $dayStr);
            $dayStr.splice($i, 1, "월");

            $("b[name='upload_day']").append("&nbsp;월&nbsp;");
        }

        if ($dayStr.indexOf("tue") != -1) {
            $i = jQuery.inArray("tue", $dayStr);
            $dayStr.splice($i, 1, "화");

            $("b[name='upload_day']").append("&nbsp;화&nbsp;");
        }

        if ($dayStr.indexOf("wed") != -1) {
            $i = jQuery.inArray("wed", $dayStr);
            $dayStr.splice($i, 1, "수");

            $("b[name='upload_day']").append("&nbsp;수&nbsp;");
        }

        if ($dayStr.indexOf("thr") != -1) {
            $i = jQuery.inArray("thr", $dayStr);
            $dayStr.splice($i, 1, "목");

            $("b[name='upload_day']").append("&nbsp;목&nbsp;");
        }

        if ($dayStr.indexOf("fri") != -1) {
            $i = jQuery.inArray("fri", $dayStr);
            $dayStr.splice($i, 1, "금");

            $("b[name='upload_day']").append("&nbsp;금&nbsp;");
        }

        if ($dayStr.indexOf("sat") != -1) {
            $i = jQuery.inArray("sat", $dayStr);
            $dayStr.splice($i, 1, "토");

            $("b[name='upload_day']").append("&nbsp;토&nbsp;");
        }

        if ($dayStr.indexOf("sun") != -1) {
            $i = jQuery.inArray("sun", $dayStr);
            $dayStr.splice($i, 1, "일");

            $("b[name='upload_day']").append("&nbsp;일&nbsp;");
        }
    });
}