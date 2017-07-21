@extends('layouts.master')

@section('content')

	@include('partials.mySubNavi')
	@include('background.tag')
		<script type="text/javascript" src="/js/custom/chapter_click.js"></script>
		<div class="col-xs-2 col-sm-2 col-md-2 height-max-set" style= "border-right: 2px solid #efefef ; height: 100vh">
			<div class="novel_id" id="root" value="{{$data['novel']['id']}}>
				<h3 class="text-center">{{$data['novel']['title']}}</h3>
			</div>
			<div class="row" id="test">
				@for($i = 0; $i < count($data['chapter']) ; $i++)
					<table class="table table-condensed">
						<tr>
							<th>제목</th>
							<th>내용</th>
						</tr>
						<tr>
							<td style="width:80px">
							{{--  {{var_dump($data)}}   --}}
								<button type="button" class="btn btn-link chapter_click chapter_val" id="{{$data['chapter'][$i]['chapter_id']}}" value="{{$data['chapter'][$i]['chapter_id']}}">
									{{$data['chapter'][$i]['chapter_name']}} 
								</button>     
							</td>
							<td>
								{{$data['chapter'][$i]['chapter_content']}}  
							</td>
						</tr>
					</table>
				@endfor
			</div>
			<div>
				{{-- 등록 챕터 목록 --}}
				<div class="inner"></div>
				{{-- 소유 사물 등록 아이콘, 모달 호출 --}}
				@php 
					use App\Http\Controllers\ChaptersController;
					echo ChaptersController::chapter_modal(); 
				@endphp
				<br>
				<div class="text-center" data-toggle="modal" data-target="#abc">
					<p class="remote">
						<a class="setView" href="#">
							<i class="fa fa-plus-square-o fa-3x "></i>
						</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-xs-5 col-sm-3 col-md-3 height-max-set" style= "border-right: 2px solid #efefef ; height: 100vh" >
			 
			
		</div>
		<div class="col-xs-7 col-sm-6 col-md-6 height-max-set" >
			
		</div>
	</div>
@endsection
