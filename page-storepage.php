<? get_header() ?>

	<!--<div class="col-xs-4 col-xs-push-8">
		<div class="welcome ">
			<div class="welcome__head">
				<h4>Внимание!
					Запуск магазина ожидается 8 апреля 2016 года.
					Запуск платной подписки на продолжения серии ожидается 1 июня 2016 года.
				</h4>
			</div>
			<div class="welcome__box small-text">
				<p>Ознакомиться с моими книгами вы можете следующими способами:
					а) Прочитав онлайн в разделе «Читать книги» – это бесплатно.
					б) Скачав бесплатно часть романа, для чего кликните на иконку с обложкой, и нажмите «Скачать книгу».
					в) Приобретя электронную книгу в удобном вам формате.

					Для этого кликните на иконку с обложкой, и нажмите «Купить книгу».
					Введите адрес электронной почты, и нажмите «Подтвердить».
					Совершите безопасный платеж через сервис Robokassa одним из 40 доступных способов.
					Книга будет выслана на Вашу почту по завершении платежа автоматически.
					В случае технических проблем при платеже либо доставке – напишите владельцу сайта с приложением скриншота квитанции об оплате.
				</p>
			</div>
			<div class="placeholder"></div>
		</div>
	</div>-->
	<div class="col-xs-12">
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