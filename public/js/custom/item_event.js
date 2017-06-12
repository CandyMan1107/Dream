var event_id = 0;

function item_event(data){
    $(document).ready(function(){
        $('.item_list').click(function(){
            event_id = $(this).attr("id")-1;
            $('#name').text("사물 정보");
            $('#item_name').val(data[event_id]['name']);
            $('#item_cate').val(data[event_id]['category']);
            $('#item_content').val(data[event_id]['info']);
            $('#item_refer_info').val(data[event_id]['refer_info']);
        });
    });
}