@extends('layouts.master')
@php
	use App\Http\Controllers\BlogController;
@endphp
@if ($data[0] == "Please create a blog.")
    @include('partials.mySubNavi')
@else
    @include('writer_blog.blogTopMenu')  
@endif
@section('content')
    @if ($data[0] == "Please create a blog.")
        @php
            echo BlogController::showBlogCreateForm($data);
        @endphp
    
    @elseif ($data[0] == "error")
        <div id="default-padding-big"></div>
        <h1>웹 소설 작가가 되면 작가의 방을 이용하실 수 있어요!</h1>
    @else
        {{-- 현재 가지고 있는 user_id를 가지고 넘어가야하는데...   --}}
        @php
            echo BlogController::showBlogSideMenu(1);   
        @endphp
        {{--  @include('writer_blog.blogSideMenu')  --}}

        <div id="default-padding-mid"></div>
                {{-- BLOG MAIN SPACE START --}}
                <div id="blog-main" class="col-md-8">
                    {{-- BLOG MAIN ROW START --}}
                    <div class="row">
                        {{-- BLOG NOTICE START --}}
                        <div class="col-md-12 blog_notice_list text-center autoplay-notice">
                            @if (empty($data[0]))
                                <h3>블로그가 텅 비었네요!</h3>
                            @else
                                @php
                                    echo BlogController::mainNoticeList($data); 
                                @endphp
                            @endif
                        </div>
                        {{-- BLOG NOTICE END --}}
                        <div id="default-padding"></div>
                        {{-- BLOG BOARD START (NOTICE) --}}
                        <div class="col-md-12 blog_notice">
                            @if (empty($data[0]))
                                <h3>마치 통장 같아! 텅장!</h3>
                            {{-- ELSEIF $_SERVER["REQUEST_URI"] in /blog OR /blog?%%% --}}
                            @elseif (!empty($data[0]) && (strpos($_SERVER["REQUEST_URI"], "/blog")!==false || strpos($_SERVER["REQUEST_URI"], "/blog?")!==false))
                                <div name="blog_post">
                                    @php
                                        echo BlogController::allBoard(); 
                                    @endphp
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

    @endif

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
