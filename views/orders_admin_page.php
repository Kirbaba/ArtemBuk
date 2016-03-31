<table class="table table-responsive">
    <tr>
        <th>Номер заказа</th>
        <th>Пользователь</th>
        <th>Товар</th>
        <th>Цена</th>
        <th>Email</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach($orders as $order){
        $book = get_post($order['book_id']);
        $user = get_userdata($order['user_id']);
        ?>
        <tr>
            <td ><p><?= $order['order_num']; ?></p></td>
            <td ><p><?= $user->user_login; ?></p></td>
            <td ><p>
                    <a href="<?php echo $book->guid; ?>">"<?php echo $book->post_title; ?>"</a>
                </p>
            </td>
            <td ><p><?php echo get_post_meta($order['book_id'], "price", 1); ?> р.</p></td>
            <td ><p><?= $order['email']; ?></p></td>
            <td ><p><?php if($order['status'] == 0){
                        echo "Не оплачено";
                    }elseif($order['status'] == 1){
                        echo "Оплачено";
                    } ?></p></td>
            <td>
                <a href="/wp-admin/admin.php?page=orders&del=<?=$order['id']?>">Удалить</a>
            </td>
        </tr>

    <?php } ?>
</table>