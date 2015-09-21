<h1><?php echo $this->name[0]['title'];?></h1>
<?php// var_dump($_SESSION); ?>
<table>
<ul id="page">
<?php
   // var_dump($this->records);
    for($i=0; $i<count($this->records); $i++){
        echo '<li style="display:inline-block;"><a style="margin-right:10px;" href="' . $this->records[$i] . '">'.($i+1).'</a></li>';
    }
    $num=0;
    ?>
 </ul>   
 <div id="test"></div>
    <?php 
    shuffle($this->countRecords);
    foreach($this->countRecords as $key => $value): ?>
        <?php
            ++$num;
            switch ($value['type']) {
                case 'single':
                    $type = 'radio';
                    break;
                case 'multiple';
                    $type = 'checkbox';
                    break;
            }
        ?>
            <h2><?=$value['title']?></h2>
            <!--<?php// var_dump($this->model->listAnswers($value['question_id']));?>-->
            <?php foreach($this->model->listAnswers($value['question_id']) as $key => $value):?>
                <p><label><input type=<?=$type?> name="question_<?=$num?>"><?=$value['variant']?></label></p>
            <?php endforeach ?>
    <?php endforeach ?>

</table>
<script>
var page = document.getElementById('page');
var test = document.getElementById('test');

// 1. Создаём новый объект XMLHttpRequest
function testAjax(event){
    var target = event.target;
    event.preventDefault(); 
    if (target.tagName.toLowerCase() == 'a'){
        var xhr = new XMLHttpRequest();
        var body = '?id=' + target.getAttribute('href');
        xhr.open('GET', '/test/proba/'+ body, false);
        xhr.send();
        if (xhr.status != 200) {
            alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
        } else {
            test.innerHTML = xhr.responseText;
            var x= JSON.parse(xhr.responseText);
            alert(JSON.parse(xhr.responseText));
            console.log(JSON.parse(xhr.responseText)); // responseText -- текст ответа.
            alert(JSON.parse(xhr.responseText)[1]['variant']);
            alert(x[0]['title']);
        }
    }
}
page.addEventListener("click", testAjax, false);
</script>