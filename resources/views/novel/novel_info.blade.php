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
                            {!! $data['title'] !!}
                        </strong></h3>
                        <h5><small>글</small>&nbsp;글작가</h5>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="material-icons" name="favorite">favorite_border</i>
                        <h4>11,896</h4>
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
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
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
                        <img src="/img/OVE.jpg" width="225" />
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa fa-user-o hit-icon" aria-hidden="true"></i>
                                &nbsp;
                                174,282
                            </div>
                            <div class="col-md-2 upload-day">
                                <b>수, 토</b> 연재
                            </div>
                            <div class="col-md-2">
                                소설
                            </div>
                            <div class="col-md-3">
                                소설 | 현대 | 노인 | 괴짜
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-mid" class="col-md-9"></div>
                    <div class="col-md-9">
                        <p class="lead">
                            <strong>
                                {!! $data['summary_intro'] !!}
                            </strong>
                        </p>
                        <p>{!! $data['intro'] !!}</p>
                        {{-- <p>하지만 오베가 막 천장에 고리를 박으려는 순간, 건너편 집에 지상 최대의 얼간이가 이사를 오고 엄청나게 귀찮고 성가신 소리를 내기 시작한다. 오베가 딱 싫어하는 타입의 이 인간들로 인해 오베의 계획은 시작 단계에 이르기도 어려운 지경이다. 사람을 다방면으로 귀찮게 하는 인간들은 오베가 자살을 기도할 때마다 기막힌 타이밍에 오베가 자살을 포기하고 싶게 만들 만큼 방해를 하기 시작하는데…….</p> --}}
                    </div>
                    <div id="default-padding-mid-1" class="col-md-9"></div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control input-lg">
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <a href="/novel/read/novel_read_view/{{$data['id']}}&1"><button class="btn btn-default btn-block novel-1st-read-Btn">첫회보기</button></a>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-default btn-block novel-background-read-Btn">소설 배경 설정 보기</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- container class END --}}
        </div>
        {{-- novel-info-2 END --}}
        <div id="default-padding-big" class="col-md-12"></div>
        {{-- novel-info-3 START --}}
        <div id="novel-info-3" class="section-padding">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h3>소설회차 <small>(1)</small></h3>
                    </div>
                    <div class="col-md-6 text-right sort">
                        <h5>
                            <span class="sort-text">최신화부터</span> <span><i class="material-icons selectedIcon" name="check">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">첫화부터</span> <span><i class="material-icons"  name="check">check</i></span>
                        </h5>
                    </div>
                    
                    <div id="default-padding-small" class="col-md-12"></div>

                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <a href="/novel/read/novel_read_view/{{$data['id']}}&1">
                                    <div class="col-md-3">
                                        <div>
                                            <img src="/img/OVE.jpg" width="261" height="160" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="episode-list">
                                            <div class="col-md-12">
                                                <h4>1. 오베라는 남자(1)</h4>
                                            </div>
                                            <div id="default-padding-small-0" class="col-md-12"></div>
                                            <div class="col-md-2">
                                                <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;11,896
                                            </div>
                                            <div class="col-md-2">
                                                <small>댓글</small>&nbsp;<strong>52</strong>
                                            </div>
                                            <div class="col-md-2">
                                                2017.04.23
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
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
                                <span><small>5화</small></span>
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