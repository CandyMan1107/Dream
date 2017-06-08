<script type="text/javascript" src="/js/custom/tag_event.js"></script>
<script> tag_click( <?=json_encode($data)?> ); </script>

<h3>태그 등록</h3>
<form id="add_tag" action="{{ route('historyTable.store') }}" method="POST">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">태그 이름</h3>
        </div>
        <div class="panel-body">
            <input type="text" class="form-control" placeholder="Text input">
        </div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">태그 색상</h3>
        </div>
        <div class="panel-body">
            <input type="text" class="form-control" placeholder="Text input">
        </div>
    </div>
    <button type="submit" class="btn btn-default">등록</button>   
</form>