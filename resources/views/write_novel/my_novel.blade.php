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
		background-color: #E4F7BA;
	}

	.novel-list{
		background-color: #B2EBF4;
		text-align: center;
	}

	.btn-group{
		margin-right: 10px;
	}
	.form-control{
		width:30%;
		display: inline-block;
	}

	/* 소설 테이블 css*/
	.novel-table{
		background-color: white;
		width:80%;
		margin-bottom: 50px;
	}

	.novel-table th{
		text-align: center;
	}

	.novel-table td{
		text-align: center;
	}

	.novel-table .novel-info{
		text-align: left;
		padding-left: 10px;
	}

	</style>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="write_novel_set">
    <div class="container">
      <div class="row set_row">
        <div class="col-md-12 main_title">작품 목록</div>
      </div>

      <div class="row set_row novel-container">
        <div class="col-md-12">
					<div class="span2">
						<div class="btn-group pull-left" data-toggle="buttons-radio">
								<button class="btn active">통합</button>
								<button class="btn">필명</button>
								<button class="btn">작품명</button>
						</div>
				</div>
				<div class="span4">
					<form class="form-search">
							<div class="input-append">
									<input type="text" class="span2 form-control">
									<button type="submit" class="btn">검색</button>
							</div>
					</form>
				</div>
        </div>
				<div class="col-md-12">
					<div class="novel-list">

						<!-- <table class='table novel-table' align='center'>
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
								<td>회차관리 작품수정</td>
							</tr>
							<tr>
								<td colspan='4' class='novel-info'>z</td>
							</tr>
						</table> -->

					</div>
        </div>
      </div>


    </div>
  </div>

	<script>
	$(function() {

		getNovelInfo();
		// ajax 소설값 가져옴
		function getNovelInfo(user_id){
			// DB처리
			$.ajax({
					type: "get",
					url: "getNovelInfo",
					data: {
						"userId" : '1',
						"removeFile" : '2'
					},
					success: function (data) {
						console.log(data);
					},
					error: function (error) {
						alert("오류발생");
					}
			});

		}
		// 소설값을 테이블에 적용
		function setNovelInfo(){
			var tableEle ="";
			tableEle += "<table class='table novel-table' align='center'>";
			tableEle += "	<tr>";
			tableEle += "		<th>표지</th>";
			tableEle += "		<th>제목</th>";
			tableEle += "		<th>필명</th>";
			tableEle += "		<th>장르</th>";
			tableEle += "		<th>관리</th>";
			tableEle += "	</tr>";
			tableEle += "	<tr>";
			tableEle += "		<td rowspan='2'>이미지</td>";
			tableEle += "		<td>제목</td>";
			tableEle += "		<td>필명</td>";
			tableEle += "		<td>장르</td>";
			tableEle += "		<td>회차관리 작품수정</td>";
			tableEle += "	</tr>";
			tableEle += "	<tr>";
			tableEle += "		<td colspan='4' class='novel-info'>z</td>";
			tableEle += "	</tr>";
			tableEle += "</table>";


			$(".novel-list").append(tableEle);
			$(".novel-list").append(tableEle);
			$(".novel-list").append(tableEle);
			$(".novel-list").append(tableEle);
		}

	});

	</script>
@endsection
