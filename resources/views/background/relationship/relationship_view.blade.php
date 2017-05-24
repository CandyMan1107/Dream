@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content')
		<style>
			path.link {
			  fill: none;
			  stroke: #666;
			  stroke-width: 1.5px;
			}

			circle {
			  stroke: #fff;
			  stroke-width: 1.5px;
			}

			text {
			  fill: #000;
			  font: 10px sans-serif;
			  pointer-events: none;
			}
		</style>
		<div class="col-xs-7 col-sm-3 col-md-3 height-max-set droppable" style= "background-color : #e8d6b3" >
			이미지 아이콘을 React로 드래그 앤 드롭 구현
			<img src="/img/amanda.jpg" alt="..." class="img-circle img-things-size">
			<br>
			<br>
			<img src="/img/dakota.jpg" alt="..." class="img-circle img-things-size">

			<?php
				// 데이터베이스에 있는 모든 캐릭터 이미지 호출
				for($i=0; $i<=2; $i++){
					$imgSrc = $tasks["imgRoot"].$tasks['chaInfos'][$i]->img_src;
			?>
			<img src={{URL::asset($imgSrc)}} class="img-circle img-things-size draggable">
			<?php
				}
			?>
			<img src="{{URL::to('/')}}/<?php echo 'img/background/characterImg/Bak.png'; ?>">

		</div>
		<div id="force-div" class="col-xs-9 col-sm-8 col-md-8 height-max-set droppable" >
			D3로 드롭된 아이콘 관계도 그리기
		</div>
	{{-- 태그 div.row 닫는 태그 --}}
	</div>

	<!--<script src="https://d3js.org/d3.v4.min.js"></script>-->
	<link rel="stylesheet" href="{{URL::asset('js/jquery-ui.min.css')}}">
	<script src="{{URL::asset('js/d3.v3.js')}}"></script>
	<script src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('js/jquery-ui.min.js')}}"></script>
	<script src="{{URL::asset('js/custom/relation.js')}}"></script>
	<script>
	d3.csv("<?php echo url("data/lsrel.csv")?>", function(error, links) {

	var nodes = {};
	var rel = {};

	links.forEach(function(link) {
			link.id = "rel" + link.relnum;
			// link.relnum = link.relnum;
		 var sLinkSrc = link.source;
		 var sLinkTgt = link.target;
			link.source = nodes[link.source] ||
					(nodes[link.source] = {name: link.source, relcnt: 0, srccnt: 0, tgtcnt: 0});
			link.target = nodes[link.target] ||
					(nodes[link.target] = {name: link.target, relcnt: 0, srccnt: 0, tgtcnt: 0});
			link.relationship = link.relationship;

		 if (nodes[sLinkSrc])
		 {
					 nodes[sLinkSrc]["relcnt"] = nodes[sLinkSrc]["relcnt"]+1;
					 nodes[sLinkSrc]["srccnt"] = nodes[sLinkSrc]["srccnt"]+1;
		 }

		 if (nodes[sLinkTgt])
		 {
					 nodes[sLinkTgt]["relcnt"] = nodes[sLinkTgt]["relcnt"]+1;
					 nodes[sLinkTgt]["tgtcnt"] = nodes[sLinkTgt]["tgtcnt"]+1;
		 }

		 // console.log(JSON.stringify(nodes));
		 // console.log("NODEPROP: " + nodes[sLinkSrc].name);

	});

	var width = document.getElementById("force-div").offsetWidth-80;
	var height = document.getElementById("force-div").offsetHeight-80;

	console.log("Width: " + width);
	console.log("Height: " + height);

	var force = d3.layout.force()
			.nodes(d3.values(nodes))
			.links(links)
			.size([width, height])
			.linkDistance(350)
			.charge(-800)
			.on("tick", tick)
			.start();

	var drag = force.drag()
							.on("dragstart", dragstart);

	var svg = d3.select("#force-div").append("svg")
			.attr("width", width)
			.attr("height", height);

	// build the arrow.
	svg.append("svg:defs").selectAll("marker")
			.data(["end"])
		.enter().append("svg:marker")
			.attr("id", String)
			.attr("viewBox", "0 -5 10 10")
			.attr("refX", 22)
			.attr("refY", -1)
			.attr("markerWidth", 8)
			.attr("markerHeight", 8)
			.attr("orient", "auto")
		.append("svg:path")
			.attr("d", "M0,-5L10,0L0,5");

	// add the links and the arrows
	var path = svg.append("svg:g").selectAll("path")
			.data(force.links())
		.enter()
	.append("svg:path")
		 .attr("id", function(d) { return d.id; } )
			.attr("class", "link")
			.attr("marker-end", "url(#end)");

	var mytext = svg.append("svg:g").selectAll("text")
	.data(force.links())
	.enter()
	.append("text")
	.attr("dx", "150")
	.attr("dy", "-8")
	 .append("textPath")
	 .attr("xlink:href", function(d) { return "#" + d.id; })
	 .attr("style", "fill:magenta; font-weight:bold; font-size:12")
	 .text(function(d) { return d.relationship; } );

	// define the nodes
	var node = svg.selectAll(".node")
			.data(force.nodes())
		.enter().append("g")
			.attr("class", "node")
			.call(force.drag);


	// define image
	svg.append("defs")
   .append("pattern")
   .attr("id", "bg")
   .append("image")
   .attr("xlink:href", "{{URL::to('/')}}/<?php echo 'img/background/characterImg/Bak.png'; ?>");

	// add the nodes
	node.append("circle")
			.attr("r", 30)
   		.attr("fill", "url(#bg)");

	// add the text
	node.append("text")
			.attr("x", 12)
			.attr("dy", ".35em")
			.attr("style", "fill:blue; font-weight:bold; font-size:16")
			.text(function(d) { return d.name; });

	node.append("text")
		 .attr("text-anchor", "middle")
			// .attr("style", "font-weight:bold; font-size:12")
			.attr("style", function(d) {
				if (d.relcnt >= 3)
				{
					 return "font-weight:bold; font-size:12; fill:red"
				}
				else
				{
					 return "font-weight:bold; font-size:12"
				}
		 })
		 .text(function(d) { return d.relcnt; });

	// add the curvy lines
	function tick() {
			path.attr("d", function(d) {
					var dx = d.target.x - d.source.x,
							dy = d.target.y - d.source.y,
							dr = Math.sqrt(dx * dx + dy * dy);
					return "M" +
							d.source.x + "," +
							d.source.y + "A" +
							dr + "," + dr + " 0 0,1 " +
							d.target.x + "," +
							d.target.y;
			});

			node.attr("transform", function(d) {
							 return "translate(" + d.x + "," + d.y + ")"; });
	}

	function dragstart(d)
	{
		 d3.select(this).classed("fixed", d.fixed = true);
	}
	if (error)
	{
		 console.log(error);
	}
	else
	{
		 console.log(nodes);
		 console.log(links);
		 console.log(path);
		 console.log(rel);
	}
	});

	</script>
@endsection
