@extends('layouts.master')

@include('partials.mySubNavi')



@section('content')
	<style>
	.set_row {
		border-top: #EAEAEA 2px solid;
		padding: 10px;
	}

	.main_title {
		color:#BDBDBD;
		font-size:24px;
	}
	.menu_title {
		font-size:18px;
		padding-right: 8px;
	}

	.menu_input {
		border:none;
	}

	.menu_select {
		border: #BDBDBD 2px solid;
		padding: :5px;
	}
	.check_box {
		background-color: blue;
	}

	.novel-container{
		background-color: green;
	}

	.search-box{
		background-color: blue;
	}
	.novel-list{
		background-color: red;
	}
	</style>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="write_novel_set">
    <div class="container">
      <div class="row set_row">
        <div class="col-md-12 main_title">작품 목록</div>
      </div>

      <div class="row set_row novel-container">
        <div class="col-md-12 search-box">
					검색
        </div>
				<div class="col-md-12 novel-list">
					소설
        </div>
      </div>


    </div>
  </div>

	<script>
	$(function() {

	});

	</script>
@endsection
