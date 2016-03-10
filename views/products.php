<?php if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>

        <?php the_title(); ?>
        <?php the_post_thumbnail(); ?>
        <a href="<?php get_the_permalink(); ?>">
        "<?php echo get_post_meta(get_the_ID(), "author", 1); ?>"
        <?php echo get_post_meta(get_the_ID(), "price", 1); ?> руб</a>

    <?php endwhile; }
wp_reset_query(); ?>