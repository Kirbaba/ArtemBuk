<?php $new_line = 0; if( $my_query->have_posts() ) {
    while ($my_query->have_posts()) : $my_query->the_post();

        if($new_line == 0){
            echo '<div class="buyabook__row">';
        } $new_line++;?>


        <!-- open .page-buyabook__row -->
            <a href="<?php the_permalink(); ?>" class="buyabook__item">
							<span class="buyabook__item--img">
								<span>
									<?php the_post_thumbnail(); ?>
								</span>

							</span>
							<span class="buyabook__item--desc">
								<p><?php echo get_post_meta(get_the_ID(), "author", 1); ?></p>
								<p>“<?php the_title(); ?>”</p>
								<span class="buyabook__item--desc--price"><?php echo get_post_meta(get_the_ID(), "price", 1); ?> руб</span>
							</span>
            </a>
        <!-- close .page-buyabook__row -->
        <?php
        if($new_line % 3 == 0){
            echo '</div>';
            $new_line = 0;
        }
        //prn($new_line);
    endwhile;
    if($new_line % 3 != 0){
        echo '<a href="#" class="buyabook__item">
                <span class="buyabook__item--img--sub">
                    <img src="'.get_bloginfo('template_directory').'/img/adress-book.png" alt="" />

                </span>
                <span class="buyabook__item--desc">
                    <p>Купить подписку</p>
                    <span class="buyabook__item--desc--price">10100 руб</span>
                </span>
            </a></div>';
    }else{
        echo '<div class="buyabook__row"><a href="#" class="buyabook__item">
                    <span class="buyabook__item--img--sub">
                        <img src="'.get_bloginfo('template_directory').'/img/adress-book.png" alt="" />

                    </span>
                    <span class="buyabook__item--desc">
                        <p>Купить подписку</p>
                        <span class="buyabook__item--desc--price">10100 руб</span>
                    </span>
                </a></div>';
    }
}
wp_reset_query(); ?>