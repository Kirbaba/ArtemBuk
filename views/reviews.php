<?php if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <article class="page__scrolltext page__reviews__item ">
            <div class="preloader"></div>
            <h4><? the_title(); ?></h4>
            <p><?php the_content(); ?></p>
        </article>
    <?php endwhile; }
wp_reset_query(); ?>