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
					<a href="#nowhere" class="single-category__item"  data-toggle="modal" data-target='#myModal'>
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

	<!-- Modal -->
	<div class="modal fade" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class=" page__scrolltext modal-content">	
	    	<!-- open .modal-content--img -->
	    	<div class="modal-content--img">
	    		<img src="<?php bloginfo('template_directory'); ?>/img/BG.png" alt="" />
	    	</div>
	    	<!-- close .modal-content--img -->
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium rem, est optio excepturi ipsum consequatur, ratione. Similique eaque ullam qui, voluptatibus, voluptas voluptates vel, asperiores harum fugit eveniet libero! Modi totam itaque minima sed beatae in perspiciatis blanditiis maxime atque distinctio est dolor eos nihil voluptatibus, cum voluptatum, eveniet sint odit veniam veritatis doloremque quam assumenda sapiente harum. Provident obcaecati facilis explicabo amet illo dolor, quaerat ipsum, ipsam optio repellat ex quo laboriosam dignissimos maiores repellendus nesciunt? Perferendis voluptas molestiae voluptate sapiente doloribus rem aperiam placeat natus esse dolor, vel maxime atque, in voluptatibus eos sequi autem architecto. Error repudiandae modi fuga dolorum magni asperiores porro consequuntur officiis saepe nam. Totam ipsum, veniam vero neque distinctio sint! Numquam hic tempora consequatur, sunt, corporis, dolores, omnis reprehenderit odio voluptates odit aspernatur quasi repellendus architecto! Sapiente totam, assumenda consectetur repudiandae nulla. Illo molestiae distinctio tempore nobis alias nam voluptates voluptatum dolor temporibus magni expedita eligendi, aperiam minus, quia cum quod quaerat dolorum delectus ipsa aliquid rerum porro deleniti perferendis! Saepe vitae corporis asperiores distinctio, sed quasi, harum quis iusto amet ex at ut magni ratione dolorem. Repudiandae, et neque. Ex vel a atque est, fugiat omnis molestiae rem eos. Qui laborum delectus, minima laboriosam inventore voluptas expedita ipsa ducimus labore suscipit voluptatem, odio optio ut ipsam quibusdam repellendus? Rem ullam laborum repellat, libero ex illum repellendus illo voluptates. Quibusdam minima odit, at. Provident deleniti ipsum voluptatem sapiente, quia numquam illo porro, ullam, et odit, veniam recusandae dolorum ea accusantium! Suscipit enim minima vel ipsa architecto, error vitae tempore optio. Quasi aliquid voluptas, vero. Odio recusandae quo quos asperiores, quam, consequatur blanditiis dignissimos laboriosam incidunt ipsa excepturi, vitae maiores consequuntur ab praesentium provident voluptate. Quidem earum quisquam impedit quibusdam animi, dicta culpa itaque. Error laboriosam itaque recusandae quos, vitae. Esse unde quas iusto labore neque, facilis magni similique dolore veniam obcaecati, in placeat vel voluptates. At, numquam sit totam nesciunt. Reiciendis est, maxime alias itaque. Sapiente fugit vitae voluptates beatae, asperiores, corrupti mollitia sequi porro blanditiis nostrum vel sit quia, explicabo maxime sed ducimus eveniet unde! Ullam esse, asperiores ex quam quasi neque vel quaerat, minus sapiente quis nihil iure iste quia perferendis vero odio eum rem minima, cumque fugiat. Fuga ipsa eum suscipit ut qui magni dolores ratione voluptatem ipsam possimus facilis aliquam, atque est tempore nostrum aspernatur tempora voluptatibus molestias asperiores doloribus. Quo cupiditate corrupti et tempora veniam, excepturi, enim! Commodi ducimus ad, soluta nihil eligendi, consequatur molestiae necessitatibus eos quibusdam accusamus minus quidem, dicta placeat quod itaque nobis! Reiciendis saepe possimus, minus, delectus deleniti blanditiis id, facere assumenda perferendis soluta autem consequatur error enim tenetur eos! Et atque, officiis aliquid quod nam, praesentium mollitia itaque minima a illum modi maxime molestiae tempora soluta nihil, dolorem quis, dolores cumque. Accusantium consequatur dolor fugiat sequi explicabo reiciendis ratione omnis consectetur veritatis tempore molestias sint neque, quaerat praesentium! Ipsa distinctio, similique ducimus possimus numquam animi ipsam ratione reiciendis dolorum commodi delectus expedita culpa error quis provident laudantium suscipit, perspiciatis quos soluta, dolorem voluptate.</p>
	        <div class="preloader"></div>	     
	  </div>
	</div>	
<?get_footer()?>