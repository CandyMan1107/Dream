@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		 <script type="text/javascript" src="/js/custom/history.js"></script>
		 <script type="text/javascript" src="/js/custom/additional_items.js"></script>
		 <script type="text/javascript" src="/js/custom/timetable_event.js"></script>
		 <script> ready(  <?=json_encode($data)?>  ) </script>
		 <script> timetableEvent( <?=json_encode($data)?> ) </script>
		<div class="col-xs-16 col-sm-11 col-md-11" style= "background-color : #e8d6b3" >
			<br>
			<div class="row" id="timeline" style="height:180px;">
			</div>
			<nav aria-label="...">
				<ul class="pager" id="timetableList">
					{{-- <script> timetableList( <?=json_encode($data) ?>)</script>  --}}
					<?php
						if($data[0]){
							for($i = 0 ; $i < count($data) ; $i++){
							?>
								<li class="event_list" id="{{$i}}"><a href="#">{{$data[$i]['event_name']}}</a></li>
							<?php
							}
						}	
					?>
				</ul>
			</nav>
		</div>
		
		<div class="col-xs-16 col-sm-11 col-md-11 height-max-set">
			<div class="row" id="list">
			{{-- {{ var_dump($data) }} --}}
				<form class="form-horizontal" id="time_table" name="time_table" action="{{ route('historyTable.store') }}" method="POST">
					{!! csrf_field() !!}
					<div class="col-xs-8 col-sm-5 col-md-5">
						<h3 id="name">사건추가</h3>
						{{-- 사건 제목 등록 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">제목</label>
							<div class="col-sm-10">
							<input class="form-control" type="text" name="event_name" id="event_name" placeholder="사건 이름">
							</div>
						</div>
						{{-- 사건 내용 등록 --}}	
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
							<div class="col-sm-10">
							<textarea class="form-control" rows="3" name="event_content" id="event_content"></textarea>
							</div>
						</div>
						{{-- 사건 추가사항 추가 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
							<div class="col-sm-7">
								<input class="form-control" id="add_item" name="add_items" list="browsers"> 
								<datalist id="browsers">
									<option value="추가 사항 입력"> 
									<option value="추가 사항 입력"> 
								</datalist>
							</div>
							<div class="col-sm-2">
								<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:200%" id="additional_items"></i>
							</div>
						</div>
						{{-- 사건 기간 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">기간</label>
							<div class="col-xs-4">
								<input type="text" name="start_day" id="start_day" class="form-control" placeholder="2017.01.01">
							</div>
							<label class="col-sm-2 control-label" for="formGroupInputLarge">~</label>
							<div class="col-xs-4">
								<input type="text" name="end_day" id="end_day" class="form-control" placeholder="2017.12.31">
							</div>
						</div>
					</div>

					{{-- 화면 분할 오른쪽 --}}
					<div class="col-xs-7 col-sm-5 col-md-5 height-max-set background_tag">
						<br><br><br>
						{{-- 등장인물 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">등장 인물</label>
							<div class="col-sm-10">
							<input class="form-control" name="character" type="text" id="character" placeholder="Large input">
							</div>
						</div>
						{{-- 등장사물 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">등장 사물</label>
							<div class="col-sm-10">
							<input class="form-control" name="item" id="item" type="text" id="formGroupInputLarge" placeholder="Large input">
							</div>
						</div>
						{{-- 배경장소 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">배경 장소</label>
							<div class="col-sm-10">
							<input class="form-control" name="place" id="place" type="text" id="formGroupInputLarge" placeholder="Large input">
							</div>
						</div>
						{{-- 기타 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">기타</label>
							<div class="col-sm-10">
							<textarea class="form-control" id = "other" name="other" rows="3"></textarea>
							</div>
						</div>
						{{-- 등록,삭제,수정 버튼 --}}
						<button type="submit" id="submit_delete" class="btn btn-default">삭제</button>
						<button type="submit" id="submit_history" class="btn btn-default">등록</button>
					</div>
				</form> 
					
				<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag">
					<form class="form-horizontal main-navigation">
						<div class="form-group form-group-sm">
							<br>
							<label class="col-sm-2 control-label" for="formGroupInputSmall">검색</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" id="formGroupInputSmall" placeholder="Small input">
							</div>
							<br>
							<br>
							<button type="submit" class="btn btn-default">검색</button>
						</div>
					</form>
					{{-- add_tag.blade.php 구현하고, 컨트롤러로 div안에 불러오는 형식으로 변경 할 것. --}}
					 
				</div>
			</div>
		</div>}	
			


		
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
