
{{--TODAY-NOVEL START--}}
<div id="today-novel" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="page-title text-center">
					@if (empty($data))
						<h1>오늘의 웹소설</h1>
					@else
						<h1><a class="noDeco" href="/novel/kind/today_novel_by_day">오늘의 웹소설</a></h1>
					@endif
					<p>오늘의 <br>HOT한 소설! </p>
					<hr class="pg-titl-bdr-btm"></hr>
				</div>
					@if (empty($data))
						<h1>조금만</h1>
					@else
						@for ($i = 0; $i < count($data); $i++)
							<div class="col-md-4">
								<a href="/novel/info/novel_info/{{ $data[$i]['id'] }}">
									<div class="service-box">
										<div class="service-icon"><img src="upload/images/{{ $data[$i]['cover_img_src'] }}" /></div>
										<div class="service-text">
											<h5 class="genre">{!! $data[$i]['genre'] !!}</h5>
											<h3>{!! $data[$i]['title'] !!}</h3>
											<p> <i class="fa fa-pencil"></i> 글반죽</p>
											<p> <b>{!! $data[$i]['summary_intro'] !!}</b></p>
										</div>
									</div>
								</a>
							</div>
						@endfor
					@endif
			</div>
		</div>
	</div>
    {{--TODAY-NOVEL END--}}

