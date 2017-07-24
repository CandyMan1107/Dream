 {{print_r($noticeList)}}
 {{--  <ul class="list-unstyled">   --}}
     @foreach ($noticeList as $list)
        {{--  <li>  --}}
    
            <div>
                 <a href="/blog/2"> 
                    <strong>
                        [공지]
                    </strong>
                    &nbsp;
                    {{ $list['board_title'] }}
                    &nbsp;
                    <small>{!! $list['created_at'] !!}</small>
                </a>
            </div>
        {{--  </li>  --}}
    @endforeach 
 {{--  </ul>   --}}
