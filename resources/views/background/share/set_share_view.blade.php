@extends('layouts.master')

@section('content') 
		@include('partials.mySubNavi')
		@include('background.tag')
		<script type="text/javascript" src="/js/custom/share_click.js"></script>
		{{-- 설정 정보 호출 div   --}}
		<div class="col-xs-6 col-sm-4 col-md-4 height-max-set" style= "background-color : #e8d6b3; height:120vh" >
			<div>
				<i class="fa fa-clock-o share_icon" aria-hidden="true" id="timetables" style="font-size : 55px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-user share_icon" aria-hidden="true" id="characters" style="font-size : 60px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-shopping-cart share_icon" aria-hidden="true" id="items" style="font-size : 55px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-users share_icon" aria-hidden="true" id="relations" style="font-size : 50px"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-map share_icon" aria-hidden="true" id="maps" style="font-size : 50px"></i>
			</div>
		</div>
		<div class="col-xs-8 col-sm-7 col-md-7 height-max-set" >.col-xs-12 .col-sm-6 .col-md-8</div>
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
