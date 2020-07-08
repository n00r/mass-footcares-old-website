$(function() {
	$('.field, textarea').focus(function() {
        if(this.title==this.value) {
            this.value = '';
        }
    }).blur(function(){
        if(this.value=='') {
            this.value = this.title;
        }
    });

    $('.flexslider').flexslider({
        animation: 'fade',
        slideshow: true,
        slideshowSpeed: 3000,         
        animationDuration: 700,         
        directionNav: true,             
        controlNav: true,
        nextText: "",
        prevText: "" ,
        animationLoop: true        
    });

    var width =  (39 * $('.flex-control-nav li').length);  
    var left_pos = ((951 - width)/2 ) - 40;
    var right_pos = ((951 - width)/2) - 34;
    $('.flex-direction-nav li .prev').css('left' , left_pos );
    $('.flex-direction-nav li .next').css('right' , right_pos );  
    
    if ($.browser.msie && $.browser.version == 6) {
	   DD_belatedPNG.fix('.slides img, #navigation li.first a');
	}
});