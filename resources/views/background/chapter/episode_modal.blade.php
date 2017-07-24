<div class="modal fade" tabindex="-1" role="dialog" id="episode">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">에피소드 등록</h4>
      </div>
      <form class="form-horizontal" action="{{ route('chapter.store') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {{--  <meta name="csrf-token" content="{{ csrf_token() }}">  --}}
        <div class="modal-body table-responsive">
            <table class="table table-striped">
                <th>
                    <td>에피소드 제목</td>
                    <td>에피소드 내용</td>
                    <td>챕터 등록</td>
                </th>
                @for ($i = 0 ; $i < count($data)-1 ; $i++)
                    <tr>
                        <td>
                            df
                        </td>
                        <td>
                            23
                        </td>
                        <td>
                            34
                        </td>
                    </tr>
                @endfor
            </table>
        </div>
        <div class="modal-footer">
          
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default ownership_submit">Save changes</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
