jQuery(document).ready( function(){

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

    var api = $('.header--logo--slogan h3').gradientText({
        colors: ['#4e5661', '#707682', '#747a85', '#a2a5b0', '#c9cbd4', '#eeeff0', '#d4d4d5', '#6c6f74', '#41444a', '#313539'],
    });

    $(document).on('click', '.js-trip', function(){
        var id = $(this).attr('data-id');

        jQuery.ajax({
            url: myajax.url, //url, к которому обращаемся
            type: "POST",
            data: "action=aboutTrip&id=" + id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                // console.log(data);
                //$('#all').before(data);
                $('.js-trip').html(data);
            }
        });
    })

});

jQuery(function($) {
    $('.mainpage-block').each( function(){

        var id = $(this).attr('data-id');
        //console.log(id);
        var images = [];

        $('.hidden-'+id).each( function(){
            //console.log($(this).val());
            images.push({src: $(this).val()});
        });

        //console.log(images);
        $(this).vegas({
            delay: 5000,
            timer: false,
            transitionDuration: 2000,
            slides: images
        });
    });

});

