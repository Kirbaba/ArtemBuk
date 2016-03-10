<h4 class="storepage-single--title">Комментарии</h4>
<article class="page__scrolltext storepage-single--annotation">
    <!-- форма ввода комментария -->

    <?php if ( comments_open() ) {  // проверка разрешены ли комментирование ?>
    <?php if ( is_user_logged_in()) : // если разрешено только для зареганных юзеров ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
                <textarea name="comment" id="comment" placeholder="Оставить комментарий (только для зарегистрированный пользователей)"></textarea> <!-- ширина 83 символа  -->
                <input name="submit" class="comment-sub" type="submit" value="Отправить" /> <!-- кнопка отправить  -->
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
        </form> <!-- конец формы  -->
    <?php endif; ?>
    <?php } ?>

    <?php if ($comments && count($comments) > 0) { ?>     <!-- проверка есть ли комментарии -->
    <?php if ( $comments ) : ?> <!-- если комменты есть, то выводим то что ниже -->
    <?php foreach ($comments as $comment) : ?>
        <?php $comment_type = get_comment_type(); ?> <!-- проверка типа комментария -->
        <?php if($comment_type == 'comment') { ?> <!-- выводим только коммены, без пингов и бэков -->
            <div class="comment__item"> <!-- начало информационного блока -->
                <h4><?php comment_author_link(); ?><span class="comment--time"><?php comment_date(); ?></span></h4> <!-- имя автора -->
                <p><?php comment_text(); ?></p>
            </div>
        <?php } ?>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php }?>

</article>
