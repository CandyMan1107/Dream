<script src="/js/JHM-Custom/map_info.js"></script>
<script>map_info( <?=json_encode($data)?> )</script>
@php
    use App\Http\Controllers\BackgroundHistoryTablesController;

    $list = BackgroundHistoryTablesController::show_maps();
@endphp
<div class="row">
    <div class="col-md-1" name="map-view">
        @if($list[0])
          @foreach ($list as $map)
              @php
                $img_src = "/img/background/mapImg/mapCover/".$map['img_src'];
              @endphp
              <img id="{{$map['id']}}" src="{{$img_src}}" alt="map image" class="img-circle img-things-size map_list" name="img_icon">
          @endforeach
        @endif
    </div>
    <div class="col-md-11" name="map-info">
        {{-- MAP IMG --}}
    </div>
</div>