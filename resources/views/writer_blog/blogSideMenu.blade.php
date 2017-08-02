@php
	use App\Http\Controllers\BlogController;
@endphp
<div class="container">
    <div class="row">
        {{-- BLOG SIDE MENU DIV START --}}
        <div id="blog-side-menu" class="col-md-4">
            {{-- USER IMG --}}
            <div class="user_icon text-center">
                <i class="material-icons">account_circle</i>
            </div>
            {{-- USER PROFILE --}}
            <div class="user_profile">
            <input type="hidden" value="1" name="user_id" />
                <div class="user_info text-center">
                    <strong>U-NAME</strong>
                    &nbsp;
                    (
                        U-ID
                    )
                </div>
                
                <div class="profile_text">
                    {!! $data[0]['blog_introduce'] !!}
                </div>
                <div id="default-padding-mid"></div>
                <div class="user_setting text-center">
                {{-- 블로그 메뉴 있을 때 없을 때 마우스 막아놓기!   --}}
                    {{--  <a href="{{ route('blog.create') }}">  --}}
                    <a href="/blog/create/{{$data[0]['id']}}">
                        <div>
                            <i class="material-icons">border_color</i>
                        </div>
                        <div>포스트</div>
                    </a>
                    {{--  <a href="#">
                        <div>
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <div>쪽지</div>
                    </a>  --}}
                    &nbsp;&nbsp;
                    {{-- 관리 : 사용자의 블로그일 때만 표시   --}}
                    <a href="/blog/setMap/1">
                        <div>
                            <i class="material-icons">settings</i>
                        </div>
                        <div>관리</div>
                    </a>
                </div>
            </div>
            <div id="default-padding-mid-1"></div>
            {{-- BLOG MENU NAV --}}
            <div class="user_novel_nav">
                <strong>USER 의 소설</strong>
                {{-- 소설 있을 때 없을 때   --}}
                <ul>
                    <li>NOVEL1</li>
                    <li>NOVEL2</li>
                </ul>
            </div>
            <hr />
            <div class="blog_menu_nav">
                <strong>작가의 방</strong>
                {{-- 블로그 메뉴 있을 때 없을 때   --}}
                @if ($data[0]['blog_menu_id'] == "empty")
                    <h5>메뉴가 없습니다.</h5>
                @else
                    @php
                        echo BlogController::showAllMenu($data[0]['id']); 
                    @endphp
                @endif
                
            </div>
            <div id="default-padding-mid"></div>
            {{-- BLOG INFO BAR --}}
            <div class="blog_info_bar">
                <strong>활동정보</strong>
                {{-- BLOG FOLLOW - NUMBER --}}
                <div class="blog_follow_info">
                    <div>
                        <h1>000</h1>
                    </div>
                    <div name="blogInfoNumText">
                        &nbsp; 명이
                    </div>
                    <br />
                    작가의 방을 구독중입니다.
                </div>
                {{-- WRITER NOVEL INFO - NUMBER --}}
                <div class="writer_novel_info">
                    <div>
                        <h1>000</h1>
                    </div>
                    <div name="blogInfoNumText">
                        &nbsp; 편의
                    </div>
                    <br />
                    웹 소설을 집필 했습니다.
                </div>
            </div>
            <hr />
            {{-- BLOG COUNTER --}}
            <div class="blog_counter">
                <small>방문자수</small>
                {{-- <br /> --}}
                <div class="blog_visit_info">
                    <div>
                        <strong class="text-uppercase">Today</strong>
                    </div>
                    <div class="blog_visitNum">
                        <strong>
                            {!! $data[0]['today_hit'] !!}
                        </strong>
                    </div>
                </div>
                <div class="blog_visit_info">
                    <div>
                        <strong class="text-uppercase">Total</strong>
                    </div>
                    <div class="blog_visitNum">
                        <strong>
                            {!! $data[0]['total_hit'] !!}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
        {{-- BLOG SIDE MENU DIV END --}}







