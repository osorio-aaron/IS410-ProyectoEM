$(window).scroll(function(){
    if($('#menu').offset().top > 82.5){
        $('#menu').addClass("navbar-scroll");
    }else{
        $('#menu').removeClass("navbar-scroll");
    }
});
