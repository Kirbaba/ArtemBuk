<? get_header() ?>

	<div class="col-xs-4 col-xs-push-8">
		<div class="welcome">
			<div class="welcome__head">
				<h4>Добро пожаловать на сайт писателя и путешественника Артема Бука!</h4>
			</div>
			<div class="welcome__box">
				<p>Заинтересовала серия «Революция крови»? Просто нажмите <a href="/category/read/">«Читать книги».</a></p>
				<p>В идиллическом мире будущего полицейский охотится на убийц своей подруги. 
				Сможет ли он выжить в битве с могущественными тайными силами, и какую цену придется заплатить за месть? 
				Выскажитесь о прочитанном в разделе <a href="/forum">«Форум»</a> и на страницах автора <a href="#">в соцсетях.</a></p>
				<p>Любите ездить по миру или мечтаете об этом – загляните в раздел <a href="/category/trips/">«Путешествия»</a>.
				Полезные советы по организации самостоятельной поездки.</p>
			</div>
		</div>
	</div>
	<div class="col-xs-8 col-xs-pull-4">
		<div class="row">
			<div class="page__wrapper">
				<div class="page__head">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
					</div>
				</div>
				<div class="page__body page__body--wrap page__scrolltext read buyabook">
					<?php echo do_shortcode('[products]'); ?>
					<!-- close .page-buyabook__row -->
					<div class="preloader"></div>
				</div>
			</div>		
		</div>
	</div>
<?get_footer()?>