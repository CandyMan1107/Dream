@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="col-xs-7 col-sm-3 col-md-3 height-max-set" style= "background-color : #e8d6b3" >
			이미지 아이콘을 React로 드래그 앤 드롭 구현
			<img src="/img/amanda.jpg" alt="..." class="img-circle img-things-size">
			<br>
			<br>
			<img src="/img/dakota.jpg" alt="..." class="img-circle img-things-size">
		</div>
		<div class="col-xs-9 col-sm-8 col-md-8 height-max-set" >
			D3로 드롭된 아이콘 관계도 그리기
		</div>
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
