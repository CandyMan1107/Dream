@extends('layouts.master')

@section('content')
    <div class="default-padding"></div>

    {{-- read-novel-info START --}}
    <div id="read-novel-info" class="section-padding">
        <div id="default-padding-small"></div>
        <div class="row">
            <div class="col-md-5 info-text">
                <h4 class="text-left">
                    <span class="novel-info-text"><strong>오베라는 남자</strong></span>
                    <span><i class="material-icons">keyboard_arrow_right</i></span>
                    <span class="novel-info-text">1화 오베라는 남자(1)</span>
                </h4>
            </div>
            <div class="col-md-4 text-right">
                <ul class="list-inline" name="bookMode">
                    <li class="setView" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">settings</i>&nbsp;<span>뷰어설정</span>
                    </li>
                    <li class="novelBackground">
                        <i class="material-icons">remove_red_eye</i>&nbsp;<span>배경보기</span>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-right info-icon">
                <ul class="list-inline">
                    <li><i class="material-icons" name="bookmark">bookmark_border</i></li>
                    <li><i class="material-icons" name="star">star_border</i></li>
                    <li><i class="material-icons">menu</i></li>
                </ul>
            </div>
        </div>
    </div>
    {{-- read-novel-info END --}}
    {{-- read-novel-view START --}}
    <div id="read-novel-view">
        {{-- container class START --}}
        <div class="container bookContainer" name="bookMode">
            <div class="row novel-viewer novel-viewer-book">
                <div class="col-md-6 leftPage" name="bookPage">
                    <i class="material-icons arrowLeft" name="pageArrow">keyboard_arrow_left</i>
                    사람들은 아버지를 난쟁이라고 불렀다. 사람들은 옳게 보았다. 
                    아버지는 난쟁이였다. 불행하게도 사람들은 아버지를 보는 것 하나만 옳았다. 그 밖의 것들은 하나도 옳지 않았다. 
                    나는 아버지, 어머니, 영호, 영희, 그리고 나를 포함한 다섯 식구의 모든 것을 걸고 그들이 옳지 않다는 것을 언제나 말할 수 있다. 나의 ‘모든 것’이라는 표현에는 ‘다섯 식구의 목숨’이 포함되어 있다. 
                    천국에 사는 사람들은 지옥을 생각할 필요가 없다. 그러나 우리 다섯 식구는 지옥에 살면서 천국을 생각했다. 단 하루라도 천국을 생각해 보지 않은 날이 없다. 
                    하루하루의 생활이 지겨웠기 때문이다. 우리의 생활은 전쟁과 같았다. 우리는 그 전쟁에서 날마다 지기만 했다. 
                    그런데도 어머니는 모든 것을 잘 참았다. 그러나 그날 아침 일만은 참기 어려웠던 것 같다.
                </div>
                <div class="col-md-6 rightPage" name="bookPage">
                    <i class="material-icons arrowRight" name="pageArrow">keyboard_arrow_right</i>
                    사람들은 아버지를 난쟁이라고 불렀다. 사람들은 옳게 보았다.
                </div>
            </div>
        </div>
        <div class="container webContainer">
            <div class="row">
                {{--<div id="default-padding-mid" class="col-md-12"></div>--}}
                <div class="col-md-12 novel-viewer novel-viewer-web" name="webMode">
                    <p class=MsoNormal>사람들은 아버지를 난장이라고 불렀다<span lang=EN-US>. </span>사람들은 옳게 보았다<span
                    lang=EN-US>. </span>아버지는 <span class=SpellE>난장이였다</span><span lang=EN-US>. </span>불행하게도
                    사람들은 아버지를 보는 것 하나만 옳았다<span lang=EN-US>. </span>그 밖의 것들은 하나도 옳지 않았다<span
                    lang=EN-US>. </span>나는 <span class=SpellE>아버지<span style='font-family:"MS Mincho";
                    mso-bidi-font-family:"MS Mincho"'>&#8228;</span>어머니<span style='font-family:"MS Mincho";
                    mso-bidi-font-family:"MS Mincho"'>&#8228;</span>영호<span style='font-family:"MS Mincho";
                    mso-bidi-font-family:"MS Mincho"'>&#8228;</span>영희</span><span lang=EN-US>, </span>그리고
                    나를 포함한 다섯 식구의 모든 것을 걸고 그들이 옳지 않다는 것을 언제나 말할 수 있다<span lang=EN-US>. </span>나의 모든
                    것이라는 표현에는 다섯 식구의 목숨 이 포함되어 있다<span lang=EN-US>. </span>천국에 사는 사람들은 지옥을 생각할 필요가 없다<span
                    lang=EN-US>. </span>그러나 우리 다섯 식구는 지옥에 살면서 천국을 생각했다<span lang=EN-US>. </span>단 하루라도
                    천국을 생각해 보지 않은 날이 없다<span lang=EN-US>. </span>하루하루의 생활이 지겨웠기 때문이다<span
                    lang=EN-US>. </span>우리의 생활은 전쟁과 같았다<span lang=EN-US>. </span>우리는 그 전쟁에서 날마다 지기만
                    했다<span lang=EN-US>. </span>그런데도 어머니는 모든 것을 잘 참았다<span lang=EN-US>. </span>그러나 그
                    날 아침 일만은 참기 어려웠던 것 같다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>통장이 이걸 가져왔어요<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>내가 말했다<span lang=EN-US>. </span>어머니는
                    조각마루 끝에 앉아 아침식사를 하고 있었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>그게 뭐냐<span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>철거 <span class=SpellE>계고장예요</span><span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>기어코 왔구나<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니가 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>그러니까 집을 헐라는 거지<span lang=EN-US>? </span>우리가
                    꼭 받아야 할 것 중의 하나가 이제 나온 셈이구나<span lang=EN-US>!”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 식사를 중단했다<span lang=EN-US>. </span>나는
                    어머니의 밥상을 내려다보았다<span lang=EN-US>. </span>보리밥에 까만 된장<span lang=EN-US>, </span>그리고
                    시든 고추 두어 개와 졸인 감자<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>나는 어머니를 위해 철거 계고장을 천천히 읽었다<span
                    lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span></span>낙<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;
                    </span></span>원<span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;
                    </span></span>구<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>주택<span lang=EN-US>: 444,1―<span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>197×. 9. 10<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>수신<span lang=EN-US>: </span>서울특별시 <span class=SpellE>낙원구</span> <span
                    class=SpellE>행복동</span><span lang=EN-US> 46</span>번지의<span lang=EN-US>
                    1839<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><span
                    class=SpellE>김불이</span> 귀하<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>제목<span lang=EN-US>: </span>재개발 사업 구역 및 고지대 철거 지시<span
                    lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>귀하 소유 아래 표시 건물은 주택 개량 촉진에 관한 임시 조치법 따라 행복<span lang=EN-US> 3</span>구역
                    재개발 지구로 지정되어 서울특별시 주택 개량 재발 사업 시행 조례 제<span lang=EN-US>15</span>조<span
                    lang=EN-US>, </span>건축법 제<span lang=EN-US>5</span>조 및 동법 제<span lang=EN-US>42</span>조의
                    규정에 의하여<span lang=EN-US> 197×. 9. 30</span>까지 자진 철거할 것을 명합니다<span lang=EN-US>. </span>만일
                    위의 기일까지 자진 철거하지 않을 경우에는 행정 대집행법의 정하는 바에 의하여 강제 철거하고 그 비용은 귀하로부터 징수하겠습니다<span
                    lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;
                    </span></span>철거 대상 건물 표시<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;
                    </span></span>서울특별시 <span class=SpellE>낙원구</span> <span class=SpellE>행복동</span><span
                    lang=EN-US> 46</span>번지의<span lang=EN-US> 1839<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;&nbsp;
                    </span></span>구조<span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span></span>건평<span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span></span>평<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span></span>끝<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </span></span>낙 원 구 청 장<span lang=EN-US><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span><o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 조각마루 끝에 앉아 말이 없었다<span
                    lang=EN-US>. </span>벽돌 공장의 높은 굴뚝 그림자가 시멘트담에서 꺾어지며 좁은 마당을 덮었다 동네 사람들이 골목으로 나와 뭐라고
                    소리치고 있었다<span lang=EN-US>. </span>통장은 그들 사이를 비집고 나와 방죽 쪽으로 걸음을 옮겼다<span
                    lang=EN-US>. </span>어머니는 식사를 끝내지 않은 밥상을 들고 부엌으로 들어갔다<span lang=EN-US>. </span>어머니는
                    두 무릎을 곧추세우고 앉았다<span lang=EN-US>. </span>그리고<span lang=EN-US>, </span>손을 들어 부엌 바닥을
                    한 번 치고 가슴을 한 번 쳤다<span lang=EN-US>. </span>나는 동사무소로 갔다<span lang=EN-US>. </span><span
                    class=SpellE>행복동</span> 주민들이 잔뜩 몰려들어 자기의 의견들을 큰 소리로 말하고 있었다<span lang=EN-US>. </span>들을
                    사람은 두셋밖에 안 되는데 수십 명이 거의 동시에 떠들어대고 있었다<span lang=EN-US>. </span>쓸데없는 짓이었다<span
                    lang=EN-US>. </span>떠든다고 해결될 문제는 아니었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>나는 바깥 게시판에 적혀 있는 공고문을 읽었다<span
                    lang=EN-US>. </span>거기에는 아파트 입주 절차와 아파트 입주를 포기할 경우 탈 수 있는 이주 보조금 액수 등이 적혀 있었다<span
                    lang=EN-US>. </span>동사무소 주위는 시장 바닥과 같았다<span lang=EN-US>. </span>주민들과 아파트 거간꾼들이
                    한데 뒤엉켜 이리 몰리고 저리 몰리고 했다<span lang=EN-US>. </span>나는 거기서 아버지와 두 동생을 만났다<span
                    lang=EN-US>. </span>아버지는 도장포 앞에 앉아 있었다<span lang=EN-US>. </span>영호는 내가 방금 물러선 게시판
                    앞으로 갔다<span lang=EN-US>. </span>영희는 골목 입구에 세워놓은 검정색 승용차 옆에 서 있었다<span
                    lang=EN-US>. </span>아침 일찍 일들을 찾아 나섰다가 철거 계고장이 나왔다는 소리를 듣고 돌아온 것이었다<span
                    lang=EN-US>. </span><span class=SpellE>누군들</span> 이런 날 일을 할 수 있을까<span
                    lang=EN-US>. </span>나는 아버지 옆으로 가 아버지의 공구들이 들어 있는 부대를 둘러메었다<span lang=EN-US>. </span>영호가
                    다가오더니 그것을 넘겨주면서 이쪽으로 걸어오는 영희를 보았다<span lang=EN-US>. </span>영희의 얼굴은 발갛게 상기되어 있었다<span
                    lang=EN-US>. </span>몇 사람의 거간꾼들이 우리를 둘러싸고 아파트 입주권을 팔라고 했다<span lang=EN-US>. </span>아버지가
                    책을 읽고 있었다<span lang=EN-US>. </span>우리는 아버지가 책을 읽는 것을 처음 보았다<span lang=EN-US>. </span>표지를
                    쌌기 때문에 무슨 책을 읽는지도 알 수 없었다<span lang=EN-US>. </span>영희가 허리를 굽혀 아버지의 손을 <span
                    class=SpellE>잡아끌었다</span><span lang=EN-US>. </span>아버지는 우리들의 얼굴을 물끄러미 쳐다보더니 자리를
                    털고 일어났다<span lang=EN-US>. “</span>난장이가 간다<span lang=EN-US>.” </span>고 처음 보는 사람들이
                    말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 대문 기둥에 붙어 있는 알루미늄 표찰을 떼기 위해 식칼로
                    못을 뽑고 있었다<span lang=EN-US>. </span>내가 식칼을 받아 반대쪽 못을 뽑았다<span lang=EN-US>. </span>영호는
                    어머니와 내가 하는 일이 못마땅한 모양이었다<span lang=EN-US>. </span>그러나 마음에 드는 일이 우리에게 일어나 주기를 바랄
                    수는 없는 일이었다<span lang=EN-US>. </span>어머니는 무허가 건물 번호가 새겨진 알루미늄 표찰을 빨리 떼어 간직하지 않으면
                    나중에 괴로운 일이 생길 것이라는 것을 알고 있었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 손바닥에 놓인 표찰을 말없이 들여다보았다<span
                    lang=EN-US>. </span>영희가 이번에는 어머니의 손을 <span class=SpellE>잡아끌었다</span><span
                    lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>너희들이 놀게 되지만 <span class=SpellE>않았어도</span>
                    난 별 걱정을 안 했을 거다<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니가 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>스무 날 안에 무슨 뾰족한 수가 <span
                    class=SpellE>생기겠니</span><span lang=EN-US>. </span>이제 하나하나 정리를 <span
                    class=SpellE>해야지</span><span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>입주권을 팔려고 그래요<span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>영희가 물었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>팔긴 왜 팔아<span lang=EN-US>!”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>영호가 큰 소리로 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>그럼 아파트 입주할 돈이 <span class=SpellE>있어야지</span><span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>아파트로도 안 가<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>그럼 어떻게 할 거야<span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>여기서 그냥 사는 거야<span lang=EN-US>. </span>여긴
                    우리 집이다<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>영호는 성큼성큼 돌계단을 올라가 아버지의 부대를 마루 밑에 놓았다<span
                    lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>한 달 전만 해도 그런 <span class=SpellE>이야길</span>
                    하는 사람이 있었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>아버지가 말했다<span lang=EN-US>. </span>어머니가
                    내준 철거 계고장을 막 읽고 난 참이었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>시에서 아파트를 <span class=SpellE>지어놨다니까</span> 얘긴 그걸로 끝난 거다<span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>그건 우릴 위해서 지은 게 <span class=SpellE>아녜요</span><span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>영호가 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>돈도 많이 있어야 <span class=SpellE>되잖아요</span><span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>영희는 <span class=SpellE>마당가</span> <span class=SpellE>팬지꽃</span> 앞에
                    서 있었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>우린 못 떠나<span lang=EN-US>. </span>갈 곳이 없어<span lang=EN-US>. </span>그렇지
                    큰오빠<span lang=EN-US>? ”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>어떤 놈이든 집을 헐러 오는 놈은 그냥 놔 두지 않을 테야<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>영호가 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>그만둬<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>내가 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span>“</span>그들 옆엔 법이 있다<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span style='mso-spacerun:yes'>&nbsp;
                    </span></span>아버지 <span class=SpellE>말대로</span> 모든 이야기는 끝나버린 것이나 마찬가지였다<span
                    lang=EN-US>. </span><span class=SpellE>마당가</span> <span class=SpellE>팬지꽃</span>
                    앞에 서 있던 영희가 고개를 돌렸다<span lang=EN-US>. </span>영희는 울고 있었다<span lang=EN-US>. </span>어렸을
                    때부터 영희는 잘 울었다<span lang=EN-US>. </span>그때 나는 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>울지 마<span lang=EN-US>, </span>영희야<span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>자꾸 울음이 나와<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>그럼<span lang=EN-US>, </span>소리를 내지
                    말고 울어<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>응<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>그러나<span lang=EN-US>, </span>풀밭에서 영희는
                    소리를 내어 울었다<span lang=EN-US>. </span>나는 손으로 영희의 입을 막았다<span lang=EN-US>. </span>영희의
                    몸에서는 풀 냄새가 났다<span lang=EN-US>. </span>개천 건너 주택가 골목에서는 고기 굽는 냄새가 났다<span
                    lang=EN-US>. </span>나는 그것이 고기 굽는 냄새인 줄 알면서도 어머니에게 묻고는 했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마<span lang=EN-US>, </span>이게 무슨
                    냄새야<span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 말없이 걸었다<span lang=EN-US>. </span>나는
                    다시 물었다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마<span lang=EN-US>, </span>이게 무슨
                    <span class=SpellE>냄새지</span><span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 나의 손을 잡았다<span lang=EN-US>. </span>어머니는
                    걸음을 빨리 하면서 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>고기 굽는 <span class=SpellE>냄새란다</span><span
                    lang=EN-US>. </span>우리도 나중에 해 먹자<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>나중에 언제<span lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>자<span lang=EN-US>, </span>빨리 가자<span
                    lang=EN-US>. ”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니는 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>너도 공부를 열심히 하면 좋은 집에 살 수 있고<span
                    lang=EN-US>, </span>고기도 날마다 먹을 수 <span class=SpellE>있단다</span><span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>거짓말<span lang=EN-US>!”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니의 손을 뿌리치면서 내가 말했다<span
                    lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>아버지는 나쁜 <span class=SpellE>사람야</span><span
                    lang=EN-US>. ”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>어머니가 우뚝 섰다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>너 방금 뭐라고 <span class=SpellE>했니</span><span
                    lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>우리 아버지는 나쁜 <span class=SpellE>사람야</span><span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>너 매 좀 <span class=SpellE>맞아야겠구나</span><span
                    lang=EN-US>. </span>아버지는 좋은 분이다<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>나도 주머니가 달린 옷을 입고 싶어<span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>빨리 가자<span lang=EN-US>. ”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마는 왜 우리들 옷에 주머니를 안 달아 주지<span
                    lang=EN-US>? </span>돈도 넣어 주지 못하고<span lang=EN-US>, </span>먹을 것도 넣어 줄 게 없어서 그렇지<span
                    lang=EN-US>?”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>아버지에 대해 말을 막 하면 너 매맞을 줄 알아라<span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>아버지는 악당도 못 돼<span lang=EN-US>. </span>악당은
                    돈이나 많지<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>아버지는 좋은 분이다<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>알아<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>나는 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>수백 번도 더 <span class=SpellE>들었어</span><span
                    lang=EN-US>. </span>그렇지만 이젠 속지 않아<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마<span lang=EN-US>, </span>큰오빠는 말을
                    안 들어<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>영희는 부엌문 앞에 서서 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마 몰래 또 고기 냄새 맡으러 <span
                    class=SpellE>갔었대</span><span lang=EN-US>. </span>나는 안 <span class=SpellE>갔어</span><span
                    lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal>어머니는 아무 말이 없었다<span lang=EN-US>. </span>나는 영희를 흘겨보았다<span
                    lang=EN-US>. </span>영희는 또 말했다<span lang=EN-US>.<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span>“</span>엄마<span lang=EN-US>, </span>큰오빠가 고기
                    냄새 맡으러 갔었다고 말했더니 때리려고 그래<span lang=EN-US>.”<o:p></o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><o:p>&nbsp;</o:p></span></p>

                    <p class=MsoNormal><span lang=EN-US><span
                    style='mso-spacerun:yes'>&nbsp;</span></span>영희는 좀처럼 울음을 그치지 못했다<span
                    lang=EN-US>. </span>나는 영희의 입에서 손을 떼었다<span lang=EN-US>. </span>영희를 풀밭으로 끌고 들어간 것이
                    잘못이었다<span lang=EN-US>. </span>영희를 때려주고 나는 후회했다<span lang=EN-US>. </span>귀여운 영희의
                    얼굴은 눈물로 젖었다<span lang=EN-US>. </span>우리는 그때 주머니 없는 옷을 입고 있었다<span lang=EN-US>.</span></p>
                </div>
                <div id="default-padding-big" class="col-md-12"></div>
                
                <div class="col-md-12 text-center mark-icon">
                    <ul class="list-inline">
                        <li>
                            <span><i class="material-icons" name="favorite">favorite_border</i></span> 
                            <span class="mark-text"> 11,896</span>
                        </li>
                        <li>&nbsp;</li>
                        <li>
                            <span><i class="material-icons" name="star">star_border</i></span>
                            <span class="mark-text"> 관심등록</span>
                        </li>
                        <li>&nbsp;</li>
                        <li>
                            <span><i class="material-icons">share</i></span>
                            <span class="mark-text"> 공유하기</span>
                        </li>
                    </ul>
                </div>
                <div id="default-padding-mid" class="col-md-12"></div>
            </div>
        </div>
        {{-- container class END --}}
    </div>
    {{-- read-novel-view END --}}
    {{-- quickMenu START --}}
    <div id="quickMenu">
        <div class="row">
            <div class="col-md-2 text-left">
                {{-- + - Button COLLAPSE --}}
                <a class="remoteButton" data-toggle="collapse" href="#collapseRemote" aria-expanded="false" aria-controls="collapseRemote">
                    <i id="remoteMenu" class="fa fa-minus-square-o" aria-hidden="true"></i>
                </a>
                {{-- PAGE-UP Button --}}
                <a class="remoteArrow" href="#"><i id="remoteUp" class="fa fa-arrow-up" aria-hidden="true"></i></a>
                {{-- PAGE-DOWN Button --}}
                <a class="remoteArrow" href="#"><i id="remoteDown" class="fa fa-arrow-down" aria-hidden="true"></i></a>
            </div>
            <div class="col-md-10 collapse in remote-button" id="collapseRemote">
                {{-- REMOTE TITLE & X Button --}}
                {{-- Novel TITLE --}}
                {{-- Novel EPISODSE MOVE --}}
                {{-- Viewer Settings --}}
                {{-- Novel BACKGROUND --}}
                <table class="table text-center">
                    <tr>
                        <th>
                            <strong>리모콘</strong>
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control">
                                <option>5화. 오베라는 남자(5)</option>
                                <option>4화. 오베라는 남자(4)</option>
                                <option>3화. 오베라는 남자(3)</option>
                                <option>2화. 오베라는 남자(2)</option>
                                <option selected="selected">1화. 오베라는 남자(1)</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td data-toggle="modal" data-target="#myModal">
                            <p class="remote">
                                <a class="setView" href="#">
                                    <i class="material-icons">settings</i>&nbsp;<span>뷰어설정</span>
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="remote">
                                <a class="novelBackground" href="#">
                                    <i class="material-icons">remove_red_eye</i>&nbsp;<span>배경보기</span>
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    {{-- quickMenu END --}}
    {{-- Modal --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="material-icons">settings</i>&nbsp;<span>뷰어 설정</span></h4>
                </div>
                <div class="modal-body">
                    {{-- Screen MODE --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 text-left">
                                <h5><strong>화면 모드</strong></h5>
                            </div>
                            <div class="col-md-7 text-left">
                                {{-- 50px x 50px 화면 모드 이미지 버튼 2개 --}}
                                <ul class="list-inline">
                                    <li class="viewScreen webMode viewOn">
                                        {{-- WEB MODE --}}
                                    </li>
                                    <li class="viewScreen bookMode viewOff">
                                        {{-- E-Book MODE --}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-right">
                                <button type="button" class="btn btn-default" disabled="disabled"><i class="material-icons">settings_backup_restore</i>원래대로</button>
                            </div>
                        </div>
                    </div>
                    {{-- Setting --}}
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h5><strong>열람 설정</strong></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 example-text">
                                여인은 초저녁부터 목이 아픈 줄도 모르고 줄창 소리를 뽑아대고, 사내는 그 여인의 소리로 하여 끊임없이 어떤 예감 같은 것을 견디고 있는 듯한 표정으로 북장단을 잡고 있었다. 
                                소리를 쉬지 않는 여인이나, 묵묵히 장단 가락만 잡고 있는 사내나 양쪽 다 이마에 힘든 땀방울이 솟고 있었다.
                                전라도 보성읍 밖의 한 한적한 길목 주막 왼쪽으로는 멀리 읍내 마을들을 내려다보면서 오른쪽으로는 해묵은 묘지들이 길가까지 바싹바싹 다가않은 가파른 공동 묘지-그 공동 묘지 사이를 뚫어 나가고 있는 한적한 고갯길목을 인근 사람들은 흔히 소릿재라 말하였다. 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 text-left">
                                <h5><strong>글꼴</strong></h5>
                                <ul class="list-group">
                                    <li class="list-group-item fontList on-font" value="NanumGothic">나눔고딕</li>
                                    <li class="list-group-item fontList off-font" value="Jeju Myeongjo">제주명조</li>
                                    <li class="list-group-item fontList off-font" value="Hanna">한나</li>
                                    {{-- <li class="list-group-item fontList off-font" value="Gungsuh">궁서</li> --}}
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>글크기</strong></h5>
                            <ul class="list-group">
                                    <li class="list-group-item sizeList off-font">12px</li>
                                    <li class="list-group-item sizeList on-font">14px</li>
                                    <li class="list-group-item sizeList off-font">16px</li>
                                    <li class="list-group-item sizeList off-font">18px</li>
                                    <li class="list-group-item sizeList off-font">20px</li>
                                    <li class="list-group-item sizeList off-font">26px</li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>줄간격</strong></h5>
                                <ul class="list-group">
                                    <li class="list-group-item lineList off-font">120%</li>
                                    <li class="list-group-item lineList off-font">150%</li>
                                    <li class="list-group-item lineList off-font">160%</li>
                                    <li class="list-group-item lineList on-font">170%</li>
                                    <li class="list-group-item lineList off-font">180%</li>
                                    <li class="list-group-item lineList off-font">200%</li>
                                </ul>
                            </div>
                            <div class="col-md-3 text-left">
                                <h5><strong>색</strong></h5>
                                <ul class="list-group">
                                    <li class="list-group-item colorBox on-colorBox font-color" value="#000000">{{-- 색1 검정 --}}</li>
                                    <li class="list-group-item colorBox off-colorBox font-color" value="#ffffff">{{-- 색5 흰색 --}}</li>
                                </ul>
                                <ul class="list-group">
                                    <li class="list-group-item colorBox on-colorBox back-color" value="#ffffff">{{-- 색1 흰색 --}}</li>
                                    <li class="list-group-item colorBox off-colorBox back-color" value="#ffd480">{{-- rgb(255, 212, 128) --}}</h5></li>
                                    <li class="list-group-item colorBox off-colorBox back-color" value="#e6ffe6">{{-- rgb(230, 255, 230) --}}</li>
                                    <li class="list-group-item colorBox off-colorBox back-color" value="#e0ccff">{{-- rgb(224, 204, 255) --}}</li>
                                    <li class="list-group-item colorBox off-colorBox back-color" value="#000000">{{-- 색5 검정 --}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            {{-- modal-content END --}}
        </div>
        {{-- modal-dialog END --}}
    </div>
    {{-- modal END --}}
    {{-- writer-word START --}}
    <div id="writer-word">
        {{-- container class START --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline">
                        <li><h5><strong>글작가님의 한마디</strong></h5></li>
                        <li><small>2017-04-23</small></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <h5>바람이 쌩쌩 부네요. 독자님들 감기 조심하세요~</h5>
                </div>
                <div id="default-padding-small" class="col-md-12"></div>
                <div class="col-md-12 text-right">
                    <ul class="list-inline">
                        <li><button class="btn btn-default btn-block"><strong>작가의 다른 소설</strong></button></li>
                        <li><button class="btn btn-default btn-block"><strong>작가의 방</strong></button></li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- container class END --}}
    </div>
    {{-- writer-word END --}}
    <div id="default-padding-mid-1"></div>
    {{-- episode-icon START --}}
    <div id="episode-icon" class="section-padding">
        {{-- container class START --}}
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-left">
                    <p><i class="material-icons move-icon">arrow_back</i></p>
                    <h4 class="move-text">이전화</h4>
                </div>
                <div class="col-md-4 text-center">
                    <p><i class="material-icons move-icon">menu</i></p>
                    <h4>목록으로</h4>
                </div>
                <div class="col-md-4 text-right">
                    <p><i class="material-icons move-icon">arrow_forward</i></p>
                    <h4 class="move-text">다음화</h4>
                </div>
            </div>
        </div>
        {{-- container class END --}}
    </div>
    {{-- episode-icon END --}}
    <div id="default-padding-big"></div>
    {{-- novel-review START --}}
        <div id="novel-review">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3>소설리뷰 <small>(1)</small></h3>
                    </div>
                    <div class="col-md-6 text-right sort">
                        <h5>
                            <span class="sort-text">최신순</span> <span><i class="material-icons selectedIcon" name="check">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">추천순</span> <span><i class="material-icons" name="check">check</i></span>
                        </h5>
                    </div>
                    <div id="default-padding-mid" class="col-md-12"></div>
                    {{--소설 리뷰 작성 부분 View 만들기--}}

                    
                    <div class="col-md-12 review-list">
                        <div class="row">
                            <div class="col-md-12">
                                {{-- USER COMMENT --}}
                                <div class="input-group input-group-lg userComment">
                                    <input type="text" class="form-control" placeholder="로그인 후 이용해주세요.">
                                    <span class="input-group-addon">등록</span>
                                </div>
                            </div>
                            <div id="default-padding-big" class="col-md-12"></div>
                            <div class="col-md-9 text-left">
                                <span><strong>이대감</strong></span>
                                &nbsp;
                                <span><small>2017-05-01 00:29:24</small></span>
                            </div>
                            <div class="col-md-3 text-right thumb-up">
                                <span><i class="material-icons" name="thumb">thumb_up</i></span>
                                <span class="thumb-text">12</span>
                            </div>
                            <div id="default-padding-small" class="col-md-12"></div>
                            <div class="col-md-12">
                                <span><small>5화</small></span>
                                &nbsp;
                                <span>엄청 재밌어요! 글작가님 글은 항상 재미있었지만 오베는 역대급!</span>
                            </div>
                            <div id="default-padding-small-1" class="col-md-12"></div>
                            <div class="col-md-12 review" data-toggle="collapse" href="#collapseComment" aria-expanded="false" aria-controls="collapseComment">
                                <span class="re-review-text"><small>답글</small></span>
                                <span><i class="material-icons" name="arrow">keyboard_arrow_down</i></span>
                            </div>
                            <div class="col-md-12 collapse" id="collapseComment">
                                <div class="input-group input-group-mg commentReply">
                                    <input type="text" class="form-control" placeholder="로그인 후 이용해주세요.">
                                    <span class="input-group-addon">등록</span>
                                    {{-- <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">등록</button>
                                    </span> --}}
                                </div>
                            </div>
                            <div id="default-padding-small-1" class="col-md-12"></div>
                        </div>
                    </div>
                    <div id="default-padding-mid" class="col-md-12"></div>
                </div>
                {{-- row class END --}}
            </div>
            {{-- container class END --}}
            
        </div>
        {{-- novel-review END --}}

        {{-- JHM STYLE --}}
        <link rel="stylesheet" href="/css/jhm-style.css">
        {{-- JHM SCRIPT --}}
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="/js/JHM-Custom/jhm-selectIcon-custom.js"></script>
        <script src="/js/JHM-Custom/jhm-readNovel-custom.js"></script>
        <script src="/js/JHM-Custom/jhm-quick.js"></script>
        <script src="/js/JHM-Custom/jhm-comment.js"></script>
@endsection