<script src="/js/JHM-Custom/character_info.js"></script>
<script>character_info( <?=json_encode($data)?> )</script>
<div class="row">
    <div class="col-md-3 text-center" name="character-view">
    
        @foreach ($data as $character)
            <img id="{{$character['id']}}" src="/img/background/characterImg/{{$character['img_src']}}" alt="character image" class="img-circle img-things-size character_list event_list" name="img_icon">
        @endforeach

    </div>
    <div class="col-md-9 table-responsive" name="character-info">
        {{-- 캐릭터 이름 등록 --}}
		<table class="table">
            <tr>
                <td>
                    <strong>이름</strong>
                </td>
                <td name="character-name">
                    {{-- NAME --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>나이</strong>
                </td>
                <td name="character-age">
                    {{-- AGE --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>성별</strong>
                </td>
                <td name="character-gender">
                    {{-- GENDER --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>내용</strong>
                </td>
                <td name="character-info">
                    {{-- INFO --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>작가의 설정</strong>
                </td>
                <td name="character-refer_info">
                    {{-- REFER INFO --}}
                </td>
            </tr>
            <tr>
                <td name="character-item">
                    {{-- <strong>{{$data[0]['name']}}의 물건</strong> --}}
                </td>
                <td>
                    {{-- ITEM --}}
                </td>
            </tr>
		</table>

    </div>
</div>