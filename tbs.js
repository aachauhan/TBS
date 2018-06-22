$(document).ready(function () {

    var clickFlag = false;

    //tooltip for active pods style
    var tooltip_activePod = d3.select("body")
    .append("div")
    .style("position", "absolute")
    .style("z-index", "999")
    .style("visibility", "hidden")
    .style("width", "150px")
    .style("height", "auto")
    .style("background", "#000")
    .style("top", "25vh")
    .style("left", "10%")
    .style("border", "0.5px solid #efefef")
    .style("padding-left", "10px")
    .style("padding-right", "10px")
    .classed("handle", true);
    
    //tooltip for inactive pods style
    var tooltip = d3.select("body")
    .append("div")
    .style("position", "absolute")
    .style("z-index", "999")
    .style("visibility", "hidden")
    .style("width", "150px")
    .style("height", "auto")
    .style("background", "#828282")
    .style("top", "25vh")
    .style("left", "10%")
    .style("border", "0.5px solid #efefef")
    .style("padding-left", "10px")
    .style("padding-right", "10px")
    .classed("handle_1", true);

    //logic for the inactive pods
    d3.selectAll(".cls-1").on('mouseover', function(d) {
        console.log("MouseOver");
        tooltip.text("POD information coming soon!.");   //text inside the div ~ tooltip
        tooltip.html("<p>Inactive POD <br/>Status: Inactive</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        d3.select(this).style("stroke", "#22b0ed");
        return tooltip.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        console.log("MouseOut");
        d3.select(this).style("fill", "#efefef");
        d3.select(this).style("stroke", "#efefef");
        return tooltip.style("visibility","hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle_1");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle_1").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "#efefef");
                d3.select(this).style("stroke", "#efefef");
                return tooltip.style("visibility","hidden");
            });
        }
    });
    
    d3.selectAll(".close-button").on('click', function(){
        console.log("clicked");
        d3.selectAll(".handle").style("visibility", "hidden");
        d3.selectAll(".handle_1").style("visibility", "hidden");
    })
    .on("mouseover", function(){
        console.log("*");
    });

    //logic for the active pods - content
    d3.selectAll(".content").on('mouseover', function(d) {
        tooltip_activePod.text("Content POD");   //text inside the div ~ tooltip
        tooltip_activePod.html("<p>Content POD<br/>Status: Active</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        d3.select(this).style("stroke", "#22b0ed");
        return tooltip_activePod.style("visibility", "visible");  //shows the information bo
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "steelblue");
        d3.select(this).style("stroke", "steelblue");
        return tooltip_activePod.style("visibility", "hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "steelblue");
                d3.select(this).style("stroke", "steelblue");
                return tooltip_activePod.style("visibility", "hidden");                
            });
        }
    });

    //logic for the active pods - web
    d3.selectAll(".web").on('mouseover', function(d) {
        tooltip_activePod.text("Web POD");   //text inside the div ~ tooltip
        tooltip_activePod.html("<p>Web POD<br/>Status: Active</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        d3.select(this).style("stroke", "#22b0ed");
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "#bdb530");
        d3.select(this).style("stroke", "#bdb530");
        return tooltip_activePod.style("visibility", "hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "#bdb530");
                d3.select(this).style("stroke", "#bdb530");
                return tooltip_activePod.style("visibility", "hidden");                
            });
        }
    });

    //logic for the active pods - design
    d3.selectAll(".design").on('mouseover', function(d) {
        tooltip_activePod.text("Design POD");   //text inside the div ~ tooltip
        tooltip_activePod.html("<p>Design POD<br/>Status: Active</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        d3.select(this).style("stroke", "#22b0ed");   //style for the pod
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "red");
        d3.select(this).style("stroke", "red");
        return tooltip_activePod.style("visibility", "hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "red");
                d3.select(this).style("stroke", "red");
                return tooltip_activePod.style("visibility", "hidden");                
            });
        }
    });

    //logic for the active pods - strategy
    d3.selectAll(".strategy").on('mouseover', function(d) {
        tooltip_activePod.text("Strategy POD");   //text inside the div ~ tooltip
        tooltip_activePod.html("<p>Strategy POD<br/>Status: Active</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod
        d3.select(this).style("stroke", "#22b0ed");
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "#2a5365");
        d3.select(this).style("stroke", "#2a5365");
        return tooltip_activePod.style("visibility", "hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "#2a5365");
                d3.select(this).style("stroke", "#2a5365");
                return tooltip_activePod.style("visibility", "hidden");                
            });
        }
    });

    //logic for the active pods - seo
    d3.selectAll(".seo").on('mouseover', function(d) {
        tooltip_activePod.text("SEO POD");   //text inside the div ~ tooltip
        tooltip_activePod.html("<p>SEO POD<br/>Status: Active</p><span class='close-button'>X</span><hr /><a href='#' style='color:white;'>Read More...</a>");     //the html
        tooltip_activePod.style("color", "white");    //style for the tooltip
        d3.select(this).style("fill", "#22b0ed");   //style for the pod - fill
        d3.select(this).style("stroke", "#22b0ed");   //style for the pod - stroke
        return tooltip_activePod.style("visibility", "visible");  //shows the information box
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "gray");
        d3.select(this).style("stroke", "gray");
        return tooltip_activePod.style("visibility", "hidden");
    })
    .on('click', function(d){
        var cl_handle = d3.selectAll(".handle");
        cl_handle.classed("show", !cl_handle.classed("show"));
        if(d3.selectAll(".handle").classed("show")){
            d3.select(this).on('mouseout', null);
        } else{
            d3.select(this).on('mouseout', function(){
                d3.select(this).style("fill", "gray");
                d3.select(this).style("stroke", "gray");
                return tooltip_activePod.style("visibility", "hidden");                
            });
        }
    });

    d3.selectAll(".cls-1").style("fill", "#efefef");
    d3.selectAll(".cls-1").style("stroke", "#efefef");
    d3.selectAll(".web").style("fill", "#bdb530");
    d3.selectAll(".web").style("stroke", "#bdb530");
    d3.selectAll(".content").style("fill", "steelblue");
    d3.selectAll(".content").style("stroke", "steelblue");
    d3.selectAll(".strategy").style("fill", "#2a5365");
    d3.selectAll(".strategy").style("stroke", "#2a5365");
    d3.selectAll(".seo").style("fill", "gray");
    d3.selectAll(".seo").style("stroke", "gray");
    d3.selectAll(".design").style("fill", "red");
    d3.selectAll(".design").style("stroke", "red");

    //logic for the close-button
    
  

    });