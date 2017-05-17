@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="row" style="height:25px;"></div>
		<div class="row">
			<div class="col-xs-13 col-sm-10 col-md-10" style="width:10px;"></div>
			<div class="col-xs-13 col-sm-10 col-md-10" style="border :2px solid black; height:72%">
				<div class="row">
					<?php
					for($i = 0; $i < 6 ; $i++ ){
						for($j = 0; $j < 12 ; $j++ ){
							?><div class="col-md-1" style="border : 1px solid rgba(0,0,0,0.25); height:79px">{{$i}},{{$j}}</div> <?php
						}
					} ?>
					
					
				</div>
			</div>
		</div>
		
		
	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
