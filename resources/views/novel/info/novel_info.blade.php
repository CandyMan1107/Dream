@extends('layouts.master')

@section('content')
    <div class="default-padding"></div>
        {{-- novel-info-1 START --}}
        <div id="novel-info-1" class="section-padding">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-left novel-info-upper-text">
                        <h3><strong>
                            {!! $data[0]['title'] !!}
                        </strong></h3>
                        <h5><small>글</small>&nbsp;글작가</h5>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="material-icons" name="favorite">favorite_border</i>
                        <h4>1</h4>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="material-icons">chat</i>
                        <h4>소설리뷰</h4>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="material-icons" name="star">star_border</i>
                        <h4>관심등록</h4>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="material-icons">share</i>
                        <h4>공유하기</h4>
                    </div>
                </div>
                <hr />
            </div>
            {{-- container class END --}}
        </div>
        {{-- novel-info-1 END --}}
        <div id="default-padding-small"></div>
        {{-- novel-info-2 START --}}
        <div id="novel-info-2">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="/upload/images/{{ $data[0]['cover_img_src'] }}" width="225" />
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-user-o hit-icon" aria-hidden="true"></i>
                                &nbsp;
                                1
                            </div>
                            <div class="col-md-2 upload-day">
                                <b>수, 토</b> 연재
                            </div>
                            <div class="col-md-2 genre-default">
                                {{ $data[0]['genre'] }}
                            </div>
                            {{-- <div class="col-md-3">
                                소설 | 판타지
                            </div> --}}
                        </div>
                    </div>
                    <div id="default-padding-mid" class="col-md-9"></div>
                    <div class="col-md-9">
                        <p class="lead">
                            <strong>
                                {!! $data[0]['summary_intro'] !!}
                            </strong>
                        </p>
                        <p>{!! $data[0]['intro'] !!}</p>
                    </div>
                    <div id="default-padding-mid-1" class="col-md-9"></div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control input-lg" onchange="location = this.value;">
                                    @for ($i = count($data); $i > 0; $i--)
                                    <option value="/novel/read/novel_read_view/{{$data[0]['novelId']}}&{{$i}}">
                                        {{$i}}
                                    </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <a href="/novel/read/novel_read_view/{{$data[0]['novelId']}}&1">
                                    <button class="btn btn-default btn-block novel-1st-read-Btn">첫회보기</button>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-default btn-block novel-background-read-Btn" data-toggle="modal" data-target="#backgroundModal">소설 배경 설정 보기</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- container class END --}}
        </div>
        {{--quickMenu & viewer & background MODAL START--}}
        @php
        use App\Http\Controllers\NovelController;
        
        echo NovelController::backgroundModal($data);
        @endphp
        {{--quickMenu & viewer & background MODAL END--}}
        {{-- novel-info-2 END --}}
        <div id="default-padding-big" class="col-md-12"></div>
        {{-- novel-info-3 START --}}
        <div id="novel-info-3" class="section-padding">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3>
                            소설회차 <small>({{count($data)}})</small>
                        </h3>
                    </div>
                    <div class="col-md-6 text-right sort">
                        <h5>
                            <span class="sort-text">최신화부터</span> <span><i class="material-icons selectedIcon" name="check">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">첫화부터</span> <span><i class="material-icons"  name="check">check</i></span>
                        </h5>
                    </div>
                    
                    <div id="default-padding-small" class="col-md-12"></div>
                        @foreach ($data as $d)
                            <div class="col-md-12">
                                <div class="episode">
                                    <div class="row">
                                        <a href="/novel/read/novel_read_view/{{$d['belong_to_novel']}}&{{ $d['episode_count'] }}">
                                            <div class="col-md-3">
                                                <div>
                                                    <img src="/upload/images/{{ $d['episode_cover_src'] }}" width="261" height="160" />
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="episode-list">
                                                    <div class="col-md-12">
                                                        <h4>{{ $d['episode_count'] }}. {{ $d['episode_title'] }}</h4>
                                                    </div>
                                                    <div id="default-padding-small-0" class="col-md-12"></div>
                                                    <div class="col-md-2">
                                                        <i class="fa fa-star" aria-hidden="true"></i>&nbsp;1
                                                    </div>
                                                    <div class="col-md-2">
                                                        <small>댓글</small>&nbsp;<strong>1</strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        {{ $d['created_at'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="default-padding-small" class="col-md-12"></div>
                        @endforeach
                    
                    {{--PAGE--}}
                    <div id="default-padding-small-1" class="col-md-12"></div>
                </div>
                {{-- row class END --}}
            </div>
            {{-- container class END --}}
        </div>
        {{-- novel-info-3 END --}}
        <div id="default-padding-mid-1" class="col-md-12"></div>
        {{-- novel-review START --}}
        <div id="novel-review">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3>소설리뷰 <small>(1)</small></h3>
                    </div>
                    <div class="col-md-6 text-right sort">
                        <h5>
                            <span class="sort-text">최신순</span> <span><i class="material-icons selectedIcon" name="check">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">추천순</span> <span><i class="material-icons" name="check">check</i></span>
                        </h5>
                    </div>
                    <div id="default-padding-mid" class="col-md-12"></div>
                    <div class="col-md-12 review-list">
                        <div class="row">
                            <div class="col-md-9 text-left">
                                <span><strong>이대감</strong></span>
                                &nbsp;
                                <span><small>2017-05-01 00:29:24</small></span>
                            </div>
                            <div class="col-md-3 text-right thumb-up">
                                <span><i class="material-icons" name="thumb">thumb_up</i></span>
                                <span class="thumb-text">12</span>
                            </div>
                            <div id="default-padding-small" class="col-md-12"></div>
                            <div class="col-md-12">
                                <span><small>1화</small></span>
                                &nbsp;
                                <span>엄청 재밌어요! 글작가님 글은 항상 재미있었지만 오베는 역대급!</span>
                            </div>
                            <div id="default-padding-small-1" class="col-md-12"></div>
                            <div class="col-md-12 review" data-toggle="collapse" href="#collapseComment" aria-expanded="false" aria-controls="collapseComment">
                                <span class="re-review-text"><small>답글</small></span>
                                <span><i class="material-icons" name="arrow">keyboard_arrow_down</i></span>
                            </div>
                            <div class="col-md-12 collapse" id="collapseComment">
                                <div class="input-group input-group-mg commentReply">
                                    <input type="text" class="form-control" placeholder="로그인 후 이용해주세요.">
                                    <span class="input-group-addon">등록</span>
                                </div>
                            </div>
                            <div id="default-padding-small-1" class="col-md-12"></div>
                        </div>
                    </div>
                    <div id="default-padding-mid" class="col-md-12"></div>
                </div>
                {{-- row class END --}}
            </div>
            {{-- container class END --}}
        </div>
        {{-- novel-review END --}}

        {{-- JHM STYLE --}}
        <link rel="stylesheet" href="/css/jhm-style.css">
        {{-- JHM SCRIPT --}}
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="/js/JHM-Custom/jhm-selectIcon-custom.js"></script>
        <script src="/js/JHM-Custom/jhm-comment.js"></script>
@endsection