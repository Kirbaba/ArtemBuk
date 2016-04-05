<? get_header();
// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = "Worlds_by_Artem_Buk";
$mrh_pass1 = "dC78KA4WbmegMcHl89Fr";
$mrh_pass2 = "Ax1eW98LMW9f2LNfTnSL";
$mrh_test_pass1 = "123qwerty";
$mrh_test_pass2 = "XvkgG92wjKcV444QMbWN";

// номер заказа
// number of order
$inv_id = $_GET['n'];

// описание заказа
// order description
$inv_desc = "Оплата заказа №$inv_id";

// сумма заказа
// sum of order
$out_summ = $_GET['sum'];

$url = 'https://auth.robokassa.ru/Merchant/WebService/Service.asmx/CalcOutSumm?MerchantLogin='.$mrh_login.'&IncCurrLabel=YandexMerchantRIBR&IncSum='.$out_summ;
$xml = file_get_contents($url);
$feed = simplexml_load_string($xml);

if($feed->OutSum){
	$out_summ = $feed->OutSum;
}

// тип товара
// code of goods
if($_GET['dur']){
	$shp_item = $_GET['dur'];
}else{
	$shp_item = 1;
}


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
								"&Culture=$culture&Encoding=$encoding&IsTest=0'></script></html>";
							?>
							<?php
							print "<html><script language=JavaScript src='https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin=$mrh_login&Language=ru'></script></html>";
							?>

							<?php
							print "<html><script language=JavaScript src='https://auth.robokassa.ru/Merchant/WebService/Service.asmx/CalcOutSumm?MerchantLogin=$mrh_login&IncCurrLabel=YandexMerchantRIBR&IncSum=$out_summ'></script></html>";
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