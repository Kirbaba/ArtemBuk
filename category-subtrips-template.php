<? get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<div class="page__head">
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
			</div>
			<div class="page__body page__body--wrap page__scrolltext single-category">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="single-category__item">
						<span class="single-category__item--img">
							<?php the_post_thumbnail(); ?>
						</span>
						<span class="single-category__item--desc"><?php the_content(); ?></span>
					</a>
				<?php endwhile; ?>
				<?php  endif;?>

				<!--<a href="#" class="single-category__item">
				<span class="single-category__item--img">
					<img class="" src="<?php bloginfo('template_directory'); ?>/img/photo8.jpg" alt="">
				</span>
					<span class="single-category__item--desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis accusantium autem, qui illo quidem ipsum!</span>
				</a>-->
				<div class="preloader"></div>
			</div>
		</div>
	</div>
<?get_footer()?>