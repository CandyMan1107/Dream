var svgWidth = 160;
var svgHeight = 240;
var blockSize = 20;

// var dataSet = [
//   0, 1, 2, 3, 3, 4, 5, 4,
//   0, 0, 0, 3, 4, 4, 5, 3,
//   1, 0, 0, 0, 0, 0, 0, 0,
//   2, 6, 8, 7, 0, 0, 0, 2,
//   4, 8, 9, 8, 0, 0, 1, 0
// ];
var links = json_encode($maps["links"]);
var color = d3.interpolateHsl("blue", "yellow");
var maxValue = d3.max(links);

var heatMap = d3.select("#myGraph")
  .selectAll("rect")
  .data(links)
heatMap.enter()
  .append("rect")
  .attr("class", "block")
  .attr("x", function(d, i) {
    return (i % 8) * blockSize;
  })
  .attr("y", function(d, i) {
    return Math.floor(i/8) * blockSize;
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

setInterval(function() {
  for(var i=0; i<links.length; i++) {
    var n = ((Math.random() * 3.5) | 0) - 2;
    links[i] = links[i] + n;
    if(links[i] < 0) { links[i] = 0; }
    if(links[i] > maxValue ) { links[i] = maxValue; }
  }
  heatMap.data(links)
    .style("fill", function(d, i){
      return color(d/maxValue)
    })
}, 1000);
