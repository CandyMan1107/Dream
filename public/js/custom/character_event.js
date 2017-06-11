var event_id = 0;

function character_event(data){
    $(document).ready(function(){
        $('.character_list').click(function(){
            event_id = $(this).attr("id")-1;
            $('#name').text("캐릭터 정보");
            $('#character_name').val(data[event_id]['name']);
            $('#character_content').val(data[event_id]['info']);
            $('#refer_info').val(data[event_id]['refer_info']);
            $('#age').val(data[event_id]['age']);
            $('#gender').val(data[event_id]['gender']);


        });
    });
}