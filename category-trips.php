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
				<!--<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/@Elf@.jpg" alt="">
					<span class="category__item--title">Советы начинающим</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo2.jpg" alt="">
					<span class="category__item--title">Мои мечты и планы</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo3.jpg" alt="">
					<span class="category__item--title">Водопады Игуассу</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo4.jpg" alt="">
					<span class="category__item--title">Ниагарский водопад</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo5.jpg" alt="">
					<span class="category__item--title">Чичен-Итца,Тулум, Коба, Исапа</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo6.jpg" alt="">
					<span class="category__item--title">Карибы</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo7.jpg" alt="">
					<span class="category__item--title">Индия</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo8.jpg" alt="">
					<span class="category__item--title">Австралия и Новая Зеландия</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo9.jpg" alt="">
					<span class="category__item--title">Мачу Пикчу</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo10.jpg" alt="">
					<span class="category__item--title">Каньоны США</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo11.jpg" alt="">
					<span class="category__item--title">Китай</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo12.jpg" alt="">
					<span class="category__item--title">Полинезия</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo13.jpg" alt="">
					<span class="category__item--title">Любимые города и замки Европы</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo14.jpg" alt="">
					<span class="category__item--title">Норвегия и Фареры</span>
				</span>
				</a>
				<a href="#" class="category__item">
				<span class="category__item--wrap">
					<img src="<?php bloginfo('template_directory'); ?>/img/photo15.jpg" alt="">
					<span class="category__item--title">Испания</span>
				</span>
				</a>-->
				<div class="preloader"></div>
			</div>
		</div>
	</div>

<?get_footer()?>