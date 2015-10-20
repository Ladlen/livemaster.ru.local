<script type="text/javascript">
    $(function () {
        var userList = {
            update: function(name, value, id) {
                var data = {"name": name, "value": value, "id": id};
                $.ajax({type: "POST",
                    dataType: "json",
                    url: "?action=update",
                    data: data,
                    success: function(data)
                    {
                        if(data.success)
                        {
                            $("#list .row[data-id=" + id + "] div." + name).text(value);
                        }
                        else
                        {
                            var content = $("#list .row[data-id=" + id + "] div." + name).text(value);
                            $("#list .row[data-id=" + id + "] input." + name).text(content);
                            alert('Произошла ошибка обновления');
                        }
                    }
                });
            }
        }

        $('#list .name, #list .age').click(function () {
            var theClass = $(this).attr('class');
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] div." + theClass).hide();
            $("#list .row[data-id=" + dataId + "] input." + theClass).show();
            $("#list .row[data-id=" + dataId + "] input." + theClass).focus();
        }).blur(function () {
            var theClass = $(this).attr('class');
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] input." + theClass).hide();
            $("#list .row[data-id=" + dataId + "] div." + theClass).show();
            userList.update(theClass, $(this).val(), dataId);
        }).keyup(function (e) {
            if (e.keyCode == 13) {
                var theClass = $(this).attr('class');
                var dataId = $(this).parent().attr('data-id');
                $("#list .row[data-id=" + dataId + "] input." + theClass).blur();
            }
        });

        $('#list .city').click(function () {
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] div.city").hide();
            $("#list .row[data-id=" + dataId + "] input.city").show();
            $("#list .row[data-id=" + dataId + "] input.city").focus();
        }).blur(function () {
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] input.city").hide();
            $("#list .row[data-id=" + dataId + "] div.city").show();
            userList.update(theClass, $(this).val(), dataId);
        }).keyup(function (e) {
            if (e.keyCode == 13) {
                var dataId = $(this).parent().attr('data-id');
                $("#list .row[data-id=" + dataId + "] input.city").blur();
            }
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
                <div class="id"><?php echo htmlspecialchars($user->id, ENT_QUOTES, 'cp1251') ?></div><!--
              --><input type="text" value="<?php echo $user->name ?>" class="name" maxlength="30" style="display:none"/><!--
              --><div class="name"><?php echo htmlspecialchars($user->name, ENT_QUOTES, 'cp1251') ?></div><!--
              --><input type="text" value="<?php echo $user->age ?>" class="age" maxlength="30" style="display:none"/><!--
              --><div class="age"><?php echo htmlspecialchars($user->age, ENT_QUOTES, 'cp1251') ?></div><!--
              --><div class="city"><?php echo $user->city_name ?></div>
                <select style="display:none" class="city">
                    <option value="0">Город не выбран</option>
                    <?php foreach($cities as $city): ?>
                        <option value="<?php echo $city->id ?>" <?php
                        if($user->city_id == $city->id)
                        {
                            echo 'selected="selected"';
                        }
                        ?>><?php echo htmlspecialchars($city->name, ENT_QUOTES, 'cp1251') ?></option>
                    <?php endforeach ?>
                </select><!--
                <input type="text" value="<?php echo $user->city_id ?>" class="city" disabled="disabled"/>
              --><input type="button" value="Удалить" class="delete"/>
            </div>
        <?php endforeach ?>
    </div>
</div>


