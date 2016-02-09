<? get_header() ?>
<div class="col-xs-12">
	<div class="page__wrapper">
		<div class="page__head">
			<h3><?php the_title(); ?></h3>
		</div>
		<div class="page__body page__body--wrap registration">
			<p class="necessarily"><span class="mag">*</span> Обязательное поле</p>
			<div class="registration--left">		
				<label for="registration--name">Имя *</label>		
				<input type="text" class="registration--inp" id="registration--name" name="registration--name" placeholder="Введите имя ...">
				<label for="registration--login">Логин *</label>
				<input type="text" class="registration--inp"  id="registration--login" name="registration--login" placeholder="Введите логин ...">
				<label for="registration--pas">Пароль *</label>
				<input type="password" class="registration--inp" id="registration--pas" name="registration--pas" placeholder="Введите пароль ...">
			</div>
			<div class="registration--right">				
				<label for="registration--pas-2">Повторите пароль *</label>
				<input type="password" class="registration--inp" id="registration--pas-2" name="registration--pas-2" placeholder="Введите пароль ...">
				<label for="registration--mail">Адрес электронной почты *</label>
				<input type="email" class="registration--inp" id="registration--mail" name="registration--mail" placeholder="Введите адрес электронной почты ...">
				<label for="registration--mail-2">Подтверждение адреса электронной почты *</label>
				<input type="email" class="registration--inp" id="registration--mail-2" name="registration--mail-2" placeholder="Введите адрес электронной почты ...">

				<div class="registration--btns">
					<input type="button" value="Регистрация" class="registration--btns--regist">
					<small>или</small>
					<a href="#" class="registration--btns--exit">Отмена</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?get_footer()?>