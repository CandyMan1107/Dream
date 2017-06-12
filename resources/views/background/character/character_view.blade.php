@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content')
		<script type="text/javascript" src="/js/custom/character_event.js"></script>
		<script>character_event( <?=json_encode($data)?> )</script>
		<div class="col-xs-6 col-sm-4 col-md-4 height-max-set" style= "background-color : #e8d6b3" >
			<div class="row">
				@foreach ($data as $character)
					<?php $img_src = "/img/background/characterImg/".$character['img_src']; ?>
					
					<img src="{{$img_src}}" alt="character image" class="img-circle img-things-size character_list" id="{{$character['id']}}" style="margin : 17px">
				@endforeach
			</div>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 height-max-set" >
			<form class="form-horizontal" id="character" name="character" action="{{ route('character.store') }}" method="POST" enctype="multipart/form-data">
			{!! csrf_field() !!}
			{{-- <input type="hidden" name="page" value="{{$datas['page']}}"> --}}
			<input type="hidden" name="page" value="character">
				<h3 id="name">캐릭터 등록</h3>
				{{-- 캐릭터 이름 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">이름</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="character_name" name="character_name" placeholder="캐릭터 이름" value="">
					</div>
				</div>
				{{-- 캐릭터 내용 등록 --}}

				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3" id="character_content" name="character_content"></textarea>
					</div>
				</div>
				{{-- 캐릭터 추가사항 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
					<div class="col-sm-5">
						<input class="form-control" type="text" id="refer_info" name="refer_info" placeholder="추가사항">
					</div>
					<div class="col-sm-2">
						<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:200%"></i>
					</div>
				</div>
				{{-- 이미지 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">이미지 등록</label>
					<div class="col-sm-10">
						
						<input type="file" name="character_img_upload" id="character_img_upload">
					</div>
				</div>
				{{-- 캐릭터 나이, 성별 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">나이</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" id="age" name="age" placeholder="나이">
					</div>
					<label class="col-sm-2 control-label" for="formGroupInputLarge">성별</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" id="gender" name="gender" placeholder="성별">
					</div>
				</div>
				{{-- 캐릭터 소유 사물 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-4 control-label" for="formGroupInputLarge">소유 사물</label>
				</div>
				<img src="/img/fea1.jpg" alt="..." class="img-circle img-things-size">
				
				<button type="submit" class="btn btn-default">등록</button>
			</form >
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
