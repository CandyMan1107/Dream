


<input type="hidden" id="copyDiv" value={{$tasks['copyDiv']}}>
<input type="hidden" id="saveDir" value={{URL::asset($tasks['saveDir'])}}>
<input type="hidden" id="fileName" value={{$tasks['fileName']}}>
<input type="hidden" id="inputClass" value={{$tasks['inputClass']}}>

<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script>
var divName = $("#copyDiv").val();
var contentDiv = $("." + divName, opener.document);
var inputClass = $("#inputClass").val();
var imgRoot = $("#saveDir").val();
var fileName = $("#fileName").val();

document.write("divName : " + divName+ "<br>");
document.write("contentDiv : " + contentDiv + "<br>");
document.write("inputClass : " + inputClass+ "<br>");
document.write("imgRoot : " +imgRoot + "<br>");
document.write("divName : " + divName+ "<br>");

contentDiv.html(contentDiv.html() + "<div class='"+ inputClass+ "'><img src='" +imgRoot + "/" + fileName + "'></div>");

window.close();
</script>
