<? get_header() ?>
	<div class="col-xs-12">
		<div class="page__wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="page__head">
				<h3><?php the_title(); ?></h3>
			</div>
			<div class="page__body">
				<div class="col-xs-3">

				<a class="author__photo--item" href="https://pp.vk.me/c630317/v630317038/115d8/odPfTLjynQc.jpg" data-lightbox="example-set" data-title="Описание фото.">
					<img class="example-image" src="https://pp.vk.me/c630317/v630317038/115d8/odPfTLjynQc.jpg" alt=""/>
				</a>
				<a class="author__photo--item" href="https://pp.vk.me/c630317/v630317038/115e1/3J_ziGPF4Tg.jpg" data-lightbox="example-set" data-title="Описание фото.">
					<img class="example-image" src="https://pp.vk.me/c630317/v630317038/115e1/3J_ziGPF4Tg.jpg" alt="" />
				</a>
				<a class="author__photo--item" href="https://pp.vk.me/c629521/v629521038/2cafa/68MJBC7aXqY.jpg" data-lightbox="example-set" data-title="Описание фото.">
					<img class="example-image" src="https://pp.vk.me/c629521/v629521038/2cafa/68MJBC7aXqY.jpg" alt="" />
				</a>
			     
				
				</div>
				<div class="col-xs-6">

					<article class="page__scrolltext">
						<div class="preloader"></div>
						<?php the_content(); ?>
					</article>
				</div>
				<div class="col-xs-3">
					<a class="author__photo--item" href="https://pp.vk.me/c630317/v630317038/115cf/kx-QP50wnIo.jpg" data-lightbox="example-set" data-title="Описание фото.">
						<img class="example-image" src="https://pp.vk.me/c630317/v630317038/115cf/kx-QP50wnIo.jpg" alt="" />
					</a>
					<a href="https://pp.vk.me/c629521/v629521038/2cb03/nCWEXPdoPDc.jpg" class="author__photo--item"  data-lightbox="example-set" data-title="Описание фото.">
						<img src="https://pp.vk.me/c629521/v629521038/2cb03/nCWEXPdoPDc.jpg" alt="">
					</a>
					<a href="https://pp.vk.me/c630317/v630317038/11544/XNEK-1yNI4c.jpg" class="author__photo--item" data-lightbox="example-set" data-title="Описание фото.">
						<img src="https://pp.vk.me/c630317/v630317038/11544/XNEK-1yNI4c.jpg" alt="">
					</a>
				</div>
				
			</div>
		<?php endwhile; ?>
		<?php  endif;?> 
		</div>
	</div>
<? get_footer() ?>