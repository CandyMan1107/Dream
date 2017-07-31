@extends('layouts.master')

@include('writer_blog.blogTopMenu')

@section('content')
    @include('writer_blog.blogSideMenu')
    <div id="default-padding-mid"></div>
            {{-- BOARD WRITE FORM SPACE START --}}
            <div id="write-form" class="col-md-8">

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/formr-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        {{-- 나중에 수정하기! 해당 블로그 자동 증가 아이디로 --}}
                        <input type="hidden" value="1" name="blog_id" />
                        <div class="row">
                            {{--  blog_menu_id  --}}
                            <div class="col-md-3">
                                <select name="blog_menu_id" id="post-category" class="form-control">
                                    <option value="1">menu1</option>
                                    <option value="2">menu2</option>
                                </select>
                            </div>
                            {{--  board_title  --}}
                            <div class="col-md-9">
                                <input name="board_title" id="post-title" type="text" placeholder="포스트 제목을 입력하세요." />
                            </div> 
                            {{-- is_notice --}}
                            <div class="col-md-12">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="is_notice" id="notice-check"> 공지
                                </label>
                            </div>
                            {{--  board_content  --}}
                            <div class="col-md-12">
                                <textarea name="board_content" id="post-content" cols="101" rows="5" autofocus>
                                
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-default">임시저장 구현해주겠니</button>
                    &nbsp; &nbsp;
                    <button type="submit" class="btn btn-default">등록</button>
                </form>
            </div>
            {{-- BOARD WRITE FORM SPACE END --}}


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
	<script src="/js/jquery-3.2.0.js"></script>
	<script src="/js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="/js/jquery.mixitup.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/slick.js"></script>
	<script type="text/javascript" src="/js/custom.js"></script>
@endsection