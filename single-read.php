<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper" oncopy="return false">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="page__head">
                    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                        <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                    </div>
<!--                    <input type="button" class="page--bookmark" value="Закладка" onclick="document.getElementById('readtext').focus(); pasteHtmlAtCaret('<span id=\'bookmark\'><i class=\'fa fa-bookmark-o\'></i></span>');">-->
<!--                    <h3>--><?php //the_title(); ?><!--</h3>-->
                    <?php if(in_category('read')){?>
                        <a class="bookmarkBut" href="#bookmark"><i class="fa fa-bookmark"></i></a>
                   <?php } ?>

                </div>
                <div class="page__body page__scrolltext">
                    <div class="col-xs-12">
                        <article class="page__scrolltext">
                            <div class="preloader"></div>
                            <div id="readtext" data-link="<?= the_permalink(); ?>" data-post-id="<?= get_the_ID(); ?>"><?php the_content(); ?></div>
                        </article>
                    </div>
                    <div class="preloader"></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<? get_footer() ?>