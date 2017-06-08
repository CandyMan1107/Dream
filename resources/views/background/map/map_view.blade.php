@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')

@section('content')
	<div class="row" style="height:20px;"></div>
	<div class="row">
		<div class="col-xs-13 col-sm-10 col-md-10" style="width:10px;"></div>
		<div class="col-xs-13 col-sm-10 col-md-10">
			<h1>지이도</h1>
			<div id="map"></div>
			<div id="paint"></div>
		</div>
	</div>

	<style type="text/css">

		#map{
			display: inline-block;
			margin-right: 30px;
		}
		
		#paint {
			border: 1px;
			border-style: solid;
			width: 250px;
			height: 400px;
			background-color: #fff;
			display: inline-block;
			margin-bottom: 60px;
		}

		.hexagon {
			fill: white;
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
			fill: red;
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

	</style>

	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="http://d3js.org/d3.hexbin.v0.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.js"></script>
	<script src="http://d3js.org/topojson.v1.min.js"></script>

	<!--<script>
		var margin = {
			top: 50,
			right: 20,
			bottom: 20,
			left: 20
		};

		var width = 890;
		var height = 350;

		var MapColumns = 44,
			MapRows = 22;

		var hexRadius = d3.min([width/((MapColumns + 0.5) * Math.sqrt(3)), 
			height/((MapRows + 1/3) * 1.5)]);

		var hexbin = d3.hexbin()
					 .radius(hexRadius);

		var points = [];
		for (var i = 0; i < MapRows; i++) {
			for(var j=0; j<MapColumns; j++) {
				points.push([hexRadius * j * 1.75, hexRadius * i * 1.5]);
			}
		}

		var svg = d3.select("#chart").append("svg")
			.attr("width", width + margin.left + margin.right)
			.attr("height", height + margin.top + margin.bottom)
			.append("g")
			.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
		
		svg.append("g")
			.selectAll(".hexagon")
			.data(hexbin(points))
			.enter().append("path")
			.attr("class", "hexagon")
			.attr("d", function (d) {
				return "M" + d.x + "," + d.y + hexbin.hexagon();
			})
			.attr("stroke", "black")
			.attr("stroke-width", "1px")
			.style("fill", "none");
	</script>-->
<script>
		var width = 960,
    height = 500,
    radius = 20;

		var topology = hexTopology(radius, width, height);

		var projection = hexProjection(radius);

		var path = d3.geo.path()
				.projection(projection);

		var svg = d3.select("#map").append("svg")
				.attr("width", width)
				.attr("height", height);

		svg.append("g")
				.attr("class", "hexagon")
			.selectAll("path")
				.data(topology.objects.hexagons.geometries)
			.enter().append("path")
				.attr("d", function(d) { return path(topojson.feature(topology, d)); })
				.attr("class", function(d) { return d.fill ? "fill" : null; })
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
				d3.select(this).classed("fill", d.fill = mousing > 0);
				border.call(redraw);
			}
		}

		function mouseup() {
			mousemove.apply(this, arguments);
			mousing = 0;
		}

		function redraw(border) {
			border.attr("d", path(topojson.mesh(topology, topology.objects.hexagons, function(a, b) { return a.fill ^ b.fill; })));
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
</script>
@endsection
