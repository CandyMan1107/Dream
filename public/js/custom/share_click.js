$(document).ready(function(){
    $('.share_icon').click(function(){
        $("#none_set_background").remove();
        let click_id = $(this).attr("id");


        let get_background_url = 'share/get_background/'+click_id;
        
        $.ajax({
            type: "GET",
            url: get_background_url,
            success: function (data) {
                // alert(data);
                // character 의 경우
                $('.open_character_data_set').remove();
                $('.none_set_background').remove();
                $('.open_character_icon').remove();
                $('.open_item_data_set').remove();
                $('.open_list').remove();
                if( click_id == "characters") {
                    
                    character_append = "<div id='none_set_background'>"
                    for(let i = 0; i < data.length ; i++ ){
                        character_append += "<img src='/img/background/characterImg/"+data[i]['img_src']+"' alt='character image' class='img-circle img-things-size character_list event_list draggable' id='"+i+"' name='character_icon' style='margin : 15px'>"
                    }
                    character_append += "</div>"  
                    
                    $('#none_set_open_background').append(character_append);

                    // $('.character_list').click(function (e,i) {
                    //     
                    //     console.log(img_id);
                    // });
                    
                    let get_open_character_url = 'share/get_open_character';
                    $.ajax({
                        type: "GET",
                        url : get_open_character_url,
                        success: function(data){
                            console.log(data);
                            let open_character = "<div class='open_character_icon'>"
                            for(let i = 0; i < data.length ; i++ ){
                                open_character += "<img src='/img/background/characterImg/" + data[i]['img_src'] + "' alt='character image' class='img-circle img-things-size open_list' id='"+i+"' name='open_character_icon' style='margin : 15px'>"
                            }
                            open_character += "</div>"
                            $('#open_background').append(open_character);

                            $('.open_list').click(function () {
                                $('.open_character_data_set').remove();
                                $id = $(this).attr('id');
                                // alert($id);
                                append_character_data($id, data)
                            });
                        },
                        error: function (request, status, error) {
                            alert("code:" + request.status + "\n" + "error:" + error);
                        }
                    });
                }
                else if(click_id == "items"){
                    item_append = "<div id='none_set_background'>"
                    for (let i = 0; i < data.length; i++) {
                        item_append += "<img src='/img/background/itemImg/" + data[i]['img_src'] + "' alt='item image' class='img-circle img-things-size item_list event_list draggable' id='" + i + "' name='item_icon' style='margin : 15px'>"
                    }
                    item_append += "</div>"

                    $('#none_set_open_background').append(item_append);

                    let get_open_item_url = 'share/get_open_item';
                    $.ajax({
                        type: "GET",
                        url: get_open_item_url,
                        success: function (data) {
                            console.log(data);
                            let open_item = "<div class='open_item_icon'>"
                            for (let i = 0; i < data.length; i++) {
                                open_item += "<img src='/img/background/itemImg/" + data[i]['img_src'] + "' alt='item image' class='img-circle img-things-size open_list' id='" + i + "' name='open_item_icon' style='margin : 15px'>"
                            }
                            open_item += "</div>"
                            $('#open_background').append(open_item);

                            $('.open_list').click(function () {
                                $('.open_item_data_set').remove();
                                $id = $(this).attr('id');
                                // alert($id);
                                append_item_data($id, data)
                            });
                        },
                        error: function (request, status, error) {
                            alert("code:" + request.status + "\n" + "error:" + error);
                        }
                    });
                }
                else if(click_id=="relations"){
                    alert("23");
                }
                $(function () {
                    $(".draggable").draggable({
                    });
                    $(".draggable").data('previouseId');
                    $("#open_background").droppable({
                        drop: function (event, ui) {
                            // alert('Previous container id: ' + ui.draggable.data('previousId'));
                            // 드롭한 데이터 가져오기
                            $data = ui.draggable.data('previousId', $(this).attr('id'));
                            // 드롭한 데이터 id값
                            $id = $data.attr('id');
                            console.log($id);
                            // alert(click_id);
                            
                            if( click_id == "characters"){
                                $('.open_character_data_set').remove();
                                append_character_data($id, data);
                            }
                            else if ( click_id == "items"){
                                $('.open_item_data_set').remove();
                                append_item_data($id,data);
                            }
                            // console.log(data);
                        }
                    });
                });
            },
            error: function (request, status, error) {
                alert("code:" + request.status + "\n" + "error:" + error);
            }
        });
        
    });
    
});

