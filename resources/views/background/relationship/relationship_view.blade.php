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


			.droppable{
				background-color: blue;
			}


		</style>

		<div class="col-xs-7 col-sm-3 col-md-3 height-max-set" style= "background-color : #e8d6b3" >
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
			<img src={{URL::asset($imgSrc)}} id="chaNode<?=$tasks['chaInfos'][$i]->cha_id?>" class="img-circle img-things-size draggable">
			<?php
				}
			?>

		</div>
		<div id="force-div" class="col-xs-9 col-sm-8 col-md-8 height-max-set" >
			D3로 드롭된 아이콘 관계도 그리기
		</div>
	{{-- 태그 div.row 닫는 태그 --}}
	</div>



	<script>
	$( function() {
		d3.csv("<?php echo url("data/lsrel.csv")?>", function(error, links) {

		var nodes = {};
		var rel = {};

		// 가져온 데이터를 기반으로 데이터 재해석
		// link.id, link.source, link.target, link.relationship
		links.forEach(function(link) {
				link.id = "rel" + link.relnum;

				link.source = nodes[link.source] ||
						(nodes[link.source] = {name: link.source});
				link.target = nodes[link.target] ||
						(nodes[link.target] = {name: link.target});
				link.relationship = link.relationship;
			});

			// svg크기 정의 div크기에서 어느정도 여백
			var width = document.getElementById("force-div").offsetWidth-80;
			var height = document.getElementById("force-div").offsetHeight-80;

			// force 레이아웃 정의
			console.log(nodes);
			console.log(d3.values(nodes));
			var force = d3.layout.force()
					.nodes(d3.values(nodes))
					.links(links)
			 		.size([width, height])
					.linkDistance(350)
					.charge(-800)
					.on("tick", tick)
					.start();

			// 드래그를 시작할 때 함수 적용(노드 고정)
			var drag = force.drag()
									.on("dragstart", dragstart);

			// #for-div 내 svg 생성
			var svg = d3.select("#force-div").append("svg")
					.attr("width", width)
					.attr("height", height)
					.attr("class", "mind-area");

			// 화살표 생성
			svg.append("svg:defs").selectAll("marker")
					.data(["end"])
				  .enter().append("svg:marker")
					.attr("id", String)
					.attr("viewBox", "0 -5 10 10")
					.attr("refX", 38)
					.attr("refY", -1)
					.attr("markerWidth", 8)
					.attr("markerHeight", 8)
					.attr("orient", "auto")
					.append("svg:path")
					.attr("d", "M0,-5L10,0L0,5");

			// 연결선 생성 및 svg 적용, + 연결선마다 화살표 적용
			var path = svg.append("svg:g").selectAll("path")
					.data(force.links())
					.enter()
					.append("svg:path")
					.attr("id", function(d) { return d.id; } )
					.attr("class", "link")
					.attr("marker-end", "url(#end)");

			// node, link 조작을 위한 변수
			var nodeObjs = force.nodes(),
		  		linkObjs = force.links(),
		  		nodeObj  = svg.selectAll(".node"),
		  		linkObj  = svg.selectAll(".link");

			// relationship 데이터를 text로 생성
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

			// 노드 정의
			var node = svg.selectAll(".node")
					.data(force.nodes())
					.enter().append("g")
					.attr("class", "node")
					.call(force.drag); // 드래그 시작할 경우 이벤트 정의


			// 노드의 이미지 패턴 정의
			var defs = svg.append("defs").attr("id", "imgdefs");
			var catpattern = defs.append("pattern")
		                        .attr("id", "catpattern")
		                        .attr("height", 1)
		                        .attr("width", 1)
		                        .attr("x", "0")
		                        .attr("y", "0");
			catpattern.append("image")
		     .attr("height", 70)
		     .attr("width", 70)
		     .attr("xlink:href", "{{URL::to('/')}}/img/background/characterImg/Bak.png")

			// 노드에 원형 추가
			node.append("circle")
					.attr("r", 34)
					.attr("fill", "url(#catpattern)");

			// 노드에 텍스트 추가 (name 데이터)
			node.append("text")
				 .attr("text-anchor", "middle")
					.attr("style", "fill:blue; font-weight:bold; font-size:16")
					.text(function(d) { return d.name; });



			// 연결선 커브 및 크기변경 + 노드 위치이동
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

			// 드래그 시작 시, 노드를 고정
			function dragstart(d){
				 d3.select(this).classed("fixed", d.fixed = true);
			} if (error){
				 console.log(error);
			}
			else{
				 console.log(nodes);
				 console.log(links);
				 console.log(path);
				 console.log(rel);
			}

			// 드래그 판단 변수
			var draggedObj = null;	// drag된 오브젝트의 값
			var onDroppable = null;	// svg위에 마우스가 위치하는가 true/false
			// 오브젝트가 드래그 되었고, svg위에 마우스가 위치하는가
			function isObjOnDroppable(){
				if (onDroppable && draggedObj!=null) return true;
				else return false;
			}

			// svg위에 마우스 올렸는지 체크
			svg.on('mouseover',function(d,i){
				onDroppable = true;
			});

			// svg위에 마우스 없는지 체크
			svg.on('mouseout',function(e){
				onDroppable = false;
			});

			// 드래그 객체의 드래그 행위 정의
			$( ".draggable" ).draggable({
			 revert: true,
			 revertDuration: 500,
			 cursorAt: { left: -2, top: -2 },

			 // 드래그 시작 시 draggedObj에 값 적용
			 start: function (e) {
				 // draggable의 데이터 입력
				 draggedObj = d3.select(e.target).attr("src");
			 },
			 // svg위에 드랍 시 오브젝트는 바로 돌아옴
			 drag: function (e) {
				 // stop까지의 속도
				 $(e.target).draggable("option","revertDuration", isObjOnDroppable() ? 0 : 500)
			 },
			 // drag가 끝난 후 판단
			 stop: function (e,ui) {
				 if(isObjOnDroppable()){
					 chaId = $(e.target).attr("id").replace("chaNode","");
					 alert("id : " + chaId + " position : " + "(" + e.pageX +"," + e.pageY + ")");
					 var point = d3.mouse(this);
					 addNewNode(point[0],point[1]);
				 }
					draggedObj = null;

			 }
			});

			function addNewNode(x,y){
				x -= 380;
				y -= 75;
				nodeObjs.push();// ********************************************** 데이터를 추가할 것
				nodeObj = nodeObj.data(nodeObjs);

				nodeObj.enter().append("g")
							 .attr("class", "node")
							 .attr("transform","translate(" + x + "," + y + ")")
							 .call(force.drag);

		 	 // add the nodes
			 nodeObj.append("circle")
									 .attr("r", 34)
									 .attr("fill", "url(#catpattern)");

			 // add the text
			 nodeObj.append("text")
									.attr("text-anchor", "middle")
									 .attr("style", "fill:blue; font-weight:bold; font-size:16")
									 .text(function(d) { return d.name; });
			 }


		});
	});

	</script>
@endsection
