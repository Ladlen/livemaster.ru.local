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
                            $("#list .row[data-id=" + id + "] div." + name).html(value);
                        }
                        else
                        {
                            var content = $("#list .row[data-id=" + id + "] div." + name).html(value);
                            $("#list .row[data-id=" + id + "] input." + name).html(content);
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
            }
        ).blur(function () {
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
              --><input type="text" value="<?php echo $user->name ?>" class="name" maxlength="30" style="display:none"/>

                <div class="name"><?php echo $user->name ?></div>
                <!--
                              --><input type="text" value="<?php echo $user->age ?>" class="age" maxlength="30" style="display:none"/>

                <div class="age"><?php echo $user->age ?></div>
                <!--
                              --><input type="text" value="<?php echo $user->city_id ?>" class="city" disabled="disabled"/><!--
              --><input type="button" value="Удалить" class="delete"/>
            </div>
        <?php endforeach ?>
    </div>
</div>


