var svgWidth = 640;
var svgHeight = 640;
var path = d3.geo.path()
  .projection(
    d3.geo.mercator()
    .translate([svgWidth/2, svgHeight/2])
    .scale(100)
  )
d3.json("data/world.json", function(error, world) {
  d3.select("#myGraph")
    .selectAll("path")
    .data(world.features)
    .enter()
    .append("path")
    .attr("d", path)
})
