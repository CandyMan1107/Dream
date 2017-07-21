<ul class="list-unstyled">
    @foreach ($noticeList as $list)
        <li>
            <div>
                <strong>
                    [공지]
                </strong>
                &nbsp;
                {{ $list['board_title'] }}
            </div>
        </li>
    @endforeach
</ul>
{{ $noticeList->appends(['noticeList' => $noticeList->currentPage()])->links() }}  