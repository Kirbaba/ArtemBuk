jQuery(document).ready(function () {
    setBookmark();

    $('#readtext > p').on("click", function () {

        var bookmark = $('#bookmark');
        var post_link = $('#readtext').attr('data-link');
        var post_id = $('#readtext').attr('data-post-id');

        if (bookmark.length) {
            bookmark.remove();
        }
        $(this).before('<p id="bookmark"><i class="fa fa-bookmark"></i></p>');

        var index = $('#bookmark').index("p");
        Cookies.set('bookmark', {link: post_link, pos: index, id: post_id}, {expires: 7});

        setBookmarkLink();
    });
});

function setBookmarkLink() {
    var cookieJson = Cookies.get('bookmark');

    if (cookieJson) {
        var cookie = jQuery.parseJSON(cookieJson);
        // console.log(cookie);
        if (cookie.link) {
            $('.bookmarkBut').attr('href', cookie.link + '#bookmark');
        }
    }
}

function setBookmark() {
    setBookmarkLink();

    var text = $('#readtext');
    if (text.length) {
        var cookieJson = Cookies.get('bookmark');
        if (cookieJson) {
            var cookie = jQuery.parseJSON(cookieJson);
            //   var cookie = jQuery.parseJSON(Cookies.get('bookmark'));
            var currId = text.attr('data-post-id');

            if (currId == cookie.id) {
                $("#readtext p").eq(cookie.pos).before('<p id="bookmark"><i class="fa fa-bookmark"></i></p>');
            }
        }

    }
}
