@extends('layouts.master')

@section('content')
	<div class="default-padding"></div>
	<a class="btn btn-primary" data-toggle="collapse" href="#collapseBanner" aria-expanded="true" aria-controls="collapseBanner">
		X
	</a>
	<div class="collapse in" id="collapseBanner">
			
			{{--BANNER START--}}
			<div id="banner" class="section-padding">
				<div class="container">
					<div class="row">
						<div class="autoplay-top">
							@for ($i = 0; $i < count($data); $i++)
								<div class="col-md-12">
									<a href="/novel/info/novel_info/{{ $data[$i]['id'] }}">
										<div class="jumbotron">
											<h3 class="novel">{!! $data[$i]['genre'] !!}</h3>
											<h2 class="small">{!! $data[$i]['summary_intro'] !!}</h2>
											<br/>
											<p class="big">{!! $data[$i]['title'] !!}</p>
											<a class="btn btn-banner">자세히 보기<i class="fa fa-search"></i></a>
										</div>
									</a>
								</div>
							@endfor
						</div>
					</div>
				</div>
			</div>
			{{--BANNER END--}}
			
	</div>
	<div id="default-padding-mid"></div>
    {{--SELECT-SPACE START--}}
    <div id="select-space" class="section-padding">
        <div class="container">
            <div class="row">

				
				<div class="col-md-12 text-center">
					<ul class="list-inline">
						<span class="text-left">ALL &nbsp;&nbsp;&nbsp;</span>
						<span class="text-left">완결 &nbsp;</span>
						<li class="fake-circle"></li>
						<li name="dayCircle">
							<strong class="circle-icon">
								월
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
                            	화
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
								{{-- <a href="#wed" class="btn-link-tab" data-day="wed">수</a> --}}
                            	수
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
                            	목
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
                            	금
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
                            	토
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li name="dayCircle">
							<strong class="circle-icon">
                            	일
							</strong>
                        </li>
						<span class="fake-circle"></span>

						<span class="text-right">
							<a data-toggle="collapse" href="#collapseGenreMenu" aria-expanded="false" aria-controls="collapseGenreMenu">
								&nbsp; 장르 &nbsp;&nbsp;&nbsp;
							</a>
						</span>
						{{-- <span class="text-right"> 정렬</span> --}}
						<span class="dropdown">
							<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								 정렬
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li>인기순</li>
								<li>조회순</li>
								<li>추천순</li>
							</ul>
						</span>

					</ul>

				</div>

				<div id="default-padding-small"></div>

				<div class="collapse" id="collapseGenreMenu">
					<table class="table text-center">
						<tr>
							<td>
								<a href="#Romance">로맨스</a>
							</td>
							<td>
								<a href="#Fantasy">판타지</a>
							</td>
							<td>
								<a href="#RF">로맨스 판타지</a>
							</td>
							<td>
								<a href="#SF">SF</a>
							</td>
						</tr>
					</table>
				</div>

            </div>
			{{--row END--}}
        </div>
		{{--container END--}}
    </div>
    {{--SELECT-SPACE END--}}
	
	<div id="default-padding-mid"></div>

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