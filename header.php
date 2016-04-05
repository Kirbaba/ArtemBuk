<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/themes/ArtemBuk/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon"/>
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
<?php include_once("analyticstracking.php"); ?>
<div class="container">
    <header class="header">
        <div class="col-xs-4">
            <a href="/" class="header--logo">
                <div class="header--logo--img">
                    <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="">
                </div>
                <div class="header--logo--slogan">
                    <h3>Революция крови разрушь старый мир</h3>
                </div>
            </a>
        </div>
        <div class="col-xs-4">
            <div class="header--title">
                <h1>артем бук</h1>
                <h2>фантастические миры</h2>
            </div>
        </div>

        <div class="col-xs-4">
            <a class="bookmarkBut" href="#bookmark">
                <span>закладка</span>
                <i class="fa fa-bookmark"></i>
            </a>

            <?php if(is_user_logged_in()){ ?>
                <?php global $current_user; ?>
                <?php get_currentuserinfo(); ?>
            <div class="header--entered">
                <div class="header--entered--photo">
                    <div class="header--entered--photo--wrap">
                        <img src="<?php echo get_wp_user_avatar_src($current_user->ID, 96); ?>" alt="">
                    </div>
                </div>
                <div class="header--entered--links">
                    <a href="/cabinet/#home">Личный кабинет</a>
                    <a href="/cabinet/#subscriptions">Подписки</a>
                    <a href="/cabinet/#orders">Заказы</a>
                    <a href="<?php echo wp_logout_url( home_url() ); ?>">Выход</a>
                </div>
            </div>
            <?php }else{ ?>
                <?php echo get_ulogin_panel(); ?>
                <div class="header--enter">
                    <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
                        <a href="#" class="header--enter--but--active">Войти</a>
                        <a href="/registration" class="header--enter--but">Зарегистрироваться</a>

                        <div class="header--enter--form">
                            <input id="log" name="log" type="text" class="header--enter--inp login" placeholder="Логин">
                            <input type="password" id="pwd" name="pwd" class="header--enter--inp password" placeholder="Пароль">
                             <div class="header--enter--form--btn">
                            <input class="header--enter--form--btn" type="submit" name="submit" value="" />
                            </div>
                            <input type="hidden" name="redirect_to" class="header--enter--form--btn--sub" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />

                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </header>
<!-- 
    <article class="commercial">
    </article> -->

    <nav class="navigation">
        <!-- <ul>-->
        <?php
        $nav = wp_get_nav_menu_items('Главное');
        if (!empty($nav)) {
            echo '<ul>';
            foreach ($nav as $nav_item) {
                echo '<li><a href="' . $nav_item->url . '" class="navigation--link">' . $nav_item->title . '</a></li>';
            }
            echo '</ul>';
        }
        ?>
        <!--</ul> -->
        <!--			<ul>-->
        <!--				<li><a href="#" class="navigation--link">читать книги </a></li>-->
        <!--				<li><a href="#" class="navigation--link">купить книги</a></li>-->
        <!--				<li><a href="#" class="navigation--link">Критика и отзывы</a></li>-->
        <!--				<li><a href="#" class="navigation--link">Блог и форум</a></li>-->
        <!--				<li><a href="#" class="navigation--link">путешествия </a></li>-->
        <!--				<li><a href="#" class="navigation--link">Иллюстрации</a></li>-->
        <!--				<li><a href="#" class="navigation--link">новости</a></li>-->
        <!--				<li><a href="#" class="navigation--link">об авторе</a></li>-->
        <!--			</ul>-->
    </nav>
    <section class="main-content">
        <div class="row">