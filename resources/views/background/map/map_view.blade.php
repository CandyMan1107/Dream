@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')

@section('content')
	<div class="row" style="height:20px;"></div>
	<div class="row">
		<div class="col-xs-13 col-sm-10 col-md-10" style="width:10px;"></div>
		<div class="col-xs-13 col-sm-10 col-md-10">
			<h1>지이도</h1>
			<svg id="map" width="900px" height="450px"></svg>
			<svg id="paint" width="250px" height="400px"></svg>
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

		var svg_g = svg.append("g")
				.attr("class", "hexagon");

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
				d3.select(this).classed("fill", d.fill = mousing > 0);
				//var fill_id = d3.select(this).attr("data-yongsin");
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

		$("#map").bind("contextmenu", function(event) { 
    		event.preventDefault();
    	
		$("div.custom-menu").hide();

		$("<div class='custom-menu'>Erase</div>")
			.bind("click",function(){
				// $(".hexagon").removeClass("fill");
				paths.classed("fill", false);
			})
	        .appendTo("body")
        	.css({top: event.pageY + "px", left: event.pageX + "px"});
		}).bind("click", function(event) {
			$("div.custom-menu").hide();
		});
</script>

<script>
	var SWATCH_D, active_color, active_line, canvas, drag, drawing_data, lines_layer, palette, redraw, render_line, swatches, trash_btn, ui;

	palette = ui.append('g').attr({
    	transform: "translate(" + (4 + SWATCH_D / 2) + "," + (4 + SWATCH_D / 2) + ")"
  	});

	swatches = palette.selectAll('swatch').data(["#333333", "#ffffff", "#1b9e77", "#d95f02", "#7570b3", "#e7298a", "#66a61e", "#e6ab02", "#a6761d", "#666666"]);

	trash_btn = ui.append('text').html('&#xf1f8;').attr({
    "class": 'btn',
    dy: '0.35em',
    transform: 'translate(940,20)'
  }).on('click', function() {
    drawing_data.lines = [];
    return redraw();
  });

  swatches.enter().append('circle').attr({
    "class": 'swatch',
    cx: function(d, i) {
      return i * (SWATCH_D + 4) / 2;
    },
    cy: function(d, i) {
      if (i % 2) {
        return SWATCH_D;
      } else {
        return 0;
      }
    },
    r: SWATCH_D / 2,
    fill: function(d) {
      return d;
    }
  }).on('click', function(d) {
    active_color = d;
    swatches.classed('active', false);
    return d3.select(this).classed('active', true);
  });

   swatches.each(function(d) {
    if (d === active_color) {
      return d3.select(this).classed('active', true);
    }
  });
</script>
@endsection
