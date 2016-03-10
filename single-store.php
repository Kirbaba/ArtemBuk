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

                </div>
                <div class="page__body page__scrolltext">
                    <div class="col-xs-12">
                        <article class="page__scrolltext">
                            <div class="preloader"></div>
                            <div>
                                <?php the_title(); ?>
                                <?php the_post_thumbnail(); ?>
                                <?php the_content(); ?>
                                <?php echo get_post_meta(get_the_ID(), "author", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "price", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "link50pdf", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "link50fb2", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "link50rtf", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "link50epub", 1); ?>
                                <?php echo get_post_meta(get_the_ID(), "link50html", 1); ?>
                                <?php comments_template(); ?>
                            </div>
                        </article>
                    </div>
                    <div class="preloader"></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<? get_footer() ?>