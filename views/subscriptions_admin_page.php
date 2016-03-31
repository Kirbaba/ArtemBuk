<table class="table table-responsive">
    <tr>
        <th>Номер заказа</th>
        <th>Пользователь</th>
        <th>Дата покупки</th>
        <th>Длительность подписки</th>
        <th>Цена</th>
        <th>Статус</th>
        <th>Действия</th>
    </tr>
    <?php foreach($subscriptions as $sub){
        $user = get_userdata($sub['user_id']);
        ?>
        <tr>
            <td ><p><?= $sub['order_num']; ?></p></td>
            <td ><p><?= $user->user_login; ?></p></td>
            <td ><p>
                    <?php echo rus_date("j F Y", $sub['duration']); ?>
                </p>
            </td>
            <td ><p><?php echo $sub['type']; ?> мес.</p></td>
            <td ><p><?php if($sub['status'] == 0){
                        echo "Не оплачено";
                    }elseif($sub['status'] == 1){
                        echo "Оплачено";
                    } ?></p></td>
            <td>
                <a href="/wp-admin/admin.php?page=subscriptions&del=<?=$sub['id']?>">Удалить</a>
            </td>
        </tr>

    <?php } ?>
</table>