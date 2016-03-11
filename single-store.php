<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper">

            <div class="page__head">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
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
                            <h3><?php the_title(); ?></h3>
                            <h4><i><?php echo get_post_meta(get_the_ID(), "author", 1); ?></i></h4>
                            <a href="<?php echo get_post_meta(get_the_ID(), "linkread", 1); ?>" class="controls--read"><b><i>Читать книгу</i></b></a>
                            <!-- open .controls--format -->
                            <div class="controls--format">
                                <b><i>Скачать 50% книги</i></b>
                                <?php  if ( get_post_meta(get_the_ID(), "link50pdf", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "link50pdf", 1); ?>">pdf</a>
                                <?php endif; ?>
                                <?php  if ( get_post_meta(get_the_ID(), "link50fb2", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "link50fb2", 1); ?>">fb2</a>
                                <?php endif; ?>
                                <?php  if ( get_post_meta(get_the_ID(), "link50epub", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "link50epub", 1); ?>">epub</a>
                                <?php endif; ?>
                                <?php  if ( get_post_meta(get_the_ID(), "link50rtf", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "link50rtf", 1); ?>">rtf</a>
                                <?php endif; ?>
                                <?php  if ( get_post_meta(get_the_ID(), "link50html", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "link50html", 1); ?>">html</a>
                                <?php endif; ?>
                            </div>

                            <div class="controls--format">
                                <b><i>Скачать всю книгу полностью</i></b>
                                <?php  if ( get_post_meta(get_the_ID(), "linkzip", 1) ) : ?>
                                    <a href="<?php echo get_post_meta(get_the_ID(), "linkzip", 1); ?>">*.zip</a>
                                <?php endif; ?>
                            </div>
                            <!-- close .controls--format -->
                            <a href="#" class="controls--buy" data-id="<?php echo get_the_ID(); ?>"><b><i>Купить книгу<sup>за <?php echo get_post_meta(get_the_ID(), "price", 1); ?> рублей</sup></i></b></a>
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