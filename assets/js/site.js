import './wp-foundation';
 
$(() => {
    //only need foundation for offcanvas
    const offCanvas = $("#off-canvas").foundation();
    
    let $siteBody = $('body'),
    $siteHeader = $siteBody.find("header.header"),
    siteHeaderHeight = $siteHeader.outerHeight(); // update on scroll event where header class is added and removed

    $(window).scroll(function(){
        let scrollTop = $(window).scrollTop();
       //console.log(scrollTop, siteHeaderHeight)
        if(scrollTop > (siteHeaderHeight /2)){
            $siteHeader.addClass('shrink');
            $siteBody.addClass('sticky-nav');

        } else {
            $siteHeader.removeClass('shrink');
            $siteBody.removeClass('sticky-nav');


        }
    });

    if($siteBody.hasClass('home')){
        return true;
    } else {
        return false;
    }
 
 });