<div id="force-div" class="col-xs-9 col-sm-8 col-md-8 height-max-set force-box" >
</div>
<script>
	$(function() {
			var nodes = {};
			var rel = {};
			var chaInfos = <?php echo json_encode($tasks["chaInfos"]) ?>;
			var links = <?php echo json_encode($tasks["relInfos"])?>;
            //console.log(chaInfos);
			// 가져온 데이터를 기반으로 데이터 재해석
			// link.id, link.source, link.target, link.relationship
			links.forEach(function(link) {
				link.id = "rel" + link.relnum;

				link.source = nodes[link.source] ||
						(nodes[link.source] = {chaId: link.source});
				link.target = nodes[link.target] ||
						(nodes[link.target] = {chaId: link.target});
				link.relationship = link.relationship;
			});

			// svg크기 정의 div크기에서 어느정도 여백
			var width = document.getElementById("force-div").offsetWidth-80;
			var height = document.getElementById("force-div").offsetHeight-80;


			//********************************************************************//
			// 											force 레이아웃 정의
			//********************************************************************//
			var force = d3.layout.force()
					.nodes(d3.values(nodes))
					.links(links)
			 		.size([400, 400])
					.linkDistance(350)
					.charge(-800)
					.on("tick", tick);

			// 드래그를 시작할 때 함수 적용(노드 고정)
			var drag = force.drag().on("dragstart", dragstart);

			// #for-div 내 svg 생성
			var svg = d3.select("#force-div").append("svg")
					.attr("width", width)
					.attr("height", height)
					.attr("class", "mind-area")
					.on("dragend", function(){alert("fu!!")});

			// 노드의 이미지 패턴 정의
			var defs = svg.append("defs").attr("id", "imgdefs");
			chaInfos.forEach(function(chainfo){
				var catpattern = defs.append("pattern")
															.attr("id", "pattern" + chainfo.cha_id)
															.attr("height", 1)
															.attr("width", 1)
															.attr("x", "0")
															.attr("y", "0");
				catpattern.append("image")
					 .attr("height", 70)
					 .attr("width", 70)
					 .attr("xlink:href", "{{URL::to('/')}}/img/background/characterImg/" + chainfo.img_src);
			});


			//********************************************************************//
			// 											노드, 링크 요소 추가
			//********************************************************************//
			// 화살표 생성
			var marker = svg.append("svg:defs").selectAll("marker");
			marker = marker.data(["end"])
			marker.exit().remove();
			marker.enter().append("svg:marker")
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
			var path = svg.append("svg:g").selectAll("path");


			// relationship 데이터를 text로 생성
			var relTextArea = svg.append("svg:g");
			var mytext = relTextArea.selectAll("text");

			// 노드 정의
			var node = svg.selectAll(".node");

			restart();
            


			// 연결선 커브 및 크기변경 + 노드 위치이동
			var tf = true;
           
			function tick() {
					path.attr("d", function(d) {
							var dx = d.target.x - d.source.x,
									dy = d.target.y - d.source.y,
									dr = Math.sqrt(dx * dx + dy * dy);

							var tickfunc = "M" +
									d.source.x + "," +
									d.source.y + "A" +
									dr + "," + dr + " 0 0,1 " +
									d.target.x + "," +
									d.target.y;

							// if(tf == true){
							// 	alert(tickfunc);
							// 	tf = false;
							// }

							return tickfunc;
					});


					node.attr("transform", function(d) {
									 return "translate(" + d.x + "," + d.y + ")"; });
			}

			// 드래그 시작 시, 노드를 고정
			function dragstart(d){
				 d3.select(this).classed("fixed", d.fixed = true);
				//  console.log("nodes↓");
				//  console.log(nodes);
				//  console.log("links↓");
				//  console.log(links);
				//  console.log("path↓");
				//  console.log(path);
				//  console.log("nodes↓");
				//  console.log(rel);
			}

			function restart(){
                // alert("asd");
				force.nodes(d3.values(nodes));
				force.links(links);

				// 연결선 생성 및 svg 적용, + 연결선마다 화살표 적용
				path = path.data(links)
				path.remove();
				path = path.enter().append("svg:path")
						.attr("id", function(d) { return d.id; } )
						.attr("class", "link")
						.attr("marker-end", "url(#end)");

				mytext = mytext.data(links)
				mytext.remove();
				mytext = mytext.enter().append("text")
				.attr("dx", "150")
				.attr("dy", "-8")
				.attr("id", function(d) { return  "text" + d.id; })
				.append("textPath")
				.attr("xlink:href", function(d) { return "#" + d.id; })
				.attr("style", "fill:magenta; font-weight:bold; font-size:12")
				.text(function(d) { return d.relationship; } );

				var relText = relTextArea.selectAll("text");

				// 노드 정의
				node = node.data(d3.values(nodes));
				node.remove();
				node = node.enter().append("g")
				.attr("class", "node")
				.attr("xlink:href", function(d) { return d.chaId; })
				.call(force.drag);


				// 노드에 원형 추가
				node.append("circle")
						.attr("r", 35)
						.attr("fill", function(d) { return "url(#pattern" + d.chaId +")"; });

				// 노드에 텍스트 추가 (name 데이터)
				node.append("text")
					 .attr("text-anchor", "middle")
					 .attr("dy","25")
						.attr("style", "fill:blue; font-weight:bold; font-size:16")
						.text(function(d) { return getChaInfoById(d.chaId).name; });


				// force 재시작
				force.start();
			}

            // ID값으로 캐릭터의 정보를 가져옴
			function getChaInfoById(id){
				var chaInfos = <?php echo json_encode($tasks["chaInfos"]) ?>;
				var chaInfo = null;
				chaInfos.some(function(info){
					if(info.cha_id == id){
						chaInfo = info;
						return;
					}
				});
				return chaInfo;
			}
			

	});

	</script>