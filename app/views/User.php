<?php
print_r($model);
exit;
?>
<div id="user_list">
    <div id="header">
        <div class="id">ID</div><div class="name">Имя</div><div class="age">Возраст</div><div class="city">Город</div>
    </div>
    <div id="list">
        <?php foreach ($userList as $user): ?>
            <input type="text" value="<?php echo $user['id']?>" class="id" disabled="disabled"/>
            <input type="text" value="<?php echo $user['name']?>" class="name" disabled="disabled"/>
            <input type="text" value="<?php echo $user['age']?>" class="age" disabled="disabled"/>
            <input type="text" value="<?php echo $user['city']?>" class="city" disabled="disabled"/>
        <?php endforeach ?>
</div>
</div>