@extends('layouts.master')
@php
	use App\Http\Controllers\BlogController;
@endphp
@include('writer_blog.blogTopMenu')

@section('content')
    {{-- 해당 블로그를 보고 있는 사람의 아닌가 주인인가 아닌데 이상한데 user_id를 가지고 넘어가야하는데...   --}}
    @php
          echo BlogController::showBlogSideMenu(1);   
    @endphp

    <div id="default-padding-mid"></div>
            {{-- BLOG MAIN SPACE START --}}
            <div id="blog-main" class="col-md-8">
                {{-- BLOG MAIN ROW START --}}
                <div class="row">
                    {{-- BLOG NOTICE START --}}
                    <div class="col-md-12 blog_notice_list text-center autoplay-notice">
                        @if ($data == "empty")
                            <h3>메뉴에 작성된 게시글이 없습니다.</h3>
                        @else
                            @php
                                 echo BlogController::mainNoticeList(); 
                            @endphp
                        @endif
                    </div>
                    {{-- BLOG NOTICE END --}}
                    <div id="default-padding"></div>
                    {{-- BLOG BOARD START (NOTICE) --}}
                    <div class="col-md-12 blog_notice">
                        @if ($data == "empty")
                            <h3>포스트 아이콘을 눌러서 게시글을 작성해주세요.</h3>
                        {{-- ELSEIF $_SERVER["REQUEST_URI"] in /blog OR /blog?%%% --}}
                        @elseif (!empty($data[0]) && (strpos($_SERVER["REQUEST_URI"], "/blog/menu")!==false || strpos($_SERVER["REQUEST_URI"], "/blog/menu?")!==false))
                        
                            <div name="blog_post">
                                @php
                                    echo BlogController::selectedMenuAllB($data); 
                                @endphp
                            
                                {{--  @foreach ($data as $menuD)
                                      <div class="board_title">
                                        <ul class="list-inline">
                                            
                                            @if ($menuD->is_notice == "on")
                                                <li>
                                                    <strong>[공지]</strong>
                                                </li>
                                            @endif
                                            <li>
                                                <h4>
                                                    <strong>{!! $menuD->board_title !!}</strong>
                                                </h4>
                                            </li>
                                            <li>
                                                <small>| {!! $menuD->blog_menu_id !!}</small>
                                            </li>
                                            <li class="board_timestamp">
                                                <small>{!! $menuD->created_at !!}</small>
                                            </li> 
                                        </ul>
                                        
                                    </div>
                                    <div name="title_line"></div>
                                    <div class="board_content">
                                        <div id="default-padding-big"></div>
                                        {!! $menuD->board_content !!}
                                    </div>
                                @endforeach

                                <div class="text-center">
                                    {{ $data->appends(['data' => $data->currentPage()])->links() }}   
                                </div>   --}}
                            </div>
                        {{-- ELSE ONCLICK
                        url 받아와서 뒤에 뭐가 있으면 js 파일로 ajax --}}
                        {{--  @else
                            <div name="blog_post">

                            </div>  --}}
                        @endif
                    </div>
                    {{-- BLOG BOARD END (NOTICE) --}}


                </div>
                {{-- BLOG MAIN ROW END --}}





            </div>
            {{-- BLOG MAIN SPACE END --}}



        {{-- BLOG SIDE MENU DIV ROW --}}
        </div>
    {{-- BLOG SIDE MENU DIV CONTAINER --}}
    </div>



    <div id="default-padding-big"></div>

    {{-- JHM STYLE --}}
    <link rel="stylesheet" href="/css/jhm-style.css">
	{{-- JHM SCRIPT --}}
    <script type="text/javascript" src="/js/JHM-Custom/blog_click.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/js/jquery-3.2.0.js"></script>
	<script src="/js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="/js/jquery.mixitup.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/slick.js"></script>
	<script type="text/javascript" src="/js/custom.js"></script>
    
@endsection