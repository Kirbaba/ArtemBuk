<? get_header();

$inv_id = $_GET['inv_id'];
$shp_item = $_GET['shp_item'];

set_order_status($inv_id,$shp_item);

?>
	<div class="col-xs-12">
		<div class="page__wrapper">
			<div class="page__head">
				<h4 class="align-center">Успешная оплата</h4>
			</div>
			<!-- open .page__scrolltext -->
			<div class="page__scrolltext page-subscription">
				<!-- open .buybook__wrap -->
				<div class="buybook__wrap">
					<!-- open .contain -->
					<div class="contain">
						<!-- open .enter -->
						<div class="payment-box">
							<h2>Спасибо за покупку!</h2>
							<p>Проверьте вашу почту.</p>
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