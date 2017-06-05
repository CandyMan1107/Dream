@extends('layouts.master')

@section('content')
	<div class="default-padding"></div>
	<a class="btn btn-primary" data-toggle="collapse" href="#collapseBanner" aria-expanded="false" aria-controls="collapseBanner">
		X
	</a>
	<div class="collapse in" id="collapseBanner">
			
			{{--BANNER START--}}
			<div id="banner" class="section-padding">
				<div class="container">
					<div class="row">
						<div class="autoplay-top">
							<div class="col-md-12">
								<a href="/novel/novel_info">
									<div class="jumbotron">
										<h3 class="novel">소설</h3>
										<h2 class="small">왠만하면 마주치고 싶지 않은 까칠한 이웃 남자,<br/>오베가 나타났다!</h2>
										<br/>
										<p class="big">오베라는 남자</p>
										<a href="/novel/novel_info" class="btn btn-banner">자세히 보기<i class="fa fa-search"></i></a>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="/novel/novel_info">
									<div class="jumbotron">
										<h3 class="novel">소설</h3>
										<h2 class="small">왠만하면 마주치고 싶지 않은 까칠한 이웃 남자,<br/>오베가 나타났다!</h2>
										<br/>
										<p class="big">오베라는 남자</p>
										<a href="/novel/novel_info" class="btn btn-banner">자세히 보기<i class="fa fa-search"></i></a>
									</div>
								</a>
							</div>
							<div class="col-md-12">
								<a href="/novel/novel_info">
									<div class="jumbotron">
										<h3 class="novel">소설</h3>
										<h2 class="small">왠만하면 마주치고 싶지 않은 까칠한 이웃 남자,<br/>오베가 나타났다!</h2>
										<br/>
										<p class="big">오베라는 남자</p>
										<a href="/novel/novel_info" class="btn btn-banner">자세히 보기<i class="fa fa-search"></i></a>
									</div>
								</a>
							</div>
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
						<span class="text-left">ALL &nbsp;</span>
						<span class="text-left">완결 &nbsp;</span>
						<li class="fake-circle"></li>
						<li>
							<strong class="circle-icon">
								<a href="#mon" class="btn-link-tab" data-day="mon">월</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="tue">화</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="wed">수</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="thu">목</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="fri">금</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="sat">토</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>
                        <li>
							<strong class="circle-icon">
                            	<a href="#mon" class="btn-link-tab" data-day="sun">일</a>
							</strong>
                        </li>
						<span class="fake-circle"></span>

						<span class="text-right">
							<a data-toggle="collapse" href="#collapseGenreMenu" aria-expanded="false" aria-controls="collapseGenreMenu">
								&nbsp; 장르 &nbsp;
							</a>
						</span>
						<span class="text-right"> 정렬</span>
						
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
    Action <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
					</ul>

				</div>

				<div id="default-padding-small"></div>

				<div class="col-md-12 collapse" id="collapseGenreMenu">
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

	{{-- <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		$(document).ready(function (){
			$("li").each(function (){
				$(this).click(function (){
					$(this).addClass("selected");
					$(this).siblings().removeClass("selected");
				});
			});

			$("td").each(function (){
				$(this).click(function (){
					$(this).addClass("selected");
					$(this).siblings().removeClass("selected");
				});
			});
		});
	</script> --}}
@endsection