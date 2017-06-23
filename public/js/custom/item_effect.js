$(document).ready(function(){
    var item_id = [];
    var img_name = [];
    $('.item_list').click(function(){
        item_id.push($(this).attr("id"));
        $(this).css("border","2px solid red");
        img_name.push($(this).attr("src"));
    });

    $('.item_effect_submit').click(function(){
        
        if (item_id[0]){
            for(var i =0; img_name.length > i ; i++ ){
                var img_path = img_name[i];
                // alert(img_path);
                $('.inner_items').append('<img src='+img_path+' alt="item image" class="img-circle img-things-size effect_item" style="margin : 17px">');
                $('.inner_items').append('<input type="hidden" name="item_id[]" value="'+item_id[i]+'">');
                $('.inner_items').append('<input type="text" class="form-control effect_item" name="effect_item[]" placeholder="내용" style="width:70%; float:right; margin-top:25px">');
                $('.inner_items').append('<p></p>');
            }  
        }
        else {
            alert("fail");
        }
    });
});