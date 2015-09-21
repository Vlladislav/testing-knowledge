<h1>Добавить вопрос</h1>

<?php
//var_dump($this->user);
?>

<div class="wrapper">
    <form action="<?=URL?>question/add/<?=$this->id?>" method="post">
        <fieldset>
            <ul>
                <li>
                    <label for="title">Вопрос:</label>
                    <input type="text" name="question[title]" id="title">
                    <span></span>
                </li>
                <li>
                    <label for="description">Дополнение:</label>
                    <input type="text" name="question[description]" id="description">
                    <span></span>
                </li>
                <li>
                    <label for="type">Тип вопроса</label>
                    <select name="question[type]" id="type">
                        <option value="1" selected>Альтернативный выбор</option>
                        <option value="2">Множественный выбор</option>
                    </select>
                </li>
            </ul>
        </fieldset>
        <fieldset>
            <legend>Ответы</legend>
            <div id="variantAnswer">
            </div>
            <div>
                <input id="addAnswer" type="button" value="Добавить ответ">
            </div>           
        </fieldset>
        <div id="submit-container">
            <input type="submit" id="submit" value="Готово">
        </div>
    </form>
</div>
<script type="text/javascript">  
var answer = document.getElementById("variantAnswer");
var type = document.getElementById("type");
var addAnswer = document.getElementById("addAnswer");
var ul = document.createElement('ul');
answer.appendChild(ul); 

var typeQuestion = {
    count: 0,
    single: function() {
        var radio = document.createElement('li');
        radio.innerHTML = '<input type="radio" name="variants[' + this.count + '][is_correct]" value="true"> \
                           <input type="text" name="variants[' + this.count + '][answer]">';
        answer.firstElementChild.appendChild(radio);
        this.count++;
    },
    multiple: function() {
        var checkbox = document.createElement('li');
        checkbox.innerHTML = '<input type="checkbox" name="variants[' + this.count + '][is_correct]" value="true"> \
                              <input type="text" name="variants[' + this.count + '][answer]">';
        answer.firstElementChild.appendChild(checkbox);
        this.count++;
    },
    chooseType: function() {
        if (type.value == 1) {
            this.single();   
        } else if (type.value == 2) {
            this.multiple(); 
        } 
    },
}

typeQuestion.chooseType();

function removeLi(elem) {
    while (elem.lastChild) {
        elem.removeChild(elem.lastChild);
    }
}

type.onchange = function(e) {
    removeLi(ul);
    typeQuestion.count = 0;
    typeQuestion.chooseType();
}

addAnswer.onclick = function(e) {
    typeQuestion.chooseType();
}
</script>