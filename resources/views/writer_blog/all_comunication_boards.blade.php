<table class="table table-hover text-center">
    <thead>
        <tr>
            <td>No.</td>
            <td>제목</td>
            <td>작성자</td>
            <td>작성일</td>
            <td>조회수</td>
            <td>추천</td>
        </tr>
    </thead>      
    <tbody>
        <tr>
            @if ($data[0]['empty'] == 0)
                <td>게시글이 존재하지 않습니다.</td>
                <td>.</td>
                <td>.</td>
                <td>.</td>
                <td>.</td>
                <td>.</td>
            @else
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>

            @endif
            
        </tr>
    </tbody>    
</table>

<div class="row text-right">
    <div class="col-md-12">
        <a href="/yerriel/blog/community/create" class="btn btn-default">글쓰기</a>
    </div>
</div>