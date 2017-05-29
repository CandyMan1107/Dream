@extends('layouts.master')

@section('content')
    <div class="default-padding"></div>

    {{-- novel-info-1 START --}}
        <div id="novel-info-1" class="section-padding">
            {{-- container class START --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-left novel-info-upper-text">
                        <h3><strong>오베라는 남자</strong></h3>
                        <h5><small>글</small>&nbsp;글작가</h5>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <h4>11,896</h4>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                        <h4>소설리뷰</h4>
                    </div>
                    <div class="col-md-1 text-center novel-info-upper-icon">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
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
                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="225" />
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
                            <strong>웬만하면 마주치고 싶지 않은 까칠한 이웃 남자, 오베가 나타났다!</strong>
                        </p>
                        <p>무엇이든 발길질을 하며 상태를 확인하는 남자. BMW 운전자와는 말도 섞지 않는 남자. 키보드 없는 아이패드에 분노하는 남자. 매일 아침 6시 15분 전 알람도 없이 깨어나 항상 같은 시간, 같은 양의 커피를 내려 아내와 한 잔씩 나누어 마시고 마을 한 바퀴를 돌며 시설물들이 고장 난 것은 없는지, 아니 누군가 고장 낸 것은 없는지 확인하는 남자, 오베. 그런 그의 인생에 균열이 생기기 시작했다.</p>
                        <p>하지만 오베가 막 천장에 고리를 박으려는 순간, 건너편 집에 지상 최대의 얼간이가 이사를 오고 엄청나게 귀찮고 성가신 소리를 내기 시작한다. 오베가 딱 싫어하는 타입의 이 인간들로 인해 오베의 계획은 시작 단계에 이르기도 어려운 지경이다. 사람을 다방면으로 귀찮게 하는 인간들은 오베가 자살을 기도할 때마다 기막힌 타이밍에 오베가 자살을 포기하고 싶게 만들 만큼 방해를 하기 시작하는데…….</p>
                    </div>
                    <div id="default-padding-mid-1" class="col-md-9"></div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control input-lg">
                                    <option>5</option>
                                    <option>4</option>
                                    <option>3</option>
                                    <option>2</option>
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <a href="/novel/read/novel_read_view"><button class="btn btn-default btn-block novel-1st-read-Btn">첫회보기</button></a>
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
                        <h3>소설회차 <small>(5)</small></h3>
                    </div>
                    <div class="col-md-6 text-right sort">
                        <h5>
                            <span class="sort-text">최신화부터</span> <span><i class="material-icons check-icon">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">첫화부터</span> <span><i class="material-icons">check</i></span>
                        </h5>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="261" height="160" />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="episode-list">
                                        <div class="col-md-12">
                                            <h4>1. 오베라는 남자(5)</h4>
                                        </div>
                                        <div id="default-padding-small-0" class="col-md-12"></div>
                                        <div class="col-md-2">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;11,896
                                        </div>
                                        <div class="col-md-2">
                                            <small>댓글</small>&nbsp;<strong>52</strong>
                                        </div>
                                        <div class="col-sm-2">
                                            2017.05.06
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="261" height="160" />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="episode-list">
                                        <div class="col-md-12">
                                            <h4>1. 오베라는 남자(4)</h4>
                                        </div>
                                        <div id="default-padding-small-0" class="col-md-12"></div>
                                        <div class="col-md-2">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;11,896
                                        </div>
                                        <div class="col-md-2">
                                            <small>댓글</small>&nbsp;<strong>52</strong>
                                        </div>
                                        <div class="col-md-2">
                                            2017.05.03
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="261" height="160" />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="episode-list">
                                        <div class="col-md-12">
                                            <h4>1. 오베라는 남자(3)</h4>
                                        </div>
                                        <div id="default-padding-small-0" class="col-md-12"></div>
                                        <div class="col-md-2">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;11,896
                                        </div>
                                        <div class="col-md-2">
                                            <small>댓글</small>&nbsp;<strong>52</strong>
                                        </div>
                                        <div class="col-md-2">
                                            2017.04.29
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="261" height="160" />
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="episode-list">
                                        <div class="col-md-12">
                                            <h4>1. 오베라는 남자(2)</h4>
                                        </div>
                                        <div id="default-padding-small-0" class="col-md-12"></div>
                                        <div class="col-md-2">
                                            <i class="fa fa-star-o" aria-hidden="true"></i>&nbsp;11,896
                                        </div>
                                        <div class="col-md-2">
                                            <small>댓글</small>&nbsp;<strong>52</strong>
                                        </div>
                                        <div class="col-md-2">
                                            2017.04.26
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-small" class="col-md-12"></div>
                    <div class="col-md-12">
                        <div class="episode">
                            <div class="row">
                                <div class="col-md-3">
                                    <div>
                                        <img src="/img/A_MAN_CALLED_OVE.jpg" width="261" height="160" />
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
                            </div>
                        </div>
                    </div>
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
                            <span class="sort-text">최신순</span> <span><i class="material-icons check-icon">check</i></span>
                            &nbsp;&nbsp;&nbsp;
                            <span class="sort-text">추천순</span> <span><i class="material-icons">check</i></span>
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
                                <span><i class="material-icons">thumb_up</i></span>
                                <span class="thumb-text">12</span>
                            </div>
                            <div id="default-padding-small" class="col-md-12"></div>
                            <div class="col-md-12">
                                <span><small>5화</small></span>
                                &nbsp;
                                <span>엄청 재밌어요! 글작가님 글은 항상 재미있었지만 오베는 역대급!</span>
                            </div>
                            <div id="default-padding-small-1" class="col-md-12"></div>
                            <div class="col-md-12 review">
                                <span class="re-review-text"><small>답글</small></span>
                                <span><i class="material-icons">keyboard_arrow_down</i></span>
                            </div>
                        </div>
                    </div>
                    <div id="default-padding-mid" class="col-md-12"></div>
                </div>
                {{-- row class END --}}
            </div>
            {{-- container class END --}}
        </div>
        {{-- novel-review END --}}
@endsection