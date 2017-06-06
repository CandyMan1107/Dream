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
			<script>
					var svgWidth = 160;
					var svgHeight = 240;
					var blockSize = 20;

					var links = <?=json_encode($links)?>;
					console.log(links);
					var color = d3.interpolateHsl("blue", "yellow");
					var maxValue = d3.max(links);

					var heatMap = d3.select("#myGraph")
					.selectAll("rect")
					.data(links)
					heatMap.enter()
					.append("rect")
					.attr("class", "block")
					.attr("x", function(d, i) {
						return (i % 8) * blockSize;
					})
					.attr("y", function(d, i) {
						return Math.floor(i/8) * blockSize;
					})
					.attr("width", function(d, i) {
						return blockSize;
					})
					.attr("height", function(d, i) {
						return blockSize;
					})
					.style("fill", function(d, i) {
						return color(d/maxValue);
					})

					setInterval(function() {
						for(var i=0; i<links.length; i++) {
							var n = ((Math.random() * 3.5) | 0) - 2;
							links[i] = links[i] + n;
							if(links[i] < 0) { links[i] = 0; }
							if(links[i] > maxValue ) { links[i] = maxValue; }
						}
						heatMap.data(links)
						.style("fill", function(d, i){
							return color(d/maxValue)
						})
					}, 1000);
			</script>

			<style>
				svg { width: 160px; height: 240px; border: 1px solid black; }
				.block { stroke: black; fill: none; }
			</style>
			{{-- <script src="{{URL::asset('js/map2.js')}}"></script> --}}
@endsection
