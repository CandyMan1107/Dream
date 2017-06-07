function timetableList(data){
    var datas = data;
    var arrayLength = datas.length;

    
    for(var i = 0 ; i < arrayLength ; i++ ){
        var insTag = "<li>Previous</li>";
        $("#timetableList").html(insTag);
    }
    console.log(datas);
                    // <li><a href="#">Previous</a></li> 
					// <li><a href="#">Next</a></li>
}