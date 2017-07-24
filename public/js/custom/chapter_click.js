$(document).ready(function(){
    $(".chapter_click").each(function(i,e){
        $(this).click(function(){
            let chapter_id = $("#chapter_id"+i).attr('value');
            let chapter_name = $("#chapter_name"+i).attr('value');
            let novel_id = $("#novel_id").val();
            let ajax_url = "episode/"+novel_id;
            alert(chapter_id);
            alert(chapter_name);

            $('div').remove('.chapter_info');

            let append_data = "<div class='chapter_info'>"
            append_data += "<h3 class='text-center'>"+chapter_name+"</h3>"
            append_data += "</div>"
            $('.chapter_data').append(append_data);
            
        });
    });

    // $(".chapter_click").click(function(){




    //     // alert(ajax_url);
    //     $.ajax({
    //         type: "GET",
    //         url : ajax_url,
    //         success:function(data){
    //             alert(data);
    //         },
    //         error:function(){
    //             alert("실패");
    //         }
    //     });
    // });
});