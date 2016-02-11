<? get_header() ?>
<div class="col-xs-12">
	<div class="page__wrapper">
		<div class="page__head">
			<h3><?php the_title(); ?></h3>
		</div>
		<div class="page__body page__body--wrap registration">
			<?php echo do_shortcode('[registration_form]'); ?>
		</div>
	</div>
</div>
<?get_footer()?>