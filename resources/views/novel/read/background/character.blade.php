<script src="/js/JHM-Custom/character_info.js"></script>
<script>character_info( <?=json_encode($data)?> )</script>
<div class="row">
    <div class="col-md-3 text-center" name="background-view">
    
        @foreach ($data as $character)
            <img id="{{$character['id']}}" src="/img/background/characterImg/{{$character['img_src']}}" alt="character image" class="img-circle img-things-size character_list event_list" name="character_icon">
        @endforeach

    </div>
    <div class="col-md-9 table-responsive" name="background-info">
        {{-- 캐릭터 이름 등록 --}}
		<table class="table">
            <tr>
                <td>
                    <strong>이름</strong>
                </td>
                <td name="name">
                    {{-- {{$data[0]['name']}} --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>나이</strong>
                </td>
                <td name="age">
                    {{-- {{$data[0]['age']}} --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>성별</strong>
                </td>
                <td name="gender">
                    {{-- {{$data[0]['gender']}} --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>내용</strong>
                </td>
                <td name="info">
                    {{-- {{$data[0]['info']}} --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>작가의 설정</strong>
                </td>
                <td name="refer_info">
                    {{-- {{$data[0]['refer_info']}} --}}
                </td>
            </tr>
            <tr>
                <td name="item">
                    {{-- <strong>{{$data[0]['name']}}의 물건</strong> --}}
                </td>
                <td>
                    {{-- 소유 사물 구현하기 --}}
                </td>
            </tr>
		</table>

    </div>
</div>