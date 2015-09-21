<h1>Главная</h1>

<p>Добро пожаловать )))</p>
<h1>Вход</h1>

<form action="login/run" method="post">  
    <label>Логин</label><input type="text" name="login"><br>
    <label>Пароль</label><input type="password" name="password"><br>
    <label></label><input type="submit">
</form>
<?php var_dump($_SESSION); ?>