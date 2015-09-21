<?php if (Session::get('loggedIn') == false):?>
    <h1>Вход</h1>
    <form action="<?=URL?>login/run" method="post">
        <ul id="form-login-container">
            <li>
                <label for="login">Логин</label>
                <input type="text" name="login" id="login">
            </li>
            <li>
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password">
            </li>
        </ul>
        <ul>
            <li>У вас нет аккаунта? <a href="<?=URL?>registration">Регистрация</a></li>
            <li><input type="submit" value="Вход"></li>
        </ul>
    </form>
<?php else: ?>
    <h1>Вы вошли как <?=Session::get('login')?></h1>
<?php endif; ?>