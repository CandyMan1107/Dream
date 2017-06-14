var event_id = 0;

function character_event(data){
    $(document).ready(function(){  
        $("img[name=character_icon]").each(function(){
            $(this).click(function(){
                // .selected border : 2px solid red
                if(!$(this).hasClass("selected")){
                    $(this).addClass("selected");
                   
                    $(this).siblings().removeClass("selected");
                }
                event_id = $(this).attr("id")-1;
                $('#name').text("캐릭터 정보");
                $('#character_id').val(data[event_id]['id']);
                $('#character_name').val(data[event_id]['name']);
                $('#character_content').val(data[event_id]['info']);
                $('#refer_info').val(data[event_id]['refer_info']);
                $('#age').val(data[event_id]['age']);
                $('#gender').val(data[event_id]['gender']);
            });
        });
    });
}
