var $ = jQuery;

$(document).ready(function(){
    function SliderUI(config) { 
        this.config = config;
        $html='<div class="SliderUI-btn SliderUI-left" data-move="left"></div><div class="SliderUI-btn SliderUI-right" data-move="right"></div>';
        $(this.config.selector).append($html);
        this.scrollTime=400;
        if(config.scrollTime > 0 ) {
            this.scrollTime=config.scrollTime;
        }
        
        this.style(this.config);
        this.event(this.config, this.scrollTime);
    }
    SliderUI.prototype.style = function(config) {
        $(config.selector).children('img').attr('draggable', 'false');
        // Slider style
        $(config.selector).css({
            "width": config.width,
            "height": config.height,
            "background-color": config.backgroundColor,
            "cursor": "pointer",
            "position": "relative"
        });
        $(config.selector).children('img').css({
            "width": "100%",
            "height": config.height
        });
        
        // Control
        $(config.selector).children('.SliderUI-btn').css({
            "width": "10%",
            "height": "100%",
            "position": "absolute"
        });

        if(config.theme == "dark") {
            $(config.selector).children('.SliderUI-left').css({
                "top": "0px",
                "left": "0px",
                "background": "linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(209,212,255,0) 100%)"
            });
            $(config.selector).children('.SliderUI-right').css({
                "top": "0px",
                "right": "0px",
                "background": "linear-gradient(90deg, rgba(209,212,255,0) 0%, rgba(0,0,0,0.5) 100%)"
            });
        } else {
            $(config.selector).children('.SliderUI-left').css({
                "top": "0px",
                "left": "0px",
                "background": "linear-gradient(90deg, rgba(255,255,255,0.5) 0%, rgba(209,212,255,0) 100%)"
            });
            $(config.selector).children('.SliderUI-right').css({
                "top": "0px",
                "right": "0px",
                "background": "linear-gradient(90deg, rgba(209,212,255,0) 0%, rgba(255,255,255,0.5) 100%)"
            });
        }
        
    }
    SliderUI.prototype.event = function(config, scrollTime) {
        var $items = $(config.selector).children('img');
        var currentCounter = 0;
        var $currentItem = $($items[currentCounter]);
        $items.hide();
        $currentItem.show();
        $('.SliderUI-left').click(function() {
            if(currentCounter == 0) {
                currentCounter = $items.length-1;
            } else {
                currentCounter--;
            }
            $items.hide();
            $($items[currentCounter]).fadeIn(scrollTime);
        });
        $('.SliderUI-right').click(function() {
            if(currentCounter == $items.length-1) {
                currentCounter=0;
            } else {
                currentCounter++;
            }
            $items.hide();
            $($items[currentCounter]).fadeIn(scrollTime);
        });
        setInterval(function(){
            $('.SliderUI-right').click();
        }, 5000);
    }

    var slider = new SliderUI(
    config = {
        "selector": "#slider",
        "width": "100%",
        "height": "300px",
        "scrollTime": 400,
        "theme": "dark",
        "backgroundColor": "#fff"
    });

});

