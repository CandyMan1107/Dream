<script type="text/javascript" src="/js/custom/tag_event.js"></script>
<script> var a = tag_click( <?=json_encode($datas['tag_data'])?>, <?=json_encode($datas['page'])?> ); </script>

<h3>태그 등록</h3>
<form id="add_tag" name="add_tag" action="{{ route('tagsAdd.store') }}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="page" value="{{$datas['page']}}">
    <input type="hidden" id="object_id" name="object_id" value="">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">태그 이름</h3>
        </div>
        <div class="panel-body">
            <input type="text" id="tag_name" name="tag_name" class="form-control" placeholder="Text input">
        </div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">태그 색상</h3>
        </div>
        <div class="panel-body">
            <input type="text" id="tag_color" name="tag_color" class="form-control" placeholder="Text input">
        </div>
    </div>
    <button type="submit" name="tag_submit" id="tag_submit" class="btn btn-default">등록</button>   
</form>