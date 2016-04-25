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
			<div class="page__body page__body--wrap page__scrolltext">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<a href="<?php echo get_the_permalink( get_the_ID() ); ?>" class="category__item">
						<span class="category__item--wrap">
							<?php the_post_thumbnail(); ?>
							<span class="category__item--title"><?php the_title(); ?></span>
						</span>
					</a>
				<?php endwhile; ?>
				<?php endif; ?>
				<div class="preloader"></div>
			</div>
		</div>
	</div>
<?get_footer()?>