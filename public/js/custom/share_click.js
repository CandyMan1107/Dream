$(document).ready(function(){
    $('.share_icon').click(function(){

        let click_id = $(this).attr("id");
        let get_background_url = 'share/get_background'
        
        $.ajax({
            type: "GET",
            url: get_background_url,
            success: function (data) {
                alert(data);
            }
        })
    });
});