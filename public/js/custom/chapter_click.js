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
            
            // 챕터에 등록한 회차 정보 ajax
            $.ajax({
                type: "GET",
                url : ajax_url,
                success:function(data){
                    // alert("성공");
                },
                error:function(){
                    alert("chapter 실패");
                }
            });

            $.ajax({
                type: "GET",
                url : no_ajax_url,
                success:function(data){
                    $('.chapter_data').append(data);;
                },
                error:function(){
                    alert("novel 실패");
                }
            });

            $('div').remove('.chapter_info');

            // 스크립트로 종속된 에피소드만큼 출력하기
            let append_data = "<div class='chapter_info'>"
            append_data += "    <h3 class='text-center'>"+chapter_name+"</h3>"
            append_data += "    <div></div>"
            append_data += "    <div class='text-center' data-toggle='modal' data-target='#episode'>"
            append_data += "        <p class='remote'>"
            append_data += "            <a class='setView' href='#'>"
            append_data += "                <i class='fa fa-plus-square-o fa-3x'></i>"
            append_data += "            </a>"
            append_data += "        </p>"
            append_data += "    </div>"
            append_data += "</div>"
            
            $('.chapter_data').append(append_data);

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