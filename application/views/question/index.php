<h1>Список вопросов</h1>
<?php //var_dump($_SESSION); ?>
<table>
<?php
  //  var_dump($this->questionList);
     foreach($this->questionList as $key => $value) {
         echo '<tr><tr></tr>';
         
         echo '<td>Вопрос: ' . $value['title'] . '</td>';
         if ($value['description'] != 'null') {
         echo '<tr><td>' . $value['description'] . '</td></tr>';
         }
       // // echo '<td><a href="'. URL . 'note/edit/' . $value['noteid'].'">Edit</a></td>';
      // //  echo '<td><a class="delete" href="'. URL . 'note/delete/' . $value['noteid'].'">Delete</a></td>';
         echo '</tr>';
     }
?>
</table>