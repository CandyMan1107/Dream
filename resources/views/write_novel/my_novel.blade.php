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
	}

	.novel-list{
		text-align: center;
		background-color: #EAEAEA;
		padding: 1px;
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
		margin-top: 50px;
		margin-bottom: 30px;
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
		getNovelInfo(1);
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
				// 소설 테이블
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
				tableEle += "		<td rowspan='2'><img class='cover-img' src='{{URL::asset('upload/images')}}/"+ d.cover_img_src+ "' width='80%' height='100%'></td>";
				tableEle += "		<td>"+ d.title +"</td>";
				tableEle += "		<td>"+ "글반죽 "+"</td>";
				tableEle += "		<td>"+ d.genre +"</td>";
				tableEle += "		<td>"
				tableEle += "			<button  data-toggle='collapse' href='#collapse" + d.id + "' type='button' class='btn btn-default episode-mng-btn' data-novel-id='"+d.id+"'>회차관리</button>";
				tableEle += "			<button type='button' class='btn btn-default write-episode-btn' data-novel-id='"+d.id+"'>회차작성</button>";
				tableEle += " 		<button type='button' class='btn btn-default novel-modify-btn' data-novel-id='"+d.id+"'>작품수정</button>";
				tableEle += " 	</td>";
				tableEle += "	</tr>";
				tableEle += "	<tr>";
				tableEle += "		<td colspan='4' class='novel-info'>";
				tableEle += "<b>최신 등록</b> " + d.created_at + "<br>";
				tableEle += "<b>최신 업데이트</b> " + (d.updated_at != null ? d.update_at : "0000-00-00");
				tableEle += "		</td>";
				tableEle += "	</tr>";
				tableEle += "</table>";
				tableEle += "<div class='collapseDiv"+ d.id +"'></div>";

				$(".novel-list").append(tableEle);

				// 회차 리스트 출력
				setEpisodeInfo(d.id);

				$(".write-episode-btn").off().on("click",function(){
					var novelId = $(this).attr("data-novel-id");
					document.location.href="/write_novel/write_episode/" + novelId;
				})
			})
		}

		// 소설 아이디에 따른 회차 목록
		function setEpisodeInfo(novelId){
			$.ajax({
					type: "get",
					url: "get_episode_info",
					data: {
						"novelId": novelId
					},
					success: function (data) {
						console.log(data);// 회차 테이블
						var episodeCollapse = "";
						episodeCollapse += "<div class='panel panel-default'>";
						episodeCollapse += "	<div id='collapse" + novelId + "' class='panel-collapse collapse'>";
						episodeCollapse += "		<ul class='list-group'>";
						episodeCollapse += "			<div class='col-md-12 list-group-item'>";
						episodeCollapse += "				<div class='col-md-1'>종류</div>";
						episodeCollapse += "				<div class='col-md-1'>유/무료</div>";
						episodeCollapse += "				<div class='col-md-6'>제목</div>";
						episodeCollapse += "				<div class='col-md-2'>최초 업로드</div>";
						episodeCollapse += "				<div class='col-md-2'>최근 수정</div>";
						episodeCollapse += "			</div>";
						episodeCollapse += "		</ul>"

						data.forEach(function(d){
							episodeCollapse += "		<ul class='list-group'>";
							episodeCollapse += "			<div class='col-md-12 list-group-item'>";
							episodeCollapse += "				<div class='col-md-1'>" + (d.is_notice ? "공지" : "회차") + "</div>";
							episodeCollapse += "				<div class='col-md-1'>" + (d.is_charge ? "유료" : "무료") + "</div>";
							episodeCollapse += "				<div class='col-md-6'>" + (data.indexOf(d)+1) + "회. " +d.episode_title + "</div>";
							episodeCollapse += "				<div class='col-md-2'>" + d.created_at + "</div>";
							episodeCollapse += "				<div class='col-md-2'>" + (d.updated_at != null ? d.update_at : "0000-00-00") + "</div>";
							episodeCollapse += "			</div>";
							episodeCollapse += "		</ul>"
						});

						episodeCollapse += "		<div class='panel-footer'>총 회차수 : " + data.length + "</div>";
						episodeCollapse += "	</div>";
						episodeCollapse += "</div>";

						$(".collapseDiv" + novelId).append(episodeCollapse);

					},
					error: function (error) {
						alert("에피소드 호출 오류발생");
					}
			});
		}
		// 소설 목록 페이지네이션
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
			if(start < 1) start =1;
			if(end > lastPage) end = lastPage;
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
