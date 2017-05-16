@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="col-xs-4 col-sm-3 col-md-3 height-max-set" style= "background-color : #e8d6b3" >D3.JS 트리 그리기 이용해서 그릴것.</div>
		<div class="col-xs-7 col-sm-6 col-md-6 height-max-set" >
			<h3>사건추가</h3>
			{{-- 사건 제목 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">제목</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
					</div>
				</div>
			</form>
			{{-- 사건 내용 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
			{{-- 사건 추가사항 추가 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" id="formGroupInputSmall" placeholder="Small input">
					</div>
					<div class="col-sm-2">
						<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:200%"></i>
					</div>
				</div>
			</form>
			{{-- 사건 기간 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">기간</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
					<label class="col-sm-2 control-label" for="formGroupInputLarge">~</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
				</div>
			</form>
			{{-- 등장인물 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">등장 인물</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
					</div>
				</div>
			</form>
			{{-- 기타 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">기타</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
			<button type="submit" class="btn btn-default">등록</button>
		</div>


		<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag" >
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

	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
