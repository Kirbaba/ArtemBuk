<? get_header() ?>
<div class="col-xs-12">
	<div class="page__wrapper">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="page__head">
			<h3>Читать книги / <?php the_title(); ?></h3>
		</div>
		<div class="page__body page__body--wrap page__scrolltext read">			
			<?php the_content(); ?>
			<div class="preloader"></div>
		</div>
	<?php endwhile; ?>
	<?php  endif;?> 
	</div>
</div>
<?get_footer()?>