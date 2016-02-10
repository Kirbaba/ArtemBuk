<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper" oncopy="return false">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <div class="page__head">
                    <h3><?php the_title(); ?></h3>
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