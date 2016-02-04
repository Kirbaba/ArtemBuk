<? get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page__head">
				<h3><?php the_title(); ?></h3>
			</div>
			<div class="page__body">
				<div class="col-xs-3">

				<a class="author__photo--item" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/>
				</a>
				<a class="author__photo--item" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard.">
					<img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" />
				</a>
				<a class="author__photo--item" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing.">
					<img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" />
				</a>
			     
				
				</div>
				<div class="col-xs-6">

					<article class="page__scrolltext">
						<div id="preloader"></div>
						<?php the_content(); ?>
					</article>
				</div>
				<div class="col-xs-3">
					<a class="author__photo--item" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
					<a href="<?php bloginfo('template_directory'); ?>/img/photo1.jpg" class="author__photo--item"  data-lightbox="example-set" >
						<img src="<?php bloginfo('template_directory'); ?>/img/photo1.jpg" alt="">
					</a>
					<a href="<?php bloginfo('template_directory'); ?>/img/photo1.jpg" class="author__photo--item" data-lightbox="example-set" >
						<img src="<?php bloginfo('template_directory'); ?>/img/photo1.jpg" alt="">
					</a>
				</div>
				
			</div>
		<?php endwhile; ?>
		<?php  endif;?> 
		</div>
	</div>
<? get_footer() ?>