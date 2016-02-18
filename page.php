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
<!--                    <h3>--><?php //the_title(); ?><!--</h3>-->
                </div>
                <div class="page__body page__scrolltext">
                    <div class="col-xs-12">
                        <article class="page__scrolltext">
                            <div class="preloader"></div>
                            <?php the_content(); ?>
                        </article>
                    </div>
                    <div class="preloader"></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<? get_footer() ?>