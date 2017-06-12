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
                        .attr("height", 100)
                        .attr("width", 100)
                        .attr("x", "0")
                    	.attr("y", "0");

        catpattern.append("image")
				  .attr("height", 40)
            	  .attr("width", 78)
				  .attr("x", "0")
                  .attr("y", "0")
         	      .attr("xlink:href", "data:image/jpeg;base64,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");

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
				d3.select(this).classed("fill", d.fill = mousing > 0);
				d3.select(this).classed($(".selected_cell").attr("id"), d.fill);
				// d3.select(this).attr("fill", "url(#hosPattern)");	// 이미지 드래그
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
