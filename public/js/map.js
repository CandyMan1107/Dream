(function() {
  // svg 요소의 넓이와 높이를 구함
  var svgEle = document.getElementById("myGraph");
  var svgWidth = window.getComputedStyle(svgEle, null).
      getPropertyValue("width");
  var svgHeight = window.getComputedStyle(svgEle, null).
      getPropertyValue("height");
  svgWidth = parseFloat(svgWidth);
  svgHeight = parseFloat(svgHeight);

  var blockSize = 20;
  var heatMap;
  var color;
  var maxValue;
  var dataSet = [ ];
  //데이터 읽어오기
  d3.text("mydata2.txt", function(error, plainText){
    var temp = plainText.split(",");
    for(var i=0; i<temp.length; i++){
      dataSet[i] = parseInt(temp[i]);
    }
    drawHeatMap();
    setInterval(function(){
      for(var i=0; i<dataSet.length; i++){
        var n = ((Math.random() * 3.5) | 0) - 2;
        dataSet[i] = dataSet[i] + n;
        //음수가 안되도록 조정
        if(dataSet[i] < 0) { dataSet[i] = 0; }
        if(dataSet[i] > maxValue ) { dataSet[i] = maxValue; }
      }
      heatMap.data(dataSet)
        .style("fill", function(d, i){
          return color(d/maxValue);
        })
    }, 1000);
  })
  //히트맵 표시할 함수
  function drawHeatMap(){
    // 히트맵에 표시할 색을 자동으로 계산
    // 파란색에서 노란색으로 보간
    color = d3.interpolateHsl("blue", "yellow");
    maxValue = d3.max(dataSet);
    // 히트맵 준비
    heatMap = d3.select("#myGraph")
      .selectAll("rect")
      .data(dataSet)
    //히트맵 표시
    heatMap.enter()
      .append("rect")
      .attr("class", "block")
      .attr("x", function(d, i) {
        return (i % 8) * blockSize;
      })
      .attr("y", function(d, i) {
        return Math.floor(i/8)*blockSize;
      })
      .attr("width", function(d, i) {
        return blockSize;
      })
      .attr("height", function(d, i) {
        return blockSize;
      })
      .style("fill", function(d, i) {
        return color(d/maxValue);
      })
  }
})();
