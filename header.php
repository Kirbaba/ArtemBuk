<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE">
    </script>
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
	<div class="container">
		<header class="header">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="header--logo">
					<div class="header--logo--img">
						<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="">
					</div>
					<div class="header--logo--slogan">
						<h3>Революция крови разрушь старый мир</h3>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="header--title">
					<h1>артем бук</h1>
					<h2>фантастические миры</h2>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="header--enter">
					<a href="#" class="header--enter--but--active">Войти</a>
					<a href="#" class="header--enter--but">Зарегистрироваться</a>

					<div class="header--enter--form">
						<input type="text" class="header--enter--inp login" placeholder="Логин">
						<input type="password" class="header--enter--inp password" placeholder="Пароль">
						<div class="header--enter--form--btn">
							<a href="#"></a>
						</div>
					</div>
				</div>
			</div>				
		</header>	

		<article class="commercial">		
		</article>	

		<nav class="navigation">
			<ul>
				<?php
				$nav = wp_get_nav_menu_items('Главное');
				foreach ( $nav as $nav_item ) {
					echo '<li><a href="' . $nav_item->url . '" class="navigation--link">' . $nav_item->title . '</a></li>';
				}
				?>
			</ul>
			<ul>
				<li><a href="#" class="navigation--link">читать книги </a></li>
				<li><a href="#" class="navigation--link">купить книги</a></li>
				<li><a href="#" class="navigation--link">Критика и отзывы</a></li>
				<li><a href="#" class="navigation--link">Блог и форум</a></li>
				<li><a href="#" class="navigation--link">путешествия </a></li>
				<li><a href="#" class="navigation--link">Иллюстрации</a></li>
				<li><a href="#" class="navigation--link">новости</a></li>
				<li><a href="#" class="navigation--link">об авторе</a></li>
			</ul>
		</nav>
		<section class="main-content">
			<div class="row">