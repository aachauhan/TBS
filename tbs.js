$(document).ready(function () {

    d3.selectAll(".cls-1")
    .on("mouseover", handleMouseOver)
    .on("mouseout", handleMouseOut);

    function handleMouseOver(){
        d3.selectAll(".cls-1").style({
            fill: "orange",
        });
    }

    function handleMouseOut(){
        d3.select(".cls-1").style({
            fill: "black",
        });
    }
    
    d3.selectAll(".cls-1").on('mouseover', function() {
        d3.select(this).style("fill", "blue")
    })
    .on('mouseout', function(){
        d3.select(this).style("fill", "black")
    })

    d3.selectAll(".cls-1").style("fill", "blue");
  
    var moveLeft = 0;
    var moveDown = 0;
    //selector -
    //hovering logic
    $('.cls-1').hover(function (e) {
        
        var target = '#' + ($(this).attr('data-popbox'));
        
        $(target).show();
        moveLeft = $(this).outerWidth();
        moveDown = ($(target).outerHeight() / 2);
    }, function () {
        var target = '#' + ($(this).attr('data-popbox'));
        if (!($(".cls-1").hasClass("show"))) {
            $(target).hide();
        }
    });
    //mousemove logic
    //slector - 
    $('.cls-1').mousemove(function (e) {
        var target = '#' + ($(this).attr('data-popbox'));
    
        leftD = e.pageX + parseInt(moveLeft);
        maxRight = leftD + $(target).outerWidth();
        windowLeft = $(window).width() - 40;
        windowRight = 0;
        maxLeft = e.pageX - (parseInt(moveLeft) + $(target).outerWidth() + 20);
    
        if (maxRight > windowLeft && maxLeft > windowRight) {
            leftD = maxLeft;
        }
    
        topD = e.pageY - parseInt(moveDown);
        maxBottom = parseInt(e.pageY + parseInt(moveDown) + 20);
        windowBottom = parseInt(parseInt($(document).scrollTop()) + parseInt($(window).height()));
        maxTop = topD;
        windowTop = parseInt($(document).scrollTop());
        if (maxBottom > windowBottom) {
            topD = windowBottom - $(target).outerHeight() - 20;
        } else if (maxTop < windowTop) {
            topD = windowTop + 20;
        }
    
        $(target).css('top', 10).css('left', 30);
    });

    //click logic
    //selector - 
    $('.cls-1').click(function (e) {
        var target = '#' + ($(this).attr('data-popbox'));
        if (!($(this).hasClass("show"))) {
            $(target).show();
        }
        $(this).toggleClass("show");
    });
    });