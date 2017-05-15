@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="col-xs-6 col-sm-4 col-md-4 background_set" style= "background-color : #e8d6b3" ></div>
		<div class="col-xs-5 col-sm-5 col-md-5 background_set" >.col-xs-12 .col-sm-6 .col-md-8</div>
		<div class="col-xs-3 col-sm-2 col-md-2 background_set background_tag" >.col-xs-12 .col-sm-6 .col-md-8</div>

	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
