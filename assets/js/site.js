import './wp-foundation';
 
$(() => {
    //only need foundation for offcanvas
    const offCanvas = $("#off-canvas").foundation();
    
    let $siteBody = $('body'),
    $siteHeader = $siteBody.find("header.header"),
    siteHeaderHeight = $siteHeader.outerHeight(); // update on scroll event where header class is added and removed

    $(window).scroll(function(){
        let scrollTop = $(window).scrollTop();
       
        if(scrollTop > (siteHeaderHeight / 2)){
            $siteHeader.addClass('shrink');
            $siteBody.addClass('header-fixed')
           // $siteBody.css('paddingTop', siteHeaderHeight);

        } else {
            $siteHeader.removeClass('shrink');
            $siteBody.removeClass('header-fixed')

        }
    });

    if($siteBody.hasClass('home')){
        return true;
    } else {
        return false;
    }
 
 });