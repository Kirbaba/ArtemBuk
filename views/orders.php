<div class="row">
    <div class="col-lg-2"><p>Номер заказа</p></div>
    <div class="col-lg-3"><p>Товар:</p></div>
    <div class="col-lg-2"><p>Цена</p></div>
    <div class="col-lg-3"><p>Почта</p></div>
    <div class="col-lg-2"><p>Статус</p></div>
</div>
<?php foreach($orders as $order){
    $book = get_post($order['book_id']);
    ?>
<div class="row">
    <div class="col-lg-2"><p><?= $order['order_num']; ?></p></div>
    <div class="col-lg-3"><p>
            <a href="<?php echo $book->guid; ?>">"<?php echo $book->post_title; ?>"</a>
        </p></div>
    <div class="col-lg-2"><p><?php echo get_post_meta($order['book_id'], "price", 1); ?> р.</p></div>
    <div class="col-lg-3"><p><?= $order['email']; ?></p></div>
    <div class="col-lg-2"><p><?php if($order['status'] == 0){
                echo "Не оплачено";
            }elseif($order['status'] == 1){
                echo "Оплачено";
            } ?></p></div>
</div>

<?php } ?>