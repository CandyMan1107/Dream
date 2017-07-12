@extends('layouts.master')

@section('content')

	@include('partials.mySubNavi')
	@include('background.tag')
		<div class="col-xs-11 col-sm-9 col-md-9 height-max-set" style= "height: 100vh" >
			<br>
			<table class="table table-condensed">
				<tr>
					<th>표지</th>
					<th>제목</th>
					<th>필명</th>
					<th>장르</th>
					<th>관리</th>
				</tr>
				<tr>
					<td rowspan='2'>이미지</td>
					<td>제목</td>
					<td>필명</td>
					<td>장르</td>
					<td>관리</td>
				</tr>
				<tr>
					<td colspan='4'>df</td>
				</tr>
			</table>
		</div>

		<div class="col-xs-3 col-sm-2 col-md-2 height-max-set background_tag" style="height: 100vh">
			
		</div>
	</div>
@endsection
