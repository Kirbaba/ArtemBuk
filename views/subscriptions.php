<div class="row">
    <div class="col-lg-2"><p>Номер заказа: </p></div>
    <div class="col-lg-3"><p>Дата покупки:</p></div>
    <div class="col-lg-2"><p>Длительность подписки: </p></div>
    <div class="col-lg-3"><p>Цена</p></div>
    <div class="col-lg-2"><p>Статус</p></div>
</div>
<?php foreach($subscriptions as $sub){ ?>
<div class="row">
    <div class="col-lg-2"><p><?= $sub['order_num']; ?></p></div>
    <div class="col-lg-3"><p>
            <?php echo rus_date("j F Y", $sub['duration']); ?>
        </p></div>
    <div class="col-lg-2"><p><?php echo $sub['type']; ?> мес.</p></div>
    <div class="col-lg-3"><p><?= $sub['price']; ?> р.</p></div>
    <div class="col-lg-2"><p><?php if($sub['status'] == 0){
                echo "Не оплачено";
            }elseif($sub['status'] == 1){
                echo "Оплачено";
            } ?></p></div>
</div>

<?php } ?>

<div class="row">
    <div class="col-lg-12">
        <?php $duration = get_user_meta($subscriptions[0]['user_id'],'subscription_duration',1);?>
        <h4>Подписка оформлена до: <span><?php echo rus_date("j F Y", $duration); ?></span></h4>
    </div>
</div>
