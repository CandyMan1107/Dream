<article>
	<header>
		<style type="text/css">
			@font-face {
				font-family:nav-font; src: url('{{ asset('../public/fonts/APJapanesefontH.ttf') }}');
			}
		</style>
			<div class="main-navigation navbar-fixed-top">
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<a class="" href="/">
							<img alt="" src="/img/logo.png" style="width:10%">
						</a>
						<ul class="nav navbar-nav navbar-right">

							<li class="active"><a href="/">Home</a></li>
							{{-- SESSION의 user_id string 으로 변경하기 --}}
							<li><a href="/yerriel/blog">Blog</a></li>
							{{--  <li><a href="#today-novel">오늘의 웹소설</a></li>
							<li><a href="#best-novel">베스트 웹소설</a></li>  --}}
							<li><a href="#event">이벤트</a></li>
							<li><a href="#about">고객센터</a></li>

							@if(Session::has('user_id'))
								<li><a href="/logout">로그아웃</a></li>
								<li><a href="/write_novel/my_novel">마이페이지</a></li>
							@else
								<li><a href="/login">로그인</a></li>
								<li><a href="/register">회원가입</a></li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
</article>
