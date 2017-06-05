@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		 <script type="text/javascript" src="/js/custom/history.js"></script>
		 <script type="text/javascript" src="/js/custom/additional_items.js"></script>
		<div class="col-xs-16 col-sm-11 col-md-11" style= "background-color : #e8d6b3" >
			<br>
			<div id="timeline" style="height:180px;"></div>
		</div>
		<div class="col-xs-16 col-sm-11 col-md-11 height-max-set">
			<div class="row">
				<form class="form-horizontal" id="time_table" name="time_table" action="{{ route('historyTable.store') }}" method="POST">
					{!! csrf_field() !!}
					<div class="col-xs-8 col-sm-5 col-md-5">
						<h3>사건추가</h3>
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
					</div>

					{{-- 화면 분할 오른쪽 --}}
					<div class="col-xs-7 col-sm-5 col-md-5 height-max-set background_tag">
						<br><br><br>
						{{-- 사건 기간 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">기간</label>
							<div class="col-xs-4">
								<input type="text" name="" class="form-control" placeholder=".col-xs-3">
							</div>
							<label class="col-sm-2 control-label" for="formGroupInputLarge">~</label>
							<div class="col-xs-4">
								<input type="text" class="form-control" placeholder=".col-xs-3">
							</div>
						</div>
						{{-- 등장인물 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">등장 인물</label>
							<div class="col-sm-10">
							<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
							</div>
						</div>
						{{-- 기타 --}}
						<div class="form-group form-group-lg">
							<label class="col-sm-2 control-label" for="formGroupInputLarge">기타</label>
							<div class="col-sm-10">
							<textarea class="form-control" rows="3"></textarea>
							</div>
						</div>
						{{-- 등록 버튼 --}}
						<button type="submit" class="btn btn-default">등록</button>
					</div>
				</form> 
					
				<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag">
					{{-- add_tag.blade.php 구현하고, 컨트롤러로 div안에 불러오는 형식으로 변경 할 것. --}}
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
					<div class="row">
						<h3>태그 등록</h3>
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">태그 이름</h3>
							</div>
							<div class="panel-body">
								<input type="text" class="form-control" placeholder="Text input">
							</div>
						</div>

						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">태그 내용</h3>
							</div>
							<div class="panel-body">
								<textarea class="form-control" rows="3"></textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-default">등록</button>
					</div> 
				</div>
			</div>
		</div>}	
			


		
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
