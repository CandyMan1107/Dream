<div class="default-padding"></div>

<ul class="nav nav-pills my-sub-navigation">
        <li role="presentation"><a href="#" class="sub">최근 본 소설</a></li>
        <li role="presentation"><a href="#" class="sub">관심소설</a></li>
        <li role="presentation"><a href="#" class="sub">책갈피</a></li>
        <li role="presentation" id="write_novel"><a href="/write_novel/my_novel" class="sub">내작품</a></li>
        <li role="presentation"><a href="/yerriel/blog" class="sub">블로그</a></li>
        {{--  <li class="background" role="button" id="background"><a href="/background" class="sub">소설설정</a></li>  --}}
</ul>
    
<script>
    $pathname = $(location).attr('pathname'); 
    $pathname = $pathname.split('/');
    console.log($pathname[1]);
    $("#"+$pathname[1]).css("background-color","#FABD4A");
    $("#"+$pathname[1]).css("border-radius","70px");
</script>
