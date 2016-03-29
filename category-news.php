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
			<div class="page__body page__scrolltext">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article class="page__scrolltext page__reviews__item ">
						<div class="preloader"></div>
						<h4><? the_title(); ?></h4>
						<p><?php the_content(); ?></p>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
				<div class="preloader"></div>
			</div>

		</div>
	</div>
<? get_footer() ?>