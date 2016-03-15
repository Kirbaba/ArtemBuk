<? get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<div class="page__head">
				<h4 class="align-center">Покупка подписки</h4>
			</div>
			<!-- open .page__scrolltext -->
			<div class="page__scrolltext page-subscription">
				<?php if(is_user_logged_in()){ ?>
					<!-- open .subchoice__wrap -->
					<div class="subchoice__wrap">
						<form action="<?= get_bloginfo('url'); ?>/wp-admin/admin-post.php?action=add_order" method="post">
							<!-- open .subchoice__item -->
							<div class="subchoice__item">
								<!-- open .subchoice__item--month -->
								<div class="subchoice__item--month">
									<!-- open .month--blue -->
									<div class="month--blue">
										<h2>6</h2>
									</div>
									<!-- close .month--blue -->
									<h4>месяцев</h4>
								</div>
								<!-- close .subchoice__item--month -->
								<input type="hidden" name="subscription-duration" value="6">
								<input type="hidden" name="subscription-user_id" value="<?php echo get_current_user_id(); ?>">
								<input type="hidden" name="subscription-price" value="300">
								<button type="submit" class="subchoice__item--btn" value="1">Купить подписку за <span class='yellow'>300 руб</span></button>
							</div>
							<!-- close .subchoice__item -->
						</form>
						<form action="<?= get_bloginfo('url'); ?>/wp-admin/admin-post.php?action=add_order"  method="post">
							<!-- open .subchoice__item -->
							<div class="subchoice__item">
								<!-- open .subchoice__item--month -->
								<div class="subchoice__item--month">
									<!-- open .month--green -->
									<div class="month--green">
										<h2>12</h2>
									</div>
									<!-- close .month--green -->
									<h4>месяцев</h4>
								</div>
								<!-- close .subchoice__item--month -->
								<input type="hidden" name="subscription-duration" value="12">
								<input type="hidden" name="subscription-user_id" value="<?php echo get_current_user_id(); ?>">
								<input type="hidden" name="subscription-price" value="500">
								<button type="submit" class="subchoice__item--btn" value="1">Купить подписку за <span class='yellow'>500 руб</span></button>
							</div>
							<!-- close .subchoice__item -->
						</form>

					</div>
					<!-- close .subchoice__wrap -->
				<?php }else{ ?>
					<div class="subchoice__wrap">
						<h2>Для покупки подписки необходимо авторизоваться!</h2>
					</div>
				<?php } ?>
				<div class="preloader"></div>
			</div>
			<!-- close .page__scrolltext -->
		</div>
	</div>
<?get_footer()?>