$(document).ready(function(){
    $(".chapter_click").click(function(){
        var name = $(".chapter_val").val();
        // alert(name);
        var novel_id = $("#novel_id").val();
        alert(novel_id);
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