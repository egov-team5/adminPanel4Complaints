var fill = d3.scale.category20b();

var w =1000,
        h = 450;

var max,
        fontSize;

var layout = d3.layout.cloud()
        .timeInterval(Infinity)
        .size([w, h])
        .fontSize(function(d) {
            return fontSize(+d.count);
        })
        .padding(10)
        .text(function(d) {
            return d.problem;
        })
        .on("end", draw);

var svg = d3.select("#vis").append("svg")
        .attr("width", w)
        .attr("height", h);

var vis = svg.append("g").attr("transform", "translate(" + [w >> 1, h >> 1] + ")");

update();

// window.onresize = function(event) {
//     update();
// };

function draw(data, bounds) {
    var w =1000,
        h = 450;

    svg.attr("width", w).attr("height", h);

    scale = bounds ? Math.min(
            w / Math.abs(bounds[1].x - w / 2),
            w / Math.abs(bounds[0].x - w / 2),
            h / Math.abs(bounds[1].y - h / 2),
            h / Math.abs(bounds[0].y - h / 2)) / 2 : 1;

    var text = vis.selectAll("text")
            .data(data, function(d) {
                return d.text.toLowerCase();
            });
    text.transition()
            .duration(1000)
            .attr("transform", function(d) {
                return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
            })
            .style("font-size", function(d) {
                return d.size + "px";
            });
    text.enter().append("text")
            .attr("text-anchor", "middle")
            .attr("transform", function(d) {
                return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
            })
            .style("font-size", function(d) {
                return d.size + "px";
            })
            .style("opacity", 1e-6)
            .transition()
            .duration(1000)
            .style("opacity", 1);
    text.style("font-family", function(d) {
        return d.font;
    })
            .style("fill", function(d) {
                return fill(d.text.toLowerCase());
            })
            .text(function(d) {
                return d.text;
            });

    vis.transition().attr("transform", "translate(" + [w >> 1, h >> 1] + ")scale(" + scale + ")");
}
var tags;
function update() {
    $.getJSON("../server/basicInfo.json", function(json) {
                tags = json;
                console.log(tags.wordCloud);
                layout.font('impact').spiral('archimedean');
                fontSize = d3.scale['sqrt']().range([10, 100]);
                if (tags.wordCloud.length){
                    fontSize.domain([+tags.wordCloud[tags.wordCloud.length - 1].count || 1, +tags.wordCloud[0].count]);
                }
                layout.stop().words(tags.wordCloud).start();
                $("#totalcomplaints").text(tags.totalComplaints);
                $("#complaints").text(tags.uniqueComplaints);
                $("#readdressed").text(tags.redressedComplaints);
                $("#notreaddressed").text(tags.notRedressedComplaints);
                $("#avgresolution").text(tags.avgComplaintResolTime);
                $("#mode").text(tags.mode);

        });
    
   

}