function append_character_data($id,data){
    // character_data_append += "      <input type='hidden' name='_token' value='{{ csrf_token() }}'>"
    let character_data_append = "<div class='open_character_data_set'>"
    character_data_append += "      <input type='hidden' name='kind' id='' value='characters'>"
    character_data_append += "      <input type='hidden' name='id' id='' value='"+data[$id]['id']+"'>"
    character_data_append += "      <input type='hidden' name='img_src' id='img_src' value='" +data[$id]['img_src']+ "'>"
    character_data_append += "      <h3 id='name'>캐릭터 정보 제한</h3>"
    // 캐릭터 이름
    character_data_append += "      <div class='form-group form-group-lg'>"
    character_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>이름</label>"
    character_data_append += "              <div class='col-sm-10'>"
    character_data_append += "                  <input class='form-control' type='text' id='character_name' name='character_name' placeholder='캐릭터 이름' value='"+data[$id]['name']+"'>"
    character_data_append += "              </div>"
    character_data_append += "      </div>"
    // 캐릭터 내용
    character_data_append += "      <div class='form-group form-group-lg'>"
    character_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>내용</label>"
    character_data_append += "          <div class='col-sm-10'>"
    character_data_append += "              <textarea class='form-control' rows='3' id='character_content' name='character_content'>"+data[$id]['info']+"</textarea>"
    character_data_append += "          </div>"
    character_data_append += "      </div>"
    // 나이와 성별
    character_data_append += "      <div class='form-group form-group-lg'>"
    character_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>나이</label>"
    character_data_append += "          <div class='col-xs-4'>"
    character_data_append += "              <input type='text' class='form-control' id='age' name='age' value='"+data[$id]['age']+"'>"
    character_data_append += "          </div>"
    character_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>성별</label>"
    character_data_append += "          <div class='col-xs-4'>"
    character_data_append += "              <input type='text' class='form-control' id='gender' name='gender' value='"+data[$id]['gender']+"'>"
    character_data_append += "          </div>"
    character_data_append += "      </div>"
    // 소유 사물
    if (data[$id]['ownership_img_src']){
    character_data_append += "      <div class='form-group form-group-lg'>"
    character_data_append += "          <label class='col-sm-3 control-label' for='formGroupInputLarge'>소유 사물</label>"
    character_data_append += "      </div>"
    character_data_append += "      <div>"
        for (let i = 0; i < data[$id]['ownership_img_src'].length; i++) {
    character_data_append += "          <img src='/img/background/itemImg/" + data[$id]['ownership_img_src'][i] + "' alt='ownership image' class='img-circle img-things-size ownership_list event_list draggable' id='ownership_img' name='ownership_img' style='margin : 15px'>"
    character_data_append += "          <input type='hidden' name='ownership_id[]' value='"+data[$id]['ownership_id'][i]+"'>"
        }
    character_data_append += "      </div>"
    }
    character_data_append += "      <button type='submit' class='btn btn-default'>등록</button>"
    character_data_append += "</div>"

    $('.set_open_background_data').append(character_data_append);
}

function append_item_data($id,data){
    // character_data_append += "      <input type='hidden' name='_token' value='{{ csrf_token() }}'>"
    let item_data_append = "<div class='open_item_data_set'>"
    item_data_append += "      <input type='hidden' name='kind' id='' value='items'>"
    item_data_append += "      <input type='hidden' name='id' id='' value='"+data[$id]['id']+"'>"
    item_data_append += "      <input type='hidden' name='img_src' id='img_src' value='" +data[$id]['img_src']+ "'>"
    item_data_append += "      <h3 id='name'>사물 정보 제한</h3>"
    // 사물 이름
    item_data_append += "      <div class='form-group form-group-lg'>"
    item_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>이름</label>"
    item_data_append += "              <div class='col-sm-10'>"
    item_data_append += "                  <input class='form-control' type='text' id='item_name' name='item_name' placeholder='사물 이름' value='"+data[$id]['name']+"'>"
    item_data_append += "              </div>"
    item_data_append += "      </div>"
    // 사물 내용
    item_data_append += "      <div class='form-group form-group-lg'>"
    item_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>내용</label>"
    item_data_append += "          <div class='col-sm-10'>"
    item_data_append += "              <textarea class='form-control' rows='3' id='item_content' name='item_content'>"+data[$id]['info']+"</textarea>"
    item_data_append += "          </div>"
    item_data_append += "      </div>"
    // 카테고리
    item_data_append += "      <div class='form-group form-group-lg'>"
    item_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>분류</label>"
    item_data_append += "          <div class='col-xs-10'>"
    item_data_append += "              <input type='text' class='form-control' id='category' name='category' value='"+data[$id]['category']+"'>"
    item_data_append += "          </div>"
    item_data_append += "      </div>"
    item_data_append += "      <button type='submit' class='btn btn-default'>등록</button>"
    item_data_append += "</div>"

    $('.set_open_background_data').append(item_data_append);
}