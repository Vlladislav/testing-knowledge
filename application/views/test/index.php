<h1>Список тестов</h1>
<?php// var_dump($_SESSION); ?>
<table>
<?php
    var_dump($this->testList);
    foreach($this->testList as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['last_name'] . '</td>';
        echo '<td>' . $value['title'] . '</td>';
        echo '<td><a href="'. URL . 'test/go/' . $value['test_id'].'">Пройти</a></td>';
        echo '</tr>';
    }
?>
</table>