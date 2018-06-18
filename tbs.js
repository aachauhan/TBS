$(document).ready(function () {

    var clickFlag = true;

    //tooltip for active pods style
    var tooltip_activePod = d3.select("body")
    .append("div")
    .style("position", "absolute")
    .style("z-index", "999")
    .style("visibility", "hidden")
    .style("width", "150px")
    .style("height", "auto")
    .style("background", "#000")
    .style("top", "15vh")
    .style("left", "10%")
    .style("border", "0.5px solid #efefef")
    .style("padding-left", "10px");
    
    //tooltip for inactive pods style
    var tooltip = d3.select("body")
    .append("div")
    .style("position", "absolute")
    .style("z-index", "999")
    .style("visibility", "hidden")
    .style("width", "150px")
    .style("height", "auto")
    .style("background", "#828282")
    .style("top", "15vh")
    .style("left", "10%")
    .style("border", "0.5px solid #efefef")
    .style("padding-left", "10px")
    .style("padding-right", "10px");

    //logic for the inactive pods
    d3.selectAll(".cls-1").on('mouseover', function(d) {
        console.log("MouseOver");
        tooltip.text("POD information coming soon! Status Inactive.");   //text inside the div ~ tooltip
        tooltip.html("<p>Inactive</p><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html test
        tooltip.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        return tooltip.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        console.log("MouseOut");
        d3.select(this).style("fill", "#efefef");
        return tooltip.style("visibility","hidden");
        //kinda works but need refinement
        /*if(clickFlag){
            console.log("Inside if");
            tooltip.style("visibility", "visible");  //shows the information box
        }else{
            console.log("Inside else");
            tooltip.style("visibility", "hidden");  //hides the information box
        }*/
    })
    .on('click', function(d){
        console.log("clicked");
        if(clickFlag){
            console.log("Inside if");
            tooltip.style("visibility", "visible");  //shows the information box
        }else{
            console.log("Inside else");
            tooltip.style("visibility", "hidden");  //hides the information box
        }
        return clickFlag = !clickFlag;
    });

    //logic for the active pods - content
    d3.selectAll(".content").on('mouseover', function(d) {
        tooltip_activePod.text("Content POD");   //text inside the div ~ tooltip
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information bo
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "steelblue");
        return tooltip_activePod.style("visibility", "hidden");
    });

    //logic for the active pods - web
    d3.selectAll(".web").on('mouseover', function(d) {
        tooltip_activePod.text("Web POD");   //text inside the div ~ tooltip
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "#bdb530");
        return tooltip_activePod.style("visibility", "hidden");
    });

    //logic for the active pods - design
    d3.selectAll(".design").on('mouseover', function(d) {
        tooltip_activePod.text("Design POD");   //text inside the div ~ tooltip
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "red");
        return tooltip_activePod.style("visibility", "hidden");
    });

    //logic for the active pods - strategy
    d3.selectAll(".strategy").on('mouseover', function(d) {
        tooltip_activePod.text("Strategy POD");   //text inside the div ~ tooltip
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "#2a5365");
        return tooltip_activePod.style("visibility", "hidden");
    });

    //logic for the active pods - seo
    d3.selectAll(".seo").on('mouseover', function(d) {
        tooltip_activePod.text("SEO POD");   //text inside the div ~ tooltip
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "gray");
        return tooltip_activePod.style("visibility", "hidden");
    });

    d3.selectAll(".cls-1").style("fill", "#efefef");
    d3.selectAll(".web").style("fill", "#bdb530");
    d3.selectAll(".content").style("fill", "steelblue");
    d3.selectAll(".strategy").style("fill", "#2a5365");
    d3.selectAll(".seo").style("fill", "gray");
    d3.selectAll(".design").style("fill", "red");
  

    });