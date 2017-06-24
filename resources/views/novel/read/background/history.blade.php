<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="/js/custom/history.js"></script>
<script type="text/javascript" src="/js/JHM-Custom/history_info.js"></script>
<script>ready(  <?=json_encode($data)?>  )</script>
<script>history_info(  <?=json_encode($data)?>  )</script>
@php
    use App\Http\Controllers\BackgroundHistoryTablesController;

    $characterList = BackgroundHistoryTablesController::show_characters();
    $itemList = BackgroundHistoryTablesController::show_items();
    $mapList = BackgroundHistoryTablesController::show_maps();
@endphp
<div class="row">
    <div class="col-md-6">
        <div id="timeline">

        </div>
        <ul class="pager" id="timetableList">
            @if ($data[0])
                @for ($i = 0; $i < count($data); $i++)
                    <li name="event_list" id="{{$i}}"><a href="#">{{$data[$i]['event_name']}}</a></li>
                @endfor
            @endif
		</ul>
    </div>
    <div class="col-md-6" name="history-info">
        <table class="table">
            <tr>
                <td>
                    <strong>제목</strong>
                </td>
                <td name="event-name">
                    {{-- EVENT NAME --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>내용</strong>
                </td>
                <td name="event-content">
                    {{-- EVENT CONTENT --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>작가의 설정</strong>
                </td>
                <td name="event-refer_info">
                    {{-- REFER INFO --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>기타</strong>
                </td>
                <td name="event-other">
                    {{-- OTHER --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>기간</strong>
                </td>
                <td name="event-day">
                    {{-- START DAY ~ END DAY --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>등장인물</strong>
                </td>
                <td name="event-character">
                    @foreach ($characterList as $character)
                        {!! $character['name'] !!}
                        &nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <strong>등장사물</strong>
                </td>
                <td name="event-item">
                    @foreach ($itemList as $item)
                        {!! $item['name'] !!}
                        &nbsp;
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>
                    <strong>배경 장소</strong>
                </td>
                <td name="event-map">
                    @foreach ($mapList as $map)
                        {!! $map['name'] !!}
                        &nbsp;
                    @endforeach
                </td>
            </tr>
		</table>



    </div>
</div>
