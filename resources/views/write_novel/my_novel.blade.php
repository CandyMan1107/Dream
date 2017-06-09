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



	/* 페이지네이션 css */
	.pagination>li>a, .pagination>li>span {
		 border-radius: 50% !important;
		 margin: 0 5px;
	 }

	</style>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="write_novel_set">
    <div class="container">
      <div class="row set_row">
        <div class="col-md-12 main_title" draggable="false">작품 목록</div>
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
					<ul class="pagination">
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
          </ul>
        </div>
      </div>


    </div>
  </div>

	<script>
	$(function() {
		getNovelInfo(3);
		// ajax 소설값 가져옴, 입력값 없을 시 1페이지
		function getNovelInfo(curPage = 1){
			// DB처리
			$.ajax({
					type: "get",
					url: "get_novel_info",
					data: {
						"page": curPage
					},
					success: function (data) {
						console.log(data);
						// 소설 정보 띄우기
						 setNovelInfo(data.data)
						// 페이지 네이션
						setPagination(curPage,data.last_page);
					},
					error: function (error) {
						alert("오류발생");

					}
			});

		}

		// 소설값을 테이블에 적용
		function setNovelInfo(data){

			$(".novel-list .novel-table").remove();
			data.forEach(function(d){
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
				tableEle += "		<td rowspan='2'><img class='cover-img' src='{{URL::asset('upload/images')}}/"+ d.cover_img_src+ "'></td>";
				tableEle += "		<td>"+ d.title +"</td>";
				tableEle += "		<td>"+ "글반죽 "+"</td>";
				tableEle += "		<td>"+ d.genre +"</td>";
				tableEle += "		<td>회차관리 작품수정</td>";
				tableEle += "	</tr>";
				tableEle += "	<tr>";
				tableEle += "		<td colspan='4' class='novel-info'>";
				tableEle += "<b>최신 등록</b> " + d.created_at + "<br>";
				tableEle += "<b>최신 업데이트</b> " + (d.updated_at != null ? d.update_at : "0000-00-00");
				tableEle += "		</td>";
				tableEle += "	</tr>";
				tableEle += "</table>";

				$(".novel-list").append(tableEle);
			})
		}

		//
		function setPagination(curPage, lastPage){
			// 현재 페이지 기준 앞뒤 2개씩 출력
			var unit = 2;

			// 처음 2 페이지일 경우
			if(curPage <= unit){
				start = 1;
				end = 1 + unit*2;
			// 마지막 2 페이지일 경우
			}else if(lastPage-curPage < unit){
				start = lastPage -unit*2;
				end = lastPage;
			} else {
				start = curPage - unit;
				end = curPage + unit
			}
			showPagination(start, end, curPage, lastPage);
			function showPagination(start,end, curPage, lastPage){
				//alert(start + "부터" + end);
				$(".pagination li").remove();

				var pageEle ="";
				pageEle += "<li " + (curPage == 1 ? "class='disabled'" : "") + "><a onclick='jsGetNovelInfo(" + (curPage-1) + ")'>«</a></li>"

				for(var index = start; index <= end ; index++)
					pageEle += "<li " + (index==curPage ? "class='active'" : "") +"><a onclick='jsGetNovelInfo(" + index + ")'> " + index + "</a></li>";

				pageEle += "<li " + (curPage == lastPage ? "class='disabled'" : "") + "><a onclick='jsGetNovelInfo(" + (curPage+1) + ")'>»</a></li>";

				//alert(pageEle);
				 $(".pagination").append(pageEle);
			}
		}

		goJsGetNovelInfo = getNovelInfo;
	});

	function jsGetNovelInfo(num = 1){
		goJsGetNovelInfo(num);
	}
	</script>
@endsection
