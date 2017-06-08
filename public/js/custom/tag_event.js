var event_id = 0;

function tag_click(event_id){
    $(document).ready(function(){
        $('#submit_delete').hide();
        $('.event_list').click(function() {
                event_id = $(this).attr("id");
                
                alert(event_id);
        });
    });
}
