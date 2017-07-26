@foreach ($data as $list)
    <div class="list_text">
         <a href="/blog/{{ $list['href'] }}">  
            <strong>
                [공지]
            </strong>
            &nbsp;
            {{ $list['board_title'] }}
            &nbsp;
            <small>{!! $list['created_at'] !!}</small>
        </a>
    </div> 
@endforeach 
