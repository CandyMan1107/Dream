$(document).ready(function(){
    var map_id = [];
    var img_name = [];
    $('.map_list').click(function(){
        map_id.push($(this).attr("id"));
        $(this).css("border","2px solid red");
        img_name.push($(this).attr("src"));
    });

    $('.map_effect_submit').click(function(){
        
        if ( map_id[0]){
            for(var i =0; img_name.length > i ; i++ ){
                var img_path = img_name[i];
                // alert(img_path);
                $('.inner_maps').append('<img src='+img_path+' alt="map image" class="img-circle img-things-size effect_map" style="margin : 17px">');
                $('.inner_maps').append('<input type="hidden" name="map_id[]" value="'+map_id[i]+'">');
                $('.inner_maps').append('<input type="text" class="form-control effect_map" name="effect_map[]" placeholder="내용" style="width:70%; float:right; margin-top:25px">');
                $('.inner_maps').append('<p></p>');
            }  
        }
        else {
            alert("맵실패");
        }
    });
});