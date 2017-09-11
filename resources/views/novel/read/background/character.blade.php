<script src="/js/JHM-Custom/character_info.js"></script>
<script>character_info( <?=json_encode($data)?> )</script>
<div class="row">
    @if ($data[0] == 0) 
    <div class="col-md-12 text-center" name="character-view">
        <strong>아직 공개된 배경 정보가 없습니다.</strong>
    @else
        <div class="col-md-3 text-center" name="character-view">
        @foreach ($data as $character)
            <img id="{{$character['id']}}" src="/img/background/characterImg/{{$character['img_src']}}" alt="character image" class="img-circle img-things-size character_list event_list" name="img_icon">
        @endforeach
    @endif
    </div>
    <div class="col-md-9 table-responsive" name="character-info">
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
                    {{-- <strong>{{$data[0]['name']}}의 물건 --}}
                </td>
                <td>
                    {{-- ITEM --}}
                </td>
            </tr>
		</table>

    </div>
</div>