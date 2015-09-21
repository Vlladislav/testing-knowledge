<h1>Группы пользователей</h1>

<ul id="listGroup">
<?php foreach($this->groupList->listGroup as $value):?> 
<?=$value?>
<?php endforeach; ?>
</ul>

<ul id="listAction">
<?php foreach($this->groupList->listAction as $value):?> 
<?=$value?>
<?php endforeach; ?>
</ul>

<script type="text/javascript">
var group = document.getElementById("listGroup");
var listAction = document.getElementById("listAction");

function showInput(event) {   
    var target = event.target;
    
    if (target.tagName.toLowerCase() == 'span' && target.getAttribute('action').toLowerCase() == 'add') {
        if (document.getElementById("addForm") && document.getElementById("addEmpty")) {
            document.getElementById("addForm").remove();    
            document.getElementById("addEmpty").remove();  
        }
       var liAction = target.parentNode;
       var liGroup = group.querySelector('li[data="' + liAction.getAttribute('data') + '"]')
       
       var liEmpty = liAction.cloneNode(false);
       var liInput = liGroup.cloneNode(false);
       
       liEmpty.id = 'addEmpty';
       liInput.id = 'addForm';
       
       liEmpty.innerHTML = '&nbsp;';
       liInput.innerHTML = '<form method="post" action="groups/add/'+ liAction.getAttribute('data').toLowerCase() +'"> \
                                <input type=text name=nameGroup> \
                            </form>';
                            
       liAction.parentNode.insertBefore(liEmpty, liAction.nextSibling);
       liGroup.parentNode.insertBefore(liInput, liGroup.nextSibling); 
    }
}

listAction.addEventListener("click", showInput, false);
</script>