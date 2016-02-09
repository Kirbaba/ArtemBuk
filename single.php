<? get_header() ?>
    <div class="col-xs-12">
        <div class="page__wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="page__head">
                    <h3><?php the_title(); ?></h3>
                </div>
                <?php
                // retrieve all Attachments for the 'attachments' instance of post 123
                $attachments = new Attachments('attachments', get_the_ID());
                $data = $attachments->get_attachments();
                if(!empty($data)){
                    $half = count($data) / 2;
                    $data = [];
                    while ($attachments->get()) :
                        $data[] = array(
                            'url' => $attachments->url(),
                            'title' => $attachments->field('title'),
                            'caption' => $attachments->field('caption'),
                        );
                    endwhile;
                    $data = array_chunk($data, $half);
                }

                ?>
                <div class="page__body page__scrolltext">
                    <div class="col-xs-3">
                        <?php if(!empty($data[0])){ foreach ($data[0] as $item) { ?>
                            <a class="author__photo--item" href="<?php echo $item['url']; ?>"
                               data-lightbox="example-set" data-title="<?php echo $item['caption']; ?>">
                                <img class="example-image" src="<?php echo $item['url']; ?>" alt=""/>
                            </a>
                        <? }} ?>
                    </div>
                    <div class="col-xs-6">

                        <article class="page__scrolltext">
                            <div class="preloader"></div>
                            <?php the_content(); ?>
                        </article>
                    </div>
                    <div class="col-xs-3">
                        <?php if(!empty($data[1])){ foreach ($data[1] as $item) { ?>
                            <a class="author__photo--item" href="<?php echo $item['url']; ?>"
                               data-lightbox="example-set" data-title="<?php echo $item['caption']; ?>">
                                <img class="example-image" src="<?php echo $item['url']; ?>" alt=""/>
                            </a>
                        <? }} ?>
                    </div>
                    <div class="preloader"></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
<? get_footer() ?>