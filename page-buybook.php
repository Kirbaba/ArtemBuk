<? get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<div class="page__head">
				<h4 class="align-center">Покупка книги</h4>
			</div>
			<!-- open .page__scrolltext -->
			<div class="page__scrolltext page-subscription">
				<!-- open .buybook__wrap -->
				<div class="buybook__wrap">
					<h4>Укажите адрес электронной почты, на который можно будет выслать книгу</h4>
					<form action="<?= get_bloginfo('url'); ?>/wp-admin/admin-post.php?action=add_order" method="POST">
						<input type="email" name="buybook--mail" class="buybook--inp" placeholder="Введите адрес электронной почты .."/>
						<input type="hidden" name="buybook--id" value="<?php echo $_GET['id']; ?>">
						<input type="hidden" name="buybook--sum" value="<?php echo $_GET['sum']; ?>">
						<input type="submit" class="buybook--sub" value="Подтвердить"/>
					</form>
				</div>
				<!-- close .buybook__wrap -->
				<div class="preloader"></div>
			</div>
			<!-- close .page__scrolltext -->
		</div>
	</div>
<?get_footer()?>