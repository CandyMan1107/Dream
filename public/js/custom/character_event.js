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
                $('.refer_info').remove();
                $('#name').text("캐릭터 정보");
                $('#character_id').val(data[event_id]['id']);
                $('#character_name').val(data[event_id]['name']);
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
                $('#character_content').val(data[event_id]['info']);
                $('#age').val(data[event_id]['age']);
                $('#gender').val(data[event_id]['gender']);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url : "character/ownership_icon",
                    data : { 
                            character_id : data[event_id]['id'] 
                        },
                    success:function(data){
                        var ownership_item = data[0]["item_id"].split("+");
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url : "character/ownership_img",
                            data : {
                                item_id : ownership_item
                            },
                            success:function(data){
                                // console.log(data);
                                // console.log(data[0][0]['img_src']);
                                // console.log(data.length);
                                $('.ownership_item_list').remove();
                                for(var i = 0; i < data.length; i++){
                                    console.log(data[i][0]['img_src']);
                                    var img_path = "/img/background/itemImg/"+data[i][0]['img_src'];
                                    console.log(img_path);
                                    $('.inner').append('<img src='+img_path+' alt="item image" class="img-circle img-things-size ownership_item_list" style="margin : 17px">');
                                }
                            },
                            error:function(){
                                alert("대실패");
                            }
                        });
                    },
                    error:function(){
                        alert("실패");
                    }
                });
            });
        });
    });
}
