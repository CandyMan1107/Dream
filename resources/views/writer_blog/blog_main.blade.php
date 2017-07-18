@extends('layouts.master')

@include('writer_blog.blogTopMenu')

@section('content')
    @include('writer_blog.blogSideMenu')
    <div id="default-padding-mid"></div>
            {{-- BLOG MAIN SPACE START --}}
            <div id="blog-main" class="col-md-8">
                {{-- BLOG MAIN ROW START --}}
                <div class="row">
                    {{-- BLOG NOTICE START --}}
                    <div class="col-md-12 blog_notice_list">
                        <ul class="list-unstyled">
                            <li>
                                <div>
                                    <strong>[NOTICE]</strong>
                                    &nbsp;
                                    NOTICE1
                                </div>
                            </li>
                            <li>
                                <div>
                                    <strong>[NOTICE]</strong>
                                    &nbsp;
                                    NOTICE2
                                </div>
                            </li>
                        </ul>
                    </div>
                    {{-- BLOG NOTICE END --}}
                    <div id="default-padding"></div>
                    {{-- BLOG BOARD START (NOTICE) --}}
                    <div class="col-md-12 blog_notice">
                        <div class="notice_title">
                            NOTICE TITLE
                        </div>
                        <hr />
                        <div class="notice_context">
                            <div id="default-padding-big"></div>
                            NOTICE CONTEXT
                        </div>
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
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/JHM-Custom/jhm-todayNovel-custom.js"></script>
	<script src="/js/jquery-3.2.0.js"></script>
	<script src="/js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="/js/jquery.mixitup.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/slick.js"></script>
	<script type="text/javascript" src="/js/custom.js"></script>
@endsection