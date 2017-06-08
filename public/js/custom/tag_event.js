var event_id = 0;

function tag_click(tag_data){
    $(document).ready(function(){
        $('#tag_submit').hide();
        $('.event_list').click(function() {
            event_id = $(this).attr("id");
            $('#object_id').val(event_id);
            $('#tag_submit').show();
                // alert(event_id);
        });
    });
}
