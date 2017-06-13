@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<script type="text/javascript" src="/js/custom/item_event.js"></script>
		<script>item_event( <?=json_encode($data)?> )</script>
		<div class="col-xs-6 col-sm-4 col-md-4 height-max-set" style= "background-image:url('/img/cork.jpg')" >
			<div class="row">
				@foreach ($data as $item)
					<?php $img_src = "/img/background/itemImg/".$item['img_src']; ?>
					
					<img src="{{$img_src}}" alt="item image" class="img-circle img-things-size item_list event_list" id="{{$item['id']}}" style="margin : 17px">
				@endforeach
			</div>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 height-max-set" >
			<h3 id="name">사물 등록</h3>
			<form class="form-horizontal" id="item" name="item" action="{{ route('things.store') }}" method="POST" enctype="multipart/form-data">
			{!! csrf_field() !!}
			{{-- 사물 이름 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">이름</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="item_name" name="item_name" placeholder="Large input">
					</div>
				</div>
				{{-- 사물 내용 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3" id="item_content" name="item_content"></textarea>
					</div>
				</div>
				{{-- 사물 분류 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">분류</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="item_cate" name="item_cate" placeholder="Large input">
					</div>
				</div>
				{{-- 사물 추가사항 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" id="item_refer_info" name="item_refer_info" placeholder="Small input">
					</div>
					<div class="col-sm-2">
						<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:200%"></i>
					</div>
				</div>
				{{-- 이미지 등록 --}}
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">이미지 등록</label>
					<div class="col-sm-10">
						<input type="file" id="item_img_upload" name="item_img_upload" >
					</div>
				</div>
				<button type="submit" class="btn btn-default">등록</button>
			</form>
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
				{{-- $page에 태그 값이 참조할 테이블의 이름을 넣어준다. --}}
						<?php 
						$page = "items";
						use App\Http\Controllers\TagsAddController;
						echo TagsAddController::view_return($page,$data);
						?>
			</div>
		</div>
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
