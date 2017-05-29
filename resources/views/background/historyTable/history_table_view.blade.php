@extends('layouts.master')

@include('partials.mySubNavi')

@include('background.tag')


@section('content') 
		<div class="col-xs-4 col-sm-3 col-md-3 height-max-set" style= "background-color : #e8d6b3" >
			<script type="text/javascript">

		// 전체 width,height, 시작 좌표
		var w = 200,
		// 1120
			h = 600,
			x = d3.scale.linear().range([0, w]),
			y = d3.scale.linear().range([0, h]);

		var vis = d3.select("#body").append("div")
			.attr("class", "chart")
			.style("width", w + "px")
			.style("height", h + "px")
		.append("svg:svg")
			.attr("width", w)
			.attr("height", h);

		var partition = d3.layout.partition()
			.value(function(d) { return d.size; });

		d3.json("flare.json", function(root) {
		var g = vis.selectAll("g")
			.data(partition.nodes(root))
			.enter().append("svg:g")
			.attr("transform", function(d) { return "translate(" + x(d.y) + "," + y(d.x) + ")"; })
			.on("click", click);

		var kx = w / root.dx,
			//  kx = w / root.dx,
			ky = h / 1;

		g.append("svg:rect")
			// 사각형 width
			// .attr("width", root.dy*kx/4)
			.attr("width", root.dy * kx)
			// 사각형 height
			.attr("height", function(d) { return d.dx * ky; })
			.attr("class", function(d) { return d.children ? "parent" : "child"; });

		g.append("svg:text")
			.attr("transform", transform)
			.attr("dy", ".35em")
			.style("opacity", function(d) { return d.dx * ky > 12 ? 1 : 0; })
			.text(function(d) { return d.name; })

		d3.select(window)
			.on("click", function() { click(root); })

		function click(d) {
			if (!d.children) return;

			kx = (d.y ? w - 40 : w) / (1 - d.y);
			// kx = (d.y ? w - 40 : w) / (1 - d.y) /4;
			ky = h / d.dx;
			x.domain([d.y, 1]).range([d.y ? 40 : 0, w]);
			y.domain([d.x, d.x + d.dx]);

			var t = g.transition()
				.duration(d3.event.altKey ? 7500 : 750)
				.attr("transform", function(d) { return "translate(" + x(d.y) + "," + y(d.x) + ")"; });

			t.select("rect")
				.attr("width", d.dy * kx)
				.attr("height", function(d) { return d.dx * ky; });

			t.select("text")
				.attr("transform", transform)
				.style("opacity", function(d) { return d.dx * ky > 12 ? 1 : 0; });

			d3.event.stopPropagation();
		}

		function transform(d) {
			return "translate(8," + d.dx * ky / 2 + ")";
		}
		});
    </script>
		</div>
		<div class="col-xs-7 col-sm-6 col-md-6 height-max-set" >
			<h3>사건추가</h3>
			{{-- 사건 제목 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">제목</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
					</div>
				</div>
			</form>
			{{-- 사건 내용 등록 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">내용</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
			{{-- 사건 추가사항 추가 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-3 control-label" for="formGroupInputLarge">추가사항</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" id="formGroupInputSmall" placeholder="Small input">
					</div>
					<div class="col-sm-2">
						<i class="fa fa-plus-circle" aria-hidden="true" style="font-size:200%"></i>
					</div>
				</div>
			</form>
			{{-- 사건 기간 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">기간</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
					<label class="col-sm-2 control-label" for="formGroupInputLarge">~</label>
					<div class="col-xs-4">
						<input type="text" class="form-control" placeholder=".col-xs-3">
					</div>
				</div>
			</form>
			{{-- 등장인물 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">등장 인물</label>
					<div class="col-sm-10">
					<input class="form-control" type="text" id="formGroupInputLarge" placeholder="Large input">
					</div>
				</div>
			</form>
			{{-- 기타 --}}
			<form class="form-horizontal">
				<div class="form-group form-group-lg">
					<label class="col-sm-2 control-label" for="formGroupInputLarge">기타</label>
					<div class="col-sm-10">
					<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</form>
			<button type="submit" class="btn btn-default">등록</button>
		</div>


		<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag" >
			{{-- add_tag.blade.php 구현하고, 컨트롤러로 div안에 불러오는 형식으로 변경 할 것. --}}
			<form class="form-horizontal main-navigation">
				<div class="form-group form-group-sm">
					<br>
					<label class="col-sm-2 control-label" for="formGroupInputSmall">검색</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" id="formGroupInputSmall" placeholder="Small input">
					</div>
					<br>
					<br>
					<button type="submit" class="btn btn-default">검색</button>
				</div>
			</form>
			<div class="row">
				<h3>태그 등록</h3>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title">태그 이름</h3>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" placeholder="Text input">
					</div>
				</div>

				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title">태그 내용</h3>
					</div>
					<div class="panel-body">
						<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-default">등록</button>
			</div>
		</div>

	{{-- 태그 div.row 닫는 태그 --}}
	</div>
@endsection
