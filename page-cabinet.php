<? get_header() ?>
<?php if(is_user_logged_in()){?>
<?php $current_user = wp_get_current_user(); ?>
<?php $info = get_userdata($current_user->ID); ?>
<?php $meta = get_user_meta($current_user->ID); ?>

	<!-- open .col-xs-3 -->
	<div class="col-xs-3">
		<!-- open .page__wrapper -->
		<div class="page__wrapper">
			<div class="welcome__head page-cabinet--head">
				<h4>Личный кабинет</h4>
			</div>
			<!-- open .page__scrolltext -->
			<div class="page__scrolltext page-cabinet--aside">
				 <!-- Nav tabs -->
				<ul id="tabs" class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Профиль</a></li>
					<li role="presentation"><a href="#subscription" aria-controls="subscription" role="tab" data-toggle="tab">Подписки</a></li>
					<li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Заказы</a></li>
					<!--<li role="presentation"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Сообщения</a>
						<ul class="dropdown-menu">
					      	<li><a href="#">Входящие</a></li>
		      				<li><a href="#">Отправленные</a></li>
			      			<li><a href="#">Написать новое</a></li>	
			      			<li><a href="#">Черновик</a></li>				      				
					    </ul>
					</li>-->
				</ul>


			</div>
			<!-- close .page__scrolltext -->
		</div>
		<!-- close .page__wrapper -->
		
	</div>
	<!-- close .col-xs-3 -->
	<!-- open .col-xs-9 -->
	<div class="col-xs-9">
	<!-- open .page__wrapper -->
	<div class="page__wrapper">
		<!-- open .page__scrolltext -->
		<!-- open .page-cabinet__content--welcome -->
		<div class="page-cabinet__content--welcome">
			<p>Добро пожаловать, 
				<span class="name"><?php echo $info->data->display_name; ?></span>
				<span class="last">Последний вход: <i><?php echo new_time(strtotime(get_last_login($current_user->ID))); ?></i></span>
			</p>

		</div>
		<!-- close .page-cabinet__content--welcome -->
		<div class="page__scrolltext page-cabinet__content--wrap">
			<div id="tabs-content" class="tab-content">
				<!--просмотр  профиля-->
			    <div role="tabpanel" class="tab-pane active" id="home">
					<div class="page__head">
						<h3>Профиль <a href="#edit" class="edit" role="tab" data-toggle="tab">Редактировать</a></h3>
					</div>
					<!-- open .page-cabinet__content--box -->
					<div class="page-cabinet__content--box">
						<!-- open .page-cabinet--avatar -->
						<div class="page-cabinet--avatar">
							<img src="<?php echo get_wp_user_avatar_src($current_user->ID); ?>" alt="">
						</div>
						<!-- open .page-cabinet--information -->
						<div class="page-cabinet--information">


							<p>Проживание: <span>
									<?php
									if(isset($meta['living_place'][0]) && !empty($meta['living_place'][0])){
										echo $meta['living_place'][0];
									}else{
										echo "не указано";
									}
									?>
								</span></p>
							<p>Пол: <span><?php
									if(isset($meta['gender'][0]) && !empty($meta['gender'][0])){
										if($meta['gender'][0] == 'male'){
											echo 'Мужской';
										}elseif($meta['gender'][0] == 'female'){
											echo 'Женский';
										}
									}else{
										echo "не указан";
									}
									?></span></p>
							<p>Дата рождения: <span>
									<?php
									if(isset($meta['bday'][0]) && !empty($meta['bday'][0])){
										$newDate = rus_date("j F Y", strtotime($meta['bday'][0]));
										echo $newDate;
									}else{
										echo "не указана";
									}
									?>
								</span></p>

							<p>Зарегистрирован: <span><?php $newDate = rus_date("j F Y", strtotime($info->data->user_registered)); echo $newDate;  ?></span></p>
							<p>Статус подписки: <span>
									<?php echo get_subscription_end($current_user->ID); ?>
								</span></p>
						</div>
						<!-- close .page-cabinet--information -->
						<!-- close .page-cabinet--avatar -->
					</div>

			    </div>
				<!---->
			    <div role="tabpanel" class="tab-pane" id="subscription">
					<div class="page__head">
						<h3>Подписки <a href="#home" class="edit" role="tab" data-toggle="tab">Профиль</a></h3>
					</div>
					<!-- close .page-cabinet__content--box --><!-- open .page-cabinet__content--box -->
					<div class="page-cabinet__content--box">
						<?php get_user_subscription($current_user->ID); ?>
					</div>
				</div>
				<!---->
			    <div role="tabpanel" class="tab-pane" id="orders">
					<div class="page__head">
						<h3>Заказы <a href="#home" class="edit" role="tab" data-toggle="tab">Профиль</a></h3>
					</div>

					<!-- close .page-cabinet__content--box --><!-- open .page-cabinet__content--box -->
					<div class="page-cabinet__content--box">
						<?php get_user_orders($current_user->ID); ?>
					</div>
				</div>
				<!--редактирование профиля-->
				<div role="tabpanel" class="tab-pane" id="edit">
					<div class="page__head">
						<h3>Редактирование профиля <a href="#home" class="edit" role="tab" data-toggle="tab">Профиль</a></h3>
					</div>
					<!-- close .page-cabinet__content--box --><!-- open .page-cabinet__content--box -->
					<div class="page-cabinet__content--box">
						<div class="entry-content entry">
							<form method="post" id="adduser" action="<?= get_bloginfo('url'); ?>/wp-admin/admin-post.php?action=update_user" enctype="multipart/form-data">
								<label for="nickname">Ник</label>
								<input type="text" name="nickname" id="nickname" class="buybook--inp" value="<?php echo $info->data->display_name; ?>" /><br />
								<label for="user_email">Почта</label>
								<input type="text" name="user_email" id="user_email" class="buybook--inp" value="<?php echo $info->data->user_email; ?>" /><br />
								<label for="gender">Пол</label>
								<input type="radio" name="gender" id="gender" class="" <?php if($meta['gender'][0] == 'male'){ echo 'checked';} ?> value="male" /> Мужской<br />
								<input type="radio" name="gender" id="gender" class="" <?php if($meta['gender'][0] == 'female'){ echo 'checked';} ?> value="female" /> Женский<br />
								<label for="bday">День рождения</label>
								<input type="date" name="bday" id="bday" class="buybook--inp" value="<?php echo $meta['bday'][0]; ?>" /><br />

								<label for="living_place">Место проживания</label>
								<input type="text" name="living_place" id="living_place" class="buybook--inp" value="<?php echo $meta['living_place'][0]; ?>" /><br />
								<label for="new_password">Новый пароль</label>
								<input type="password" name="new_password" id="new_password" class="buybook--inp" value="" /><br />
								<label for="new_password_repeat">Повторите пароль</label>
								<input type="password" name="new_password_repeat" id="new_password_repeat" class="buybook--inp" value="" /><br />
								<label for="avatar">Аватар</label>
								<img id="current_avatar" src="<?php echo get_wp_user_avatar_src($current_user->ID); ?>" alt="">
								<input type="file" name="avatar" id="avatar" class="buybook--inp">
								<input type="hidden" name="user_id" id="user_id" class="" value="<?php echo $current_user->ID; ?>">
								<input type="submit" value="Сохранить" class="buybook--sub">
								<input type="reset" value="Отмена" class="buybook--sub">
							</form><!-- #adduser -->
						</div><!-- .entry-content -->
					</div><!-- .hentry .post -->
					<!-- close .page-cabinet__content--box -->
				</div>
			</div>
		</div>
		<!-- close .page__scrolltext -->
	</div>
	<!-- close .page__wrapper -->
		
	</div>
	<!-- close .col-xs-9 -->
	<?php } ?>
<?get_footer()?>