<?php get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="page__head">
					<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
						<?php if(function_exists('bcn_display'))
						{
							bcn_display();
						}?>
					</div>
				</div>
				<?php
				// retrieve all Attachments for the 'attachments' instance of post 123
				$attachments = new Attachments('attachments', get_the_ID());
				$data = $attachments->get_attachments();
				if(!empty($data)){
				//$half = count($data) / 2;
				$data = [];
				while ($attachments->get()) :
					$data[] = array(
						'url' => $attachments->url(),
						'title' => $attachments->field('title'),
						'caption' => $attachments->field('caption'),
					);
				endwhile;
				}
				?>
				<div class="page__body page__body--wrap page__scrolltext illustration wall">

						<?php if(!empty($data)){ foreach ($data as $item) { ?>
							<a class="illustration__item article" href="<?php echo $item['url']; ?>"
							   data-lightbox="example-set" data-title="<?php echo $item['caption']; ?>">
								
								<img class="example-image" src="<?php echo $item['url']; ?>" alt=""/>
								
							</a>
						<? }} ?>

					<div class="preloader"></div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
<?php get_footer() ?>