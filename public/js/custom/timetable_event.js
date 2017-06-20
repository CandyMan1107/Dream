var event_id = 0;

function timetableEvent(data){
    $(document).ready(function(){
        $('#submit_delete').hide();
        $('.event_list').click(function() {
                event_id = $(this).attr("id");
                $('.refer_info').remove();
                // alert(event_id);
                $('#name').text("사건 정보");
                $('#event_name').val(data[event_id]['event_name']);
                $('#event_content').val(data[event_id]['event_content']);
                if(data[event_id]['refer_info'].length>1){
                    // alert(data[event_id]['refer_info'][1]);
                    for( var i = 0; data[event_id]['refer_info'].length > i ; i++){
                        // alert(data[event_id]['refer_info'][i]);
                        $('.refer_info_div').append('<input type="text" class="form-control refer_info" name="refer_info[]" id='+i+' value="'+data[event_id]['refer_info'][i]+'">');
                    }
                }
                else {
                    $('.refer_info_div').append('<input type="text" class="form-control refer_info" name="refer_info[]" id='+i+' value="'+data[event_id]['refer_info']+'">');
                }
                $('#timetable_id').val(data[event_id]['id']);
                // alert($("#timetable_id").val());
                $('#start_day').val(data[event_id]['start_day']);
                $('#end_day').val(data[event_id]['end_day']);
                // $('#character').val(data[event_id]['character']);
                // $('#item').val(data[event_id]['items']);
                // $('#place').val(data[event_id]['places']);
                $('#other').val(data[event_id]['other']);
                $('#submit_history').text("수정");
                $('#submit_delete').show();
        });
    });
}
