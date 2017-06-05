var width = 600, height = 150;

var svg = d3.select('#chart').append('svg')
    .attr('cx', width / 2)
    .attr('cy', height / 2)
    .attr('r', 30)
    .attr('fill', '#555');

var drag = d3.behavior.drag().on('drag', dragListener);

circle.call(drag);

function dragListener(d) {
    var cx = +d3.select(this).attr('cx');
    var cy = +d3.select(this).attr('cy');

    d3.select(this)
        .attr('cx', cx + d3.event.dx)
        .attr('cy', cy + d3.event.dy);
}

function sliderControl() {
    // 슬라이더 속성
    // 차트 그리는 함수
    function chart(selection) {
        selection.each(function(data) {
            // 컨테이너 그룹 셀렉션
            var group = d3.select(this);

            // 슬라이더 생성
        });
    }

    // 접근자 메소드

    return chart;
}

group.selectAll('line')
    .data([data])
    .enter().append('line')
    .call(chart.initLine);

chart.initLine = function(selection) {
    selection
        .attr('x1', 2)
        .attr('x2', width - 4)
        .attr('stroke', #777)
        .attr('stroke-width', 4)
        .attr('stroke-linecap', 'round');
};
var handle = group.selectAll('circle')
    .data([data])
    .enter().append('circle')
