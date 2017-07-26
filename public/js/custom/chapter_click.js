$(document).ready(function(){
    $(".chapter_click").each(function(i,e){
        $(this).click(function(){
            let chapter_id = $("#chapter_id"+i).attr('value');
            let chapter_name = $("#chapter_name"+i).attr('value');
            let novel_id = $("#novel_id").val();
            let ajax_url = "episode/"+chapter_id;
            let no_ajax_url = "noepisode/"+novel_id+"/"+chapter_id;
            // alert(chapter_id);
            // alert(chapter_name);
            
            var data;
            // 챕터에 등록한 회차 정보 ajax
            $.ajax({
                type: "GET",
                url : ajax_url,
                success:function(data){
                    // alert(data);
                    var append_data = "<div class='chapter_info'>"
                    append_data += "    <h3 class='text-center'>"+chapter_name+"</h3>"
                    append_data += "    <div class='row chapter_side' id='chapter_data'>"
                    append_data += "        <table class='table table-condensed'>"
                    for(var i = 0; i < data.length ; i++){
                        append_data += "        <tr>"
                        append_data += "            <th> </th>"
                        append_data += "            <th>에피소드 제목</th>"
                        append_data += "        </tr>"
                        append_data += "        <tr>"
                        append_data += "            <td>"
                        append_data += "                <img src='/upload/images/"+data[i]['cover_img_src']+"' alt='episode img' class='img-circle' style='width : 50px; height:50px'>"
                        append_data += "            </td>"
                        append_data += "            <td>"+data[i]['episode_title']+"</td>"
                        append_data += "        </tr>"
                    }
                    append_data += ""
                    append_data += "    </div>"
                    append_data += "    <div class='text-center' data-toggle='modal' data-target='#episode'>"
                    append_data += "        <p class='remote'>"
                    append_data += "            <a class='setView' href='#'>"
                    append_data += "                <i class='fa fa-plus-square-o fa-3x'></i>"
                    append_data += "            </a>"
                    append_data += "        </p>"
                    append_data += "    </div>"
                    append_data += "</div>"
                    
                    $('.chapter_data').append(append_data);
                },
                error:function(){
                    alert("chapter 실패");
                }
            });

            $.ajax({
                type: "GET",
                url : no_ajax_url,
                success:function(modal_data){
                    $('.chapter_data').append(modal_data);;
                },
                error:function(){
                    alert("novel 실패");
                }
            });

            $('div').remove('.chapter_info');
            // alert(data);
            // 스크립트로 종속된 에피소드만큼 출력하기
            

                    // alert(ajax_url);
            //  회차 추가 버튼 클릭 시 ajax
            // $.ajax({
            //     type: "GET",
            //     url : no_ajax_url,
            //     success:function(data){
            //         alert(data);
            //     },
            //     error:function(){
            //         alert("실패");
            //     }
            // });
        });
    });

    // $(".chapter_click").click(function(){
});