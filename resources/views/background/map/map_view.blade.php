@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')

@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
		<!--<div class='custom-menu'>지우기</div>-->
			<table>
				<tr>
					<div id="erase_btn">
						<font size="16">새로고침</font>
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
				<div><input id="picker" type="color"></div>
			</table>
		</div>
		

		<!-- DB 내 이미지 띄우는 영역 -->
		<div>
			<br><b>업로드된 이미지</b><br>
			<br>
			
				@foreach($data as $d)
					<div style="float:left">
						<img id="img_cell" src=" {{ url(asset($d['img_src'])) }}" size="2%">
					</div>
				@endforeach
			<br><br>
		</div>

		<div>
			<p>
			<br><br>
			<form enctype="multipart/form-data" id="upload_form" role="form" method="get" action="">
				<label class="img_upload_label">이미지 업로드
				<input class="img_upload_btn" id="imgFile" name="imgFile" type='file'>
				</label>
			</form>
			</p>
		</div>
			
		<div class="row">
		<div id="MaplistShowbtn">맵 목록</div>
		{{-- @foreach($data as $d)
			<div id="map_list">
				{{ $d['id'] }}
			</div>
		@endforeach --}}
		</div>

		<script>
		$('#colorSelector').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
					return false;
				},
				
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
			}
		});
	</script>

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
			background-color: #002E40;
		}

		#ex2 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: #2A5769;
		}

		#ex3 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			/*background-color: #FFFFFF;*/
			background-color: green;
		}

		#ex4 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: #FABD4A;
		}
		
		#ex5 {
			width: 30px;
			height: 30px;
			pointer-events: all;
			background-color: #FA9600;
		}


		#img_cell {
    		width: 50px;
    		height: auto;
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

		/*path.fill.ex1{
			fill: #002E40;
		}

		path.fill.ex2{
			fill: #2A5769;
		}

		path.fill.ex3{
			fill: green;
		}

		path.fill.ex4{
			fill: #FABD4A;
		}

		path.fill.ex5{
			fill: #FA9600;
		}*/

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

	<script>

	$(function() {
        // 직접 만든거
		$("div.custom-menu").hide();

        // 클릭 이벤트 모아놓은 곳
        $(function() {
            // $('#erase_btn').bind('click', erase_map);
            $('#erase_btn').bind('click', refresh);
            $('.cell').bind('click', map_color_change);
			$('#img_cell').bind('click', map_img_fill);
			$('#MaplistShowbtn').bind('click', MaplistShowbtn);
        });

        function refresh() {
            location.reload();
        }

		function map_img_fill() {
			$(this).addClass("selected_cell");
			alert($(this).attr("id"));
		}

        function erase_map() {	// fill 삭제
            //paths.classed("fill", false);
            paths.attr("class",null);
            // $(".cell").forEach(function(cell){
            // 	paths.classed(cell.attr("id"), false);
            // });
        }

		// 색상 변경
        function map_color_change() {		
            alert($(this).attr("{{$d['id']}}"));
            $(".cell").removeClass("selected_cell");
            $(this).addClass("selected_cell");
        }

		function MaplistShowbtn() {
			alert("눌렷다");
			// $('#map_list').show();
		}


     	// 	$("#uploadbutton").click(function(){
        //  		var form = $('form')[0];
        //  		var formData = new FormData(form);
        //      		$.ajax({
        //         		url: 'img/background/mapImg',
        //         		processData: false,
        //             	contentType: false,
        //         		data: formData,
        //         		type: 'POST',
        //         		success: function(result){
        //             		alert("업로드 성공!!");
        //         		}
        //     		});
        //  	});
		// });


		// 이미지 업로드 이벤트
		$("#imgFile").change(function () {
			// 파일이 있을경우
			if (this.files && this.files[0]) {
				// ajax로 DB추가
				var input = $("#imgFile");
				console.log(new FormData($("#imgFile")[0]));

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				
				$.ajax({
					url: "addMapImg",
					type: "post",
					data: new FormData($("#upload_form")[0]),
					processData: false,
              		contentType: false,
					success: function(data) {
						alert("업로드 성공");
						location.reload();
						$.ajax({
                        	type: "get",
                        	url: "removeCover",
                        	data: {
                          		"id" : '1'
                        	},
                        	success: function (data) {
            			  		console.log(data);
                        	},
                        	error: function (error) {
                          		alert("오류발생");
                        	}
                    	});
					}
				});
			}
		});

		/* map에서 오른쪽 버튼 메뉴 변경 */
		$("#map").bind("contextmenu", function(event) { 
    		event.preventDefault();
    	
		$("div.custom-menu").hide();

		$("<div class='custom-menu'>지우기</div>")
			.bind("click",function(){
				paths.attr("class",null);
				$("div.custom-menu").hide();
			})
	        .appendTo("body")
        	.css({top: event.pageY + "px", left: event.pageX + "px"});
		}).bind("click", function(event) {
			$("div.custom-menu").hide();
		});
		/* 변경 끝 */

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
				//   .attr("height", 40)
            	//   .attr("width", 78)
				  .attr("height", 100)
            	  .attr("width", 100)
				  .attr("x", "0")
                  .attr("y", "0")
         	      .attr("xlink:href", "{{ url(asset($d['img_src'])) }}");	// DB 이미지 주소 가져옴

		var svg_g = svg.append("g")
				.attr("class", "hexagon");
		

		var path_fill = svg.select("path.fill");

		var paths =	svg_g.selectAll("path")
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
				d3.select(this).attr("class",null);
				// d3.select(this).classed("fill", d.fill = mousing > 0);
				// d3.select(this).classed($(".selected_cell").attr("id"), d.fill);
				d3.select(this).attr("fill", "url(#hosPattern)");	// 이미지 드래그
				
				// if() {	// 이미지인지 색인지
					// d3.select(this).attr("fill", $id);
					// else {
						// d3.select(this).attr("fill", "black");
					// }
				// }
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
	});
	</script>
@endsection