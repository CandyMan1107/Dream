$(document).ready(function(){
    $(".chapter_click").each(function(){
        $(this).click(function(){
            // .selected border : 2px solid red
            // if(!$(this).hasClass("selected")){
            //     $(this).addClass("selected");
                
            //     $(this).siblings().removeClass("selected");
            // }
            alert("34");
        });
    });

    // $(".chapter_click").click(function(){
    //     var name = $(".chapter_val").val();
    //     // alert(name);
    //     var novel_id = $("#novel_id").val();
    //     let ajax_url = "episode/"+novel_id;

    //     $('.chapter_data').append(
    //         '<h3 class="text-center">name</h3>'
    //     );
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