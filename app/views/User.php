<?php
define('CLICK_TO_MOD', '������� ����� �������������');
#print_r($model);
?>

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
                            //var content = $("#list .row[data-id=" + id + "] div." + name).text(value);
                            //$("#list .row[data-id=" + id + "] input." + name).text(content);
                            //$("#list .row[data-id=" + id + "] div." + name).click();

                            var oldValue = $("#list .row[data-id=" + id + "] div." + name).text();
                            $("#list .row[data-id=" + id + "] input." + name).val(oldValue);

                            var msg = '��������� ������ ����������:\n' + data.messages.join('\n');
                            alert(msg);

                            $("#list .row[data-id=" + id + "] div." + name).hide();
                            $("#list .row[data-id=" + id + "] input." + name).show();
                            $("#list .row[data-id=" + id + "] input." + name).focus();
                        }
                    }
                });
            },

            updateCity: function(name, value, id) {
                var data = {"name": name, "value": value, "id": id};
                $.ajax({type: "POST",
                    dataType: "json",
                    url: "?action=update",
                    data: data,
                    success: function(data)
                    {
                        if(data.success)
                        {
                            var cityName = $("#list .row[data-id=" + id + "] select." + name + " option:selected").text();
                            $("#list .row[data-id=" + id + "] div." + name).text(cityName);
                        }
                        else
                        {
                            var content = $("#list .row[data-id=" + id + "] div." + name).text(value);
                            $("#list .row[data-id=" + id + "] select." + name).text(content);
                            alert('��������� ������ ����������');
                        }
                    }
                });
            }
        }

        $('#list div.name, #list div.age').click(function () {
            var theClass = $(this).attr('class');
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] div." + theClass).hide();
            $("#list .row[data-id=" + dataId + "] input." + theClass).show();
            $("#list .row[data-id=" + dataId + "] input." + theClass).focus();
        });

        $('#list input.name, #list input.age').blur(function () {
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

        $('#list input.age').keyup(function () {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });

        $('#list div.city_id').click(function () {
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] div.city_id").hide();
            $("#list .row[data-id=" + dataId + "] select.city_id").show();
            $("#list .row[data-id=" + dataId + "] select.city_id").focus();
        });
        $('#list select.city_id').blur(function () {
            var theClass = $(this).attr('class');
            var dataId = $(this).parent().attr('data-id');
            $("#list .row[data-id=" + dataId + "] select.city_id").hide();
            $("#list .row[data-id=" + dataId + "] div.city_id").show();
            userList.updateCity(theClass, $(this).val(), dataId);
        }).keydown(function (e) {
            if (e.keyCode == 13) {
                var dataId = $(this).parent().attr('data-id');
                $("#list .row[data-id=" + dataId + "] select.city_id").blur();
            }
        });

        $('#create_user').click(function () {
            $("#new_user").show();
            $("#create_user").hide();
        });

        $('#new_user .delete').click(function () {
            var data = {"name": $("#new_user .name").val(), "age": $("#new_user .age").val(), "city": $("#new_user .city_id option:selected").val()};
            $.ajax({type: "POST",
                dataType: "json",
                url: "?action=createNewUser",
                data: data,
                success: function(data)
                {
                    if(data.success)
                    {
                        location.reload();
                    }
                    else
                    {
                        var msg = '�� ������� ������� ������������:\n' + data.messages.join('\n');
                        alert(msg);
                    }
                }
            });
        });

    });
</script>

<div id="user_list">
    <div id="header">
        <div class="row">
            <div class="id">ID</div><!--
            --><div class="name">���</div><!--
            --><div class="age">�������</div><!--
            --><div class="city_id">�����</div><!--
            --><div class="delete">�������</div>
        </div>
    </div>
    <div id="list">
        <?php if (!count($model)): ?>
            <div id="no_users">��� �������������</div>
        <?php endif ?>
        <?php foreach ($model as $user): ?>
            <div class="row" data-id="<?php echo $user->id ?>">
                <div class="id"><?php echo htmlspecialchars($user->id, ENT_QUOTES, DOCUMENT_ENCODING) ?></div><!--
              --><input type="text" value="<?php echo htmlspecialchars($user->name, ENT_QUOTES, DOCUMENT_ENCODING) ?>" class="name" maxlength="30" style="display:none"/><!--
              --><div class="name" title="<?php echo CLICK_TO_MOD ?>"><?php echo $user->name ? htmlspecialchars($user->name, ENT_QUOTES, DOCUMENT_ENCODING) : '&nbsp;' ?></div><!--
              --><input type="text" value="<?php echo $user->age ?>" class="age" maxlength="3" style="display:none"/><!--
              --><div class="age" title="<?php echo CLICK_TO_MOD ?>"><?php echo htmlspecialchars($user->age, ENT_QUOTES, DOCUMENT_ENCODING) ?></div><!--
              --><div class="city_id" title="<?php echo CLICK_TO_MOD ?>"><?php echo ($user->city_id == 0) ? '����� �� ������' : $user->city_name ?></div><!--
              --><select style="display:none" class="city_id">
                    <option value="0" <?php echo ($user->city_id == 0) ? 'selected="selected"' : ''; ?>>����� �� ������</option>
                    <?php foreach($cities as $city): ?>
                        <option value="<?php echo $city->id ?>" <?php
                        if($user->city_id == $city->id)
                        {
                            echo 'selected="selected"';
                        }
                        ?>><?php echo htmlspecialchars($city->name, ENT_QUOTES, DOCUMENT_ENCODING) ?></option>
                    <?php endforeach ?>
                </select><!--
                <input type="text" value="<?php echo $user->city_id ?>" class="city" disabled="disabled"/>
              --><input type="button" value="�������" class="delete"/>
            </div>
        <?php endforeach ?>
    </div>
    <div id="new_user" style="display: none;">
        <div class="row caption">������� ������ ������ ������������:</div>
        <div class="row">
            <div class="id">&nbsp;</div>
            <input type="text" class="name"/>
            <input type="number" min="0" max="255" class="age" />
            <select class="city_id">
                <option value="0" selected="selected">����� �� ������</option>
                <?php foreach($cities as $city): ?>
                    <option value="<?php echo $city->id ?>"><?php echo htmlspecialchars($city->name, ENT_QUOTES, DOCUMENT_ENCODING) ?></option>
                <?php endforeach ?>
            </select>
            <input type="button" class="delete" value="�������"/>
        </div>
    </div>
    <button id="create_user">������� ������������</button>
</div>


