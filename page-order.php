<? get_header();

// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "lic";
$mrh_pass1 = "123qwerty";

// номер заказа
// number of order
$inv_id = $_GET['n'];

// описание заказа
// order description
$inv_desc = "Оплата заказа №$inv_id";

// сумма заказа
// sum of order
$out_summ = $_GET['sum'];

// тип товара
// code of goods
$shp_item = 1;

// язык
// language
$culture = "ru";

// кодировка
// encoding
$encoding = "utf-8";

// формирование подписи
// generate signature
$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:shp_Item=$shp_item");

// HTML-страница с кассой
// ROBOKASSA HTML-pag

?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<div class="page__head">
				<h4 class="align-center">Оплата заказа</h4>
			</div>
			<!-- open .page__scrolltext -->
			<div class="page__scrolltext page-subscription">
				<!-- open .buybook__wrap -->
				<div class="buybook__wrap">
					<!-- open .contain -->
					<div class="contain">
						<!-- open .enter -->
						<div class="payment-box">
							<p>Номер вашего заказа: <?= $_GET['n']; ?></p>
							<p>Сумма к оплате: <?= $_GET['sum']; ?></p>
							<?php
							print "<html><script language=JavaScript ".
								"src='https://auth.robokassa.ru/Merchant/PaymentForm/FormMS.js?".
								"MerchantLogin=$mrh_login&OutSum=$out_summ&InvoiceID=$inv_id".
								"&Description=$inv_desc&SignatureValue=$crc&shp_Item=$shp_item".
								"&Culture=$culture&Encoding=$encoding&IsTest=1'></script></html>";
							?>
						</div>
						<!-- close .enter -->
					</div>
					<!-- close .contain -->
				</div>
				<!-- close .buybook__wrap -->
				<div class="preloader"></div>
			</div>
			<!-- close .page__scrolltext -->
		</div>
	</div>
<?get_footer()?>