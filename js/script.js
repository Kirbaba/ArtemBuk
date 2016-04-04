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


    $(document).on('click', '.js-trip', function(){
        var id = $(this).attr('data-id');

        jQuery.ajax({
            url: myajax.url, //url, к которому обращаемся
            type: "POST",
            data: "action=aboutTrip&id=" + id, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function (data) {
                // console.log(data);
                //$('#all').before(data);
                $('.js-trip-modal').html(data);
            }
        });
    });

    $(document).on('change','#avatar', function (evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('current_avatar').src = fr.result;
            };
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });

    var api = $('.header--logo--slogan h3').gradientText({
        colors: ['#4e5661', '#707682', '#747a85', '#a2a5b0', '#c9cbd4', '#eeeff0', '#d4d4d5', '#6c6f74', '#41444a', '#313539'],
    });
    $('.main-content__item__body h3').textgrad({
        maxGroup: 1,
        type: '_',
        colgrad: [{pc:0,col:'4e5661'},
            {pc:10,col:'707682'},
            {pc:20,col:'747a85'},
            {pc:30,col:'a2a5b0'},
            {pc:40,col:'c9cbd4'},
            {pc:50,col:'eeeff0'},
            {pc:60,col:'d4d4d5'},
            {pc:70,col:'6c6f74'},
            {pc:80,col:'41444a'},
            {pc:90,col:'313539'},
            {pc:100,col:'313539'}],
    });
   /* $('.header--logo--slogan h3').textgrad({
        maxGroup: 1,
        type: '_',
        colgrad: [{pc:0,col:'4e5661'},
            {pc:10,col:'707682'},
            {pc:20,col:'747a85'},
            {pc:30,col:'a2a5b0'},
            {pc:40,col:'c9cbd4'},
            {pc:50,col:'eeeff0'},
            {pc:60,col:'d4d4d5'},
            {pc:70,col:'6c6f74'},
            {pc:80,col:'41444a'},
            {pc:90,col:'313539'}],
    });*/

});


jQuery(function($) {
    $('.mainpage-block').each( function(){
        var rnd = Math.random() * (15000 - 7000) + 7000;
        var id = $(this).attr('data-id');
        //console.log(id);
        var images = [];

        $('.hidden-'+id).each( function(){
            //console.log($(this).val());
            images.push({src: $(this).val()});
        });

        //console.log(images);
        $(this).vegas({
            delay: rnd,
            timer: false,
            transitionDuration: 1000,
            slides: images,
        });
    });

});
jQuery(function($){
    $('#myModal').on('hidden.bs.modal', function () {
        // do something…
        $('.js-trip-modal').html('');
    })
});
jQuery(function($){
    var hash = window.location.hash;
    if (hash != "")
        $('#tabs a[href="' + hash + '"]').tab('show');
    else
        $('#tabs a:first').tab('show');
});

