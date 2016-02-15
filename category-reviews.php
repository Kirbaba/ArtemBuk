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
                </div>
                <div class="page__body page__scrolltext">
                        <article class="page__scrolltext page__reviews__item ">
                            <div class="preloader"></div>
                          <!--   <? the_title(); ?>
                            <?php the_content(); ?> -->
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt impedit, veniam veritatis dolorum dolore laborum in autem illo adipisci itaque! Dolore cumque sunt quas eaque et libero fugit, necessitatibus maiores nihil unde eveniet minima laudantium placeat eum, quia totam, sint odit iste modi perferendis vitae dolorum. Nesciunt dignissimos dolorum magnam?
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum earum, explicabo culpa! Maxime nobis illum saepe, labore vel ea ad.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, rerum.</p>
                        </article>
                        <article class="page__scrolltext page__reviews__item">
                            <div class="preloader"></div>
                             <!--   <? the_title(); ?>
                            <?php the_content(); ?> -->
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt impedit, veniam veritatis dolorum dolore laborum in autem illo adipisci itaque! Dolore cumque sunt quas eaque et libero fugit, necessitatibus maiores nihil unde eveniet minima laudantium placeat eum, quia totam, sint odit iste modi perferendis vitae dolorum. Nesciunt dignissimos dolorum magnam?</p>
                        </article>
                        <article class="page__scrolltext page__reviews__item">
                            <div class="preloader"></div>
                             <!--   <? the_title(); ?>
                            <?php the_content(); ?> -->
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt impedit, veniam veritatis dolorum dolore laborum in autem illo adipisci itaque! Dolore cumque sunt quas eaque et libero fugit, necessitatibus maiores nihil unde eveniet minima laudantium placeat eum, quia totam, sint odit iste modi perferendis vitae dolorum. Nesciunt dignissimos dolorum magnam?</p>
                        </article>
                        <article class="page__scrolltext page__reviews__item">
                            <div class="preloader"></div>
                             <!--   <? the_title(); ?>
                            <?php the_content(); ?> -->
                            <h4>Lorem ipsum dolor sit amet.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt impedit, veniam veritatis dolorum dolore laborum in autem illo adipisci itaque! Dolore cumque sunt quas eaque et libero fugit, necessitatibus maiores nihil unde eveniet minima laudantium placeat eum, quia totam, sint odit iste modi perferendis vitae dolorum. Nesciunt dignissimos dolorum magnam?</p>
                        </article>
                    <div class="preloader"></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<? get_footer() ?>