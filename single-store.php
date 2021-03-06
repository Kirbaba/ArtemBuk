<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper">

            <div class="page__head">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <h3><?php the_title(); ?></h3>
                   <!-- --><?php /*if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }*/?>
                </div>
            </div>
            <div class="page__body page__body--wrap page__scrolltext storepage-single">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <!-- open .storepage-single__head -->
                    <div class="storepage-single__head">
                        <!-- open .storepage-single__head--book -->
                        <div class="storepage-single__head--book csstransforms3d">

                            <div class="book">
                            <span>
                                <?php the_post_thumbnail(); ?>
                            </span>

                            </div>
                        </div>
                        <!-- close .storepage-single__head--book -->
                        <!-- open .storepage-single__head--controls -->
                        <div class="storepage-single__head--controls">
                            <!-- open .storepage-single__head--controls--title -->
                            <div class="storepage-single__head--controls--title">
                                <h3><?php the_title(); ?></h3>
                                <h4><i><?php echo get_post_meta(get_the_ID(), "author", 1); ?></i></h4>
                            </div>
                            <!-- close .storepage-single__head--controls--title -->
                            <!-- open .storepage-single__head--controls--recens -->
                            <div class="storepage-single__head--controls--recens">
                                <a href="/category/reviews/" ><img src="<?php bloginfo('template_directory'); ?>/img/adress-book.png" alt="" /><span>Рецензии</span></a>
                            </div>
                            <!-- close .storepage-single__head--controls--recens -->
                            
                            
                            <a href="<?php echo get_post_meta(get_the_ID(), "linkread", 1); ?>" class="controls--read"><b><i>Читать книгу</i></b></a>

                            <?php $user = get_current_user_id();
                               // prn($user);
                                $user_sub = get_user_meta($user,'subscription_duration',1);
                                $curr_time = time();
                                //prn($user_sub);
                                if($user_sub > time()){
                            ?>
                            <div class="controls--format">
                                <b><i>Скачать всю <br />книгу полностью</i></b>
                                <?php  if ( get_post_meta(get_the_ID(), "linkzip", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "linkzip", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/zip.png" alt="" /></a>
                                <?php endif; ?>
                            </div>
                                    <?php }else{ ?>
                                    <!-- open .controls--format -->
                                    <div class="controls--format">
                                        <b><i>Скачать<br />книгу</i></b>
                                        <?php  if ( get_post_meta(get_the_ID(), "link50pdf", 1) ) : ?>
                                            <a href="<?php echo get_post_meta(get_the_ID(), "link50pdf", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/PDF-Icon.png" alt="" /></a>
                                        <?php endif; ?>
                                        <?php  if ( get_post_meta(get_the_ID(), "link50fb2", 1) ) : ?>
                                            <a href="<?php echo get_post_meta(get_the_ID(), "link50fb2", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/fb2.png" alt="" /></a>
                                        <?php endif; ?>
                                        <?php  if ( get_post_meta(get_the_ID(), "link50epub", 1) ) : ?>
                                            <a href="<?php echo get_post_meta(get_the_ID(), "link50epub", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/epub.png" alt="" /></a>
                                        <?php endif; ?>
                                        <?php  if ( get_post_meta(get_the_ID(), "link50rtf", 1) ) : ?>
                                            <a href="<?php echo get_post_meta(get_the_ID(), "link50rtf", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/rtf.png" alt="" /></a>
                                        <?php endif; ?>
                                        <?php  if ( get_post_meta(get_the_ID(), "link50html", 1) ) : ?>
                                            <a href="<?php echo get_post_meta(get_the_ID(), "link50html", 1); ?>" download><img src="<?php bloginfo('template_directory'); ?>/img/HTML.png" alt="" /></a>
                                        <?php endif; ?>
                                    </div>
                            <!-- close .controls--format -->
                            <a href="/buybook/?id=<?php echo get_the_ID(); ?>&sum=<?php echo get_post_meta(get_the_ID(), "price", 1); ?>" class="controls--buy" ><b><i>Купить книгу<sup>за <?php echo get_post_meta(get_the_ID(), "price", 1); ?> рублей</sup></i></b></a>
                            <?php } ?>
                                    </div>
                        <!-- close .storepage-single__head--controls -->
                        
                    </div>
                    <!-- close .storepage-single__head -->

                    <!-- open .storepage-single--title -->
                    <h4 class="storepage-single--title">Аннотация</h4>
                    <!-- close .storepage-single--title -->
                    <article class="page__scrolltext storepage-single--annotation">
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php comments_template(); ?>
            </div>
        </div>
    </div>
<?get_footer()?>