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
				<?php query_posts( array( 'posts_per_page' => -1, 'category_name' => 'read' ) ); ?>
				<?php $i = 0; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if($i==4){?>

						<a href="/store/%D1%80%D0%B5%D0%B2%D0%BE%D0%BB%D1%8E%D1%86%D0%B8%D1%8F-%D0%BA%D1%80%D0%BE%D0%B2%D0%B8/" class="category__item">
						<span class="category__item--wrap">
							<img src="<?php bloginfo('template_directory'); ?>/img/adress-book-1.png" alt="">
							<span class="category__item--title">Скачать книги</span>
						</span>
						</a>
					<?php } ?>
					<a href="" class="category__item js-read-modal" data-toggle="modal" data-target="#myModal" data-id="<?php echo get_the_ID(); ?>">
						<span class="category__item--wrap">
							<?php the_post_thumbnail(); ?>
							<span class="category__item--title"><?php the_title(); ?></span>
						</span>
					</a>
					<?php $i++; ?>
				<?php endwhile; ?>
				<?php  endif;?>
				<div class="preloader"></div>
			</div>
		</div>
	</div>
<!-- Modal -->
	<div class="modal fade" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class=" page__scrolltext modal-content grey-text">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
	    	<!-- open .modal-content--img -->
			<div class="js-read-modal-content">

			</div>
	    	<div class="preloader"></div>
	  </div>
	</div>	
<?get_footer()?>