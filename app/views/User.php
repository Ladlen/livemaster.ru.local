<?php
#print_r($model);
#exit;
?>

<script type="text/javascript">
    $(function() {
        $('#list .name').click(function () {
                //alert($(this).attr('data-id'));
                var dataId = $(this).parent().attr('data-id');
                //var typeClass = $(this).attr('class');
                //alert(typeClass);
                $("#list .row[data-id=" + dataId + "] div.name").hide();
                $("#list .row[data-id=" + dataId + "] input.name").show();
                $("#list .row[data-id=" + dataId + "] input.name").focus();
                //$("#list .row[data-id=" + dataId + "]").hide();
                //$("#list div.[data-id='" + dataId + "']").show();
            }
        ).blur(function(){
                var dataId = $(this).parent().attr('data-id');
                $("#list .row[data-id=" + dataId + "] input.name").hide();
                $("#list .row[data-id=" + dataId + "] div.name").show();
            });
    });
</script>

<div id="user_list">
    <div id="header">
        <div class="row">
            <div class="id">ID</div>
            <div class="name">Имя</div>
            <div class="age">Возраст</div>
            <div class="city">Город</div>
            <div class="delete">Удалить</div>
        </div>
    </div>
    <div id="list">
        <?php foreach ($model as $user): ?>
            <div class="row" data-id="<?php echo $user->id ?>">
                <input type="text" value="<?php echo $user->id ?>" class="id" disabled="disabled"/><!--
              --><input type="text" value="<?php echo $user->name ?>" class="name" style="display:none"/><div class="name"><?php echo $user->name ?></div><!--
              --><input type="text" value="<?php echo $user->age ?>" class="age" style="display:none"/><div class="age"><?php echo $user->age ?></div><!--
              --><input type="text" value="<?php echo $user->city_id ?>" class="city" disabled="disabled"/><!--
              --><input type="button" value="Удалить" class="delete"/>
            </div>
        <?php endforeach ?>
    </div>
</div>


