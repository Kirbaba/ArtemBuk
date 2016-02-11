<?php if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <a href="<?php echo get_post_meta(get_the_ID(), "link", 1); ?>" class="main-content__item  mainpage-block" data-id="<?php echo get_the_ID(); ?>">
					<span class="main-content__item__body">
						<h3><?php the_title(); ?></h3>
					</span>
<!--            <span class="main-content__item__foot"></span>-->
        </a>

    <?php
    // retrieve all Attachments for the 'attachments' instance of post 123
    $attachments = new Attachments('attachments', get_the_ID()); ?>
        <?php if( $attachments->exist() ) : ?>
            <?php while( $attachments->get() ) : ?>
                <input type="hidden" value="<?php echo $attachments->url(); ?>" class="hidden-<?php echo get_the_ID(); ?>">
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php endwhile; }
wp_reset_query(); ?>