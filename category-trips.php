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
				<?php
					$catid = get_query_var('cat');
					$subcats = get_categories(array(
						'parent' => $catid,
						'hide_empty' => false,
					));

					if(!empty($subcats)){
						foreach ($subcats as $subcat) {?>
							<a href="<?php echo get_category_link( $subcat->term_id ); ?>" class="category__item">
								<span class="category__item--wrap">
									<img src="<?php echo z_taxonomy_image_url($subcat->term_id); ?>" alt="">
									<span class="category__item--title"><?php echo $subcat->name; ?></span>
								</span>
							</a>
						<?php }
					}
				?>
				<div class="preloader"></div>
			</div>
		</div>
	</div>

<?get_footer()?>