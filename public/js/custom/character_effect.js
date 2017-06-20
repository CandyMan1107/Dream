$(document).ready(function(){
    var character_id = [];
    var img_name = [];
    $('.character_list').click(function(){
        character_id.push($(this).attr("id"));
        $(this).css("border","2px solid red");
        img_name.push($(this).attr("src"));
    });

    $('.character_effect_submit').click(function(){
        
        if ( character_id[0]){
            for(var i =0; img_name.length > i ; i++ ){
                var img_path = img_name[i];
                // alert(img_path);
                $('.inner_character').append('<img src='+img_path+' alt="item image" class="img-circle img-things-size effect_character" style="margin : 17px">');
                $('.inner_character').append('<input type="hidden" name="character_id[]" value="'+character_id[i]+'">');
                $('.inner_character').append('<input type="text" class="form-control effect_character" name="effect_character[]" placeholder="내용" style="width:70%; float:right; margin-top:25px">');
                $('.inner_character').append('<p></p>');
            }  
        }
        else {
            alert("fail");
        }
    });
});