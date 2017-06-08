var event_id = 0;

function timetableEvent(data){
    $(document).ready(function(){
        $('#submit_delete').hide();
        $('.event_list').click(function() {
                event_id = $(this).attr("id");
                // alert(event_id);
                $('#name').text("사건 정보");
                $('#event_name').val(data[event_id]['event_name']);
                $('#event_content').val(data[event_id]['event_content']);
                $('#add_item').val(data[event_id]['add_items']);
                $('#start_day').val(data[event_id]['start_day']);
                $('#end_day').val(data[event_id]['end_day']);
                $('#character').val(data[event_id]['character']);
                $('#item').val(data[event_id]['items']);
                $('#place').val(data[event_id]['places']);
                $('#other').val(data[event_id]['other']);
                $('#submit_history').text("수정");
                $('#submit_delete').show();

            //     $.ajax({
            //         type: "GET",
            //         url : "tagsAdd/get",
            //         data : { event_id : event_id },
                    
            //         success:function(data){
            //             // alert("data success:" + data );
            //         },
            //         error:function(){
            //             // alert("ㅅㅂ");
            //         }
            // });
        });
    });
}


