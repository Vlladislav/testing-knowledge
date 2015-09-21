<h1>Создать тест</h1>
<div class="wrapper">
    <form action="<?=URL?>development/create" method="post">
        <div id="createTest">
            <ul>
                <li>
                    <label for="last_name">Название теста</label>
                    <input type="text" name="test[title]" id="title" value="">
                    <span></span>
                </li>
            </ul>
        </div>
        <div id="submit-container">
            <input type="submit" id="submit" value="Создать">
            <span id="message"></span>
        </div>
    </form>
</div>
<table>
<tr><th>#</th><th>Название</th><th>Автор</th><th>Добавить вопрос</th><th>Редактивровать</th><th>Удалить</th></tr>
<?php
     foreach($this->testList as $key => $value) {
        echo '<tr>
                <td>' . $value['test_id'] . '</td>
                <td><a href="'.URL.'question/view/'.$value['test_id'].'">' . $value['title'] . '</a></td>
                <td>' . $value['fio'] . '</td>
                <td><a href="'.URL.'question/add/'.$value['test_id'].'">Добавить</a></td>
                <td><a href="'.URL.'development/edit/'.$value['test_id'].'">Изменить</a></td>
                <td><a href="'.URL.'development/delete/'.$value['test_id'].'">Удалить</a></td>
             </tr>';
     }
?>
</table>