$(document).ready(function(){
    $('.share_icon').click(function(){
        $("#none_set_background").remove();
        let click_id = $(this).attr("id");


        let get_background_url = 'share/get_background/'+click_id;
        
        $.ajax({
            type: "GET",
            url: get_background_url,
            success: function (data) {
                // console.log(data);
                // character 의 경우
                $('.open_character_data_set').remove();
                $('.none_set_background').remove();
                $('.open_character_icon').remove();
                $('.open_item_data_set').remove();
                $('.open_list').remove();
                $('.timetable_append_area').remove();
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
                else if (click_id=="timetables"){
                    // alert("23");
                    
                    let timetable_append = "<div class='timetable_append_area'>"
                    timetable_append += "       <div id='timeline'>"
                    timetable_append += "       </div>"
                    timetable_append += "       <div id='timetable_icon'>"
                    timetable_append += "       </div>"
                    timetable_append += "   </div>"

                    $('#none_set_open_background').append(timetable_append);
                    
                    let timetable_icon_list = "<nav aria-label='...'>"
                    timetable_icon_list += "    <ul class='pager' id='timetableList'>"    
                    for(let i = 0 ; i < data.length ; i++){
                    timetable_icon_list += "        <li class='event_list draggable' id='" + i + "'><a href='#'>" + data[i]['event_name'] + "</a></li>"
                    }
                    timetable_icon_list += "    </ul>"
                    timetable_icon_list += "</nav>"

                    $('#timetable_icon').append(timetable_icon_list);
                    ready(data);

                    let get_open_timetable_url = 'share/get_open_timetable';
                    $.ajax({
                        type: "GET",
                        url: get_open_timetable_url,
                        success: function (data) {
                            console.log(data);
                            let open_timetable = "<div class='timetable_append_area'>"
                            open_timetable += "       <div id='timeline2'>"
                            open_timetable += "       </div>"
                            open_timetable += "       <div id='timetable_icon2'>"
                            open_timetable += "       </div>"
                            open_timetable += "   </div>"
                            $('#open_background').append(open_timetable);
                            ready(data,2);
                            let open_timetable_icon_list = "<nav aria-label='...'>"
                            open_timetable_icon_list += "    <ul class='pager' id='timetableList'>"
                            for (let i = 0; i < data.length; i++) {
                                open_timetable_icon_list += "        <li class='event_list open_list' id='" + i + "'><a href='#'>" + data[i]['event_name'] + "</a></li>"
                            }
                            open_timetable_icon_list += "    </ul>"
                            open_timetable_icon_list += "</nav>"

                            $('#timetable_icon2').append(open_timetable_icon_list);
                            $('.open_list').click(function () {
                                $('.open_timetable_data_set').remove();
                                $id = $(this).attr('id');
                                // alert($id);
                                append_timetable_data($id, data)
                            });
                        },
                        error: function (request, status, error) {
                            alert("code:" + request.status + "\n" + "error:" + error);
                        }
                    });
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
                            // console.log($id);
                            // alert(click_id);
                            
                            if( click_id == "characters"){
                                $('.open_character_data_set').remove();
                                append_character_data($id, data);
                            }
                            else if ( click_id == "items"){
                                $('.open_item_data_set').remove();
                                append_item_data($id,data);
                            }
                            else if ( click_id == "timetables") {
                                $('.open_timetable_data_set').remove();
                                append_timetable_data($id,data)
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

function append_timetable_data($id,data){
    let timetable_data_append = "<div class='open_timetable_data_set'>"
    timetable_data_append += "      <h3 id='name'>사건정보</h3>"
    timetable_data_append += "      <input type='hidden' name='kind' id='' value='timetables'>"
    timetable_data_append += "      <input type='hidden' name='id' id='' value='" + data[$id]['id'] + "'>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>제목</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <input class='form-control' type='text' name='event_name' id='event_name' value='"+data[$id]['event_name']+"'>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>내용</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <textarea class='form-control' rows='3' name='event_content' id='event_content'>"+data[$id]['event_content']+"</textarea>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    // 사건 기간
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>기간</label>"
    timetable_data_append += "          <div class='col-xs-4'>"
    timetable_data_append += "              <input type='text' name='start_day' id='start_day' class='form-control' value='"+data[$id]['start_day']+"'>"
    timetable_data_append += "          </div>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>~</label>"
    timetable_data_append += "          <div class='col-xs-4'>"
    timetable_data_append += "              <input type='text' name='end_day' id='end_day' class='form-control' value='"+data[$id]['end_day']+"'>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div id='timetable_id' value='timetable_value'></div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>등장 인물</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <div class='inner_characters'></div>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>등장 사물</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <div class='inner_items'></div>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>배경 장소</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <div class='inner_maps'></div>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>연관 관계</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <div class='inner_relations'></div>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <div class='form-group form-group-lg'>"
    timetable_data_append += "          <label class='col-sm-2 control-label' for='formGroupInputLarge'>기타</label>"
    timetable_data_append += "          <div class='col-sm-10'>"
    timetable_data_append += "              <textarea class='form-control' id = 'other' name='other' rows='3'></textarea>"
    timetable_data_append += "          </div>"
    timetable_data_append += "      </div>"
    timetable_data_append += "      <button type='submit' id='submit_history' class='btn btn-default'>등록</button>"
    timetable_data_append += "  </div>"

    $('.set_open_background_data').append(timetable_data_append);

    if(data[$id][0]) {
        effect_character_append = ""
        effect_item_append = ""
        effect_map_append = ""
        effect_relation_append = ""
        for(let i = 0 ; i < data[$id]['effect_count'] ; i++ ){
            if(data[$id][i]['affect_table'] == "characters"){
                effect_character_append += "<img src='/img/background/characterImg/"+data[$id][i]['img_src']+"' alt='character image' class='img-circle img-things-size affect' style='margin : 17px'>"
                effect_character_append += "<input type='text' class='form-control affect' id='' name='effect_character[]' style='width:70%; float:right; margin-top:25px' value='"+data[$id][i]['affect_content']+"'>"
                effect_character_append += "<input type='hidden' class='affect_character' name='character_id[]' value='"+data[$id][i]['id']+"'>"
            }
            if(data[$id][i]['affect_table'] == "items"){
                effect_item_append += "<img src='/img/background/itemImg/"+data[$id][i]['img_src']+"' alt='item image' class='img-circle img-things-size affect' style='margin : 17px'>"
                effect_item_append += "<input type='text' class='form-control affect' id='' name='effect_item[]' style='width:70%; float: right; margin-top:25px' value='"+data[$id][i]['affect_content']+"'>"
                effect_item_append += "<input type='hidden' class='affect_item' name='item_id[]' value='"+data[$id][i]['id']+"'>"
            }
            if(data[$id][i]['affect_table'] == "maps"){
                effect_map_append += "<img src='/img/background/mapImg/mapCover/"+data[$id][i]['img_src']+"' alt='map image' class='img-circle img-things-size affect' style='margin : 17px'>"
                effect_map_append += "<input type='text' class='form-control affect' id='' name='effect_map[]' style='width:70%; float:right; margin-top:25px' value='"+data[$id][i]['affect_content']+"'>"
                effect_map_append += "<input type='hidden' class='affect_map' name='map_id[]' value='"+data[$id][i]['id']+"'>"
            }
            if(data[$id][i]['affect_table'] == "relations"){
                effect_relation_append += "<img src='/img/background/relationImg/"+data[$id][i]['img_src']+"' alt='relation image' class='img-circle img-things-size affect' style='margin : 17px'>"
                effect_relation_append += "<input type='text' class='form-control affect' id='' name='effect_relation[]' style='width:70%; float:right; margin-top:25px' value='"+data[$id][i]['affect_content']+"'>"
                effect_relation_append += "<input type='hidden' class='affect_relation' name='relation_id[]' value='"+data[$id][i]['id']+"'>"
            }
        }
        // console.log(data[$id]['effect_count']);
        $('.inner_characters').append(effect_character_append);
        $('.inner_items').append(effect_item_append);
        $('.inner_maps').append(effect_map_append);
        $('.inner_relations').append(effect_relation_append);
    }
    // console.log(data);
}