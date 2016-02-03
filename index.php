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
		<div class="">
			<header class="header">
				<div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-xs-12">
					<div class="header--title">
						<h1>артем бук</h1>
						<h2>фантастические миры</h2>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
					<li><a href="#" class="navigation--link">читать книги </a></li>
					<li><a href="#" class="navigation--link">купить книги</a></li>
					<li><a href="#" class="navigation--link">Критика и отзывы</a></li>
					<li><a href="#" class="navigation--link">Блог и форум</a></li>
					<li><a href="#" class="navigation--link">путешествия </a></li>
					<li><a href="#" class="navigation--link">Юриспруденция</a></li>
					<li><a href="#" class="navigation--link">новости</a></li>
					<li><a href="#" class="navigation--link">об авторе</a></li>
				</ul>
			</nav>

			<section class="main-content">
				<div class="row">
					<div class="col-lg-4 col-lg-push-8 col-md-4 col-md-push-8 col-sm-12 col-xs-12">
						<div class="welcome">
							<div class="welcome__head">
								<h4>Добро пожаловать на сайт писателя и путешественника Артема Бука!</h4>
							</div>
							<div class="welcome__box">
								<p>Здесь вы можете читать и обсуждать книги серии «Революция крови».</p>
								<p>Другие разделы сайта посвящены самостоятельным путешествиям, а также, да простят меня любители фантастики, актуальным проблемам правового регулирования финансовых рынков и правоохранительной деятельности.</p>
							</div>
						</div>
					</div>
  					<div class="col-lg-8 col-lg-pull-4 col-md-8 col-md-pull-4 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<a href="#" class="main-content__item">
									<span class="main-content__item__head">
										<h3>Революция крови</h3>
									</span>
									<span class="main-content__item__body">
										<p>Серия книг о мире возможного прошлого и вероятного будущего</p>
									</span>
								</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<a href="#" class="main-content__item">
									<span class="main-content__item__head">
										<h3>Путешествия</h3>
									</span>
									<span class="main-content__item__body about-author">
										<p>Путешествуйте по миру, пока от него еще что-то осталось :)</p>
									</span>
								</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<a href="#" class="main-content__item">
									<span class="main-content__item__head">
										<h3>Обсуждения</h3>
									</span>
									<span class="main-content__item__body">
										<p>Обсуждение книг, путешествий, и всего и вся вокруг :)</p>
									</span>
								</a>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<a href="#" class="main-content__item">
									<span class="main-content__item__head">
										<h3>Об авторе</h3>
									</span>
									<span class="main-content__item__body">
										<p>Здесь вы сможете узнать больше о жизни автора</p>
									</span>
								</a>
							</div>
						</div>
  					</div>
				</div>
			</section>				
		</div>		
	</div>

	<footer class="footer">
		<div class="container">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<p>© “Артем Бук. Фантастические миры”</p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="footer--center">
					<a href="mailto:artembukworld@gmail.com">artembukworld@gmail.com</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<div class="footer--soc">
					<a href="#"><i class="fa fa-vk"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-odnoklassniki"></i></a>
				</div>
				
			</div>
		</div>
	</footer>
    
<?php wp_footer(); ?>
</body>
</html>