@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')

@section('content')
			<div class="row" style="height:25px;"></div>
			<div class="row">
				<div class="col-xs-13 col-sm-10 col-md-10" style="width:10px;"></div>
				<div class="col-xs-13 col-sm-10 col-md-10" style="border :2px solid black; height:72%">
					<h1>지도</h1>
					<svg id="myGraph"></svg>
				</div>
			</div>
			
			<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
			<style>
			svg { width: 160px; height: 240px; border: 1px solid black; }
			.block { stroke: black; fill: none; }
			</style>
			<svg id="myGraph"></svg>
			<script src="{{URL::asset('js/map2.js')}}"></script>
@endsection