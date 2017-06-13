@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')

@section('content')
	<div class="row" style="height:20px;"></div>
	<div class="row">
	<div class="col-xs-13 col-sm-10 col-md-10" style="width:10px;"></div>
	<div class="col-xs-13 col-sm-10 col-md-10">
		<h1>지도</h1>
		<div>
			<svg id="map" width="900px" height="450px">
				<pattern id="image" x="0" y="0" height="40" width="40">
					<image x="0" y="0" width="40" height="40" xlink:href="http://www.e-pint.com/epint.jpg"></image>
				</pattern>
			</svg>
		</div>
		
		<div id="paint" width="200px" height="350px">
			<table>
				<tr>
					<div id="erase_btn">
						<font size="16">지우기</font>
					</div>
				</tr>
				<tr>
					<td>
						<div id="ex1" class="cell">
						</div>
					</td>

					<td>
						<div id="ex2" class="cell">
						</div>
					</td>

					<td>
						<div id="ex3" class="cell">
						</div>
					</td>

					<td>
						<div id="ex4" class="cell">
						</div>
					</td>

					<td>
						<div id="ex5" class="cell">
						</div>
					</td>
				</tr>
			</table>
		</div>

		<div id="map_img">
		<b>파일 업로드</b>
		@foreach ($data as $map)
			<?php $img_src = "/img/background/mapImg/".$map['img_src']; ?>
			
			<img src="{{$img_src}}" class="img-circle img-things-size map_list" id="{{$map['id']}}" style="margin : 17px">
		@endforeach
		<input type="file" name="map_img_upload" id="map_img_upload">
		
		</div>
			
	</div>
	</div>

	<style type="text/css">
		
		#map {
			/*background-image : url(http://thumbnail.egloos.net/750x0/http://pds21.egloos.com/pds/201701/11/10/f0091810_5875a9df037d5.jpg);*/
			display: inline-block;
			margin-right: 30px;
			float: left;
		}
		
		#paint {
			user-drag: none; 
			user-select: none;
			display: inline-block;
		}

		#ex1 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: black;
		}

		#ex2 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: blue;
		}

		#ex3 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: green;
		}

		#ex4 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: pink;
		}
		
		#ex5 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: yellow;
		}

		.hexagon {
			fill: none;
			pointer-events: all;
		}

		.hexagon path {
			-webkit-transition: fill 250ms linear;
			transition: fill 250ms linear;
		}

		.hexagon :hover {
			fill: pink;
		}

		.hexagon .fill {
			fill: none;
		}

		path.fill.ex1{
			fill: black;
		}

		path.fill.ex2{
			fill: blue;
		}

		path.fill.ex3{
			fill: green;
		}

		path.fill.ex4{
			fill: pink;
		}

		path.fill.ex5{
			fill: yellow;
		}

		.mesh {
			fill: none;
			stroke: #000;
			stroke-opacity: .1;
			pointer-events: none;
		}

		.border {
			fill: none;
			stroke: #000;
			stroke-width: 2px;
			pointer-events: none;
		}

		.custom-menu {
    		z-index:1000;
    		position: absolute;
    		background-color:#C0C0C0;
    		border: 1px solid black;
    		padding: 2px;
			pointer-events: all;
		}
	</style>

	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="http://d3js.org/d3.hexbin.v0.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.js"></script>
	<script src="http://d3js.org/topojson.v1.min.js"></script>
	<script src="{{URL::asset('js/custom/map.js')}}"></script>
@endsection
