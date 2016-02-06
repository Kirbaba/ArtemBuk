

jQuery(document).ready( function(){
    $(function() {

        $(window).scroll(function() {
            if($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function() {
            $('body,html').animate({scrollTop: 0}, 1000);
        });

        $('.smoothScroll').click(function(event) {
            event.preventDefault();
            var href=$(this).attr('href');
            var target=$(href);
            var top=target.offset().top;
            $('html,body').animate({
                scrollTop: top
            }, 1000);
        });
    });

    (function(){
        $(window).load(function(){
            $('.preloader').fadeOut('slow',function(){
                $(this).remove();
            });
            $(".page__scrolltext").mCustomScrollbar({
                theme:"dark"
            });
        });
    })(jQuery);

    (function () {
         lightbox.option({
            'albumLabel': ""
         });
    })(jQuery);


    (function(){
        var i = 0;
        $('span.single-category__item--img').each(function(){            
            if (i == 0 || i==1) {}
            else if (i == 2 || i == 3) {
                $(this).css({
                    "float":"right",
                    "margin-right":"3.33%"
                });
                $(this).next().css("margin-left","0");
            }
            i++;
            if(i == 4){
                i = 0;
            }
        });
        
    })(jQuery);
    
});



