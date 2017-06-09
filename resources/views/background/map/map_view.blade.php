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
			/*stroke: #000;*/
			/*stroke-width: 2px;*/
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

<script>	// 직접 만든거
	//오른쪽 팔레트 부분 기능
	$(function() {
		// $('#erase_btn').bind('click', erase_map);
		$('#erase_btn').bind('click', refresh);
		$('.cell').bind('click', ex);
	});

	function refresh() {
		location.reload();
	}

	function erase_map() {	// fill 삭제
		//paths.classed("fill", false);
		paths.attr("class",null);
		// $(".cell").forEach(function(cell){
		// 	paths.classed(cell.attr("id"), false);
		// });
	}

	function ex() {		// 색상 변경
		// alert($(this).attr("id"));
		$(".cell").removeClass("selected_cell");
		$(this).addClass("selected_cell");
	}
</script>

<script>
		var width = 960,
   			height = 450,
    		radius = 20;

		var topology = hexTopology(radius, width, height);

		var projection = hexProjection(radius);

		var path = d3.geo.path()
				.projection(projection);

		var svg = d3.select("#map").append("svg")
				.attr("width", width)
				.attr("height", height);

		var defs = svg.append("defs").attr("id", "imgdefs");
        var catpattern = defs.append("pattern")
                        .attr("id", "hosPattern")
                        .attr("height", 1)
                        .attr("width", 1)
                        .attr("x", "0")
                    	.attr("y", "-25");

        catpattern.append("image")
				  .attr("height", 50)
            	  .attr("width", 50)
         	      .attr("xlink:href", "http://thumbnail.egloos.net/750x0/http://pds21.egloos.com/pds/201701/11/10/f0091810_5875a9df037d5.jpg");

		var svg_g = svg.append("g")
				.attr("class", "hexagon");
		

		var path_fill = svg.select("path.fill");

		var paths =	svg_g.selectAll("path")
				.data(topology.objects.hexagons.geometries)
			.enter().append("path")
				.attr("d", function(d) { return path(topojson.feature(topology, d)); })
				.attr("class", function(d) { return d.fill ? "fill" : null; })
				
				// .attr("data-yongsin","good")

				.on("mousedown", mousedown)
				.on("mousemove", mousemove)
				.on("mouseup", mouseup);

		svg.append("path")
				.datum(topojson.mesh(topology, topology.objects.hexagons))
				.attr("class", "mesh")
				.attr("d", path);

		var border = svg.append("path")
				.attr("class", "border")
				.call(redraw);

		var mousing = 0;


		function mousedown(d) {
			mousing = d.fill ? -1 : +1;
			mousemove.apply(this, arguments);
		}

		function mousemove(d) {
			if (mousing) {
				d3.select(this).attr("class",null);
				//d3.select(this).classed("fill", d.fill = mousing > 0);
				d3.select(this).classed($(".selected_cell").attr("id"), d.fill);
				d3.select(this).attr("fill", "url(#hosPattern)");
				border.call(redraw);
			}
		}

		function mouseup() {
			mousemove.apply(this, arguments);
			mousing = 0;
		}

		function redraw(border) {
			border.attr("d", path(topojson.mesh(topology, topology.objects.hexagons,
			 function(a, b) { return a.fill ^ b.fill; })));
			 // 이미지 패턴 생성 후 적용 
		}

		function hexTopology(radius, width, height) {
			var dx = radius * 2 * Math.sin(Math.PI / 3),
					dy = radius * 1.5,
					m = Math.ceil((height + radius) / dy) + 1,
					n = Math.ceil(width / dx) + 1,
					geometries = [],
					arcs = [];

			for (var j = -1; j <= m; ++j) {
				for (var i = -1; i <= n; ++i) {
					var y = j * 2, x = (i + (j & 1) / 2) * 2;
					arcs.push([[x, y - 1], [1, 1]], [[x + 1, y], [0, 1]], [[x + 1, y + 1], [-1, 1]]);
				}
			}

			for (var j = 0, q = 3; j < m; ++j, q += 6) {
				for (var i = 0; i < n; ++i, q += 3) {
					geometries.push({
						type: "Polygon",
						arcs: [[q, q + 1, q + 2, ~(q + (n + 2 - (j & 1)) * 3), ~(q - 2), ~(q - (n + 2 + (j & 1)) * 3 + 2)]],
					});
				}
			}

			return {
				transform: {translate: [0, 0], scale: [1, 1]},
				objects: {hexagons: {type: "GeometryCollection", geometries: geometries}},
				arcs: arcs
			};
		}

		// 육각형 크기 계산식
		function hexProjection(radius) {
			var dx = radius * 2 * Math.sin(Math.PI / 3),
					dy = radius * 1.5;
			return {
				stream: function(stream) {
					return {
						point: function(x, y) { stream.point(x * dx / 2, (y - (2 - (y & 1)) / 3) * dy / 2); },
						lineStart: function() { stream.lineStart(); },
						lineEnd: function() { stream.lineEnd(); },
						polygonStart: function() { stream.polygonStart(); },
						polygonEnd: function() { stream.polygonEnd(); }
					};
				}
			};
		}

		/* map에서 오른쪽 버튼 메뉴 변경 */

		// $("#map").bind("contextmenu", function(event) { 
    	// 	event.preventDefault();
    	
		// $("div.custom-menu").hide();

		// $("<div class='custom-menu'>지우기</div>")
		// 	.bind("click",function(){
		// 		paths.attr("class",null);
		// 		$("div.custom-menu").hide();
		// 	})
	    //     .appendTo("body")
        // 	.css({top: event.pageY + "px", left: event.pageX + "px"});
		// }).bind("click", function(event) {
		// 	$("div.custom-menu").hide();
		// });

		/* 변경 끝 */
</script>
@endsection
