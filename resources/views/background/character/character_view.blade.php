@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="col-xs-6 col-sm-4 col-md-4 height-max-set" style= "background-color : #e8d6b3" ></div>
		<div class="col-xs-5 col-sm-5 col-md-5 height-max-set" >
			<p>캐릭터 등록</p>
			{{-- 캐릭터 이름 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">이름</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
					</div>
				</div>
			</form>
			{{-- 캐릭터 내용 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
			{{-- 캐릭터 추가사항 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
					<div class="col-sm-10">
					
					</div>
				</div>
			</form>
			{{-- 이미지 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">이미지 등록</label>
					<div class="col-sm-10">
					
					</div>
				</div>
			</form>
			{{-- 캐릭터 나이, 성별 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">나이</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
					<label class="col-sm-2 control-label" for="formGroupInputLarge">성별</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
				</div>
			</form>
			{{-- 캐릭터 소유 사물 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-4 control-label" for="formGroupInputLarge">소유 사물</label>
				</div>
				<img src="/img/fea1.jpg" alt="..." class="img-circle img-things-size">
			</form>
		</div>
		<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag" >.col-xs-12 .col-sm-6 .col-md-8</div>

	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
