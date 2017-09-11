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
            @if ($data[0] == 0)
                <strong>まだ公開された小説設定がありません。</strong>
            @else
                @for ($i = 0; $i < count($data); $i++)
                    <li name="event_list" id="{{$i}}"><a href="#">{!! $data[$i]['event_name'] !!}</a></li>
                @endfor
            @endif
		</ul>
    </div>

    <div class="col-md-6" name="history-info">
        <table class="table">
            <tr>
                <td>
                    <strong>タイトル</strong>
                </td>
                <td name="event-name">
                    {{-- EVENT NAME --}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>内容</strong>
                </td>
                <td name="event-content">
                    {{-- EVENT CONTENT --}}
                </td>
            </tr>
            {{--  <tr>
                <td>
                    <strong>作家の設定</strong>
                </td>
                <td>
                    <ul name="event-refer_info" class="list-unstyled">
                        // REFER INFO
                    </ul>
                </td>
            </tr>  --}}
            {{--
            <tr>
                <td>
                    <strong>その他</strong>
                </td>
                <td name="event-other">
                    // OTHER
                </td>
            </tr>
            --}}

            {{--
            <tr>
                <td>
                    <strong>期間</strong>
                </td>
                <td name="event-day">
                    // START DAY ~ END DAY 
                </td>
            </tr>
            --}}

            <tr>
                <td>
                    <strong>登場人物</strong>
                </td>
                <td name="event-character">
                    @if ($data[0] == 0)
                        <input type="hidden" value="EMPTY" />
                    @else
                        @foreach ($characterList as $character)
                              {!! $character['name'] !!}
                            &nbsp;
                        @endforeach
                    @endif

                </td>
            </tr>
            <tr>
                <td>
                    <strong>登場事物</strong>
                </td>
                <td name="event-item">
                    @if ($data[0] == 0)
                        <input type="hidden" value="EMPTY" />
                    @else
                        @foreach ($itemList as $item)
                              {!! $item['name'] !!}
                            &nbsp;
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <strong>背景場所</strong>
                </td>
                <td name="event-map">
                    @if ($data[0] == 0)
                        <input type="hidden" value="EMPTY" />
                    @else
                        @foreach ($mapList as $map)
                            {!! $map['name'] !!}
                            &nbsp;
                        @endforeach
                    @endif
                </td>
            </tr>
		</table>



    </div>
</div>
