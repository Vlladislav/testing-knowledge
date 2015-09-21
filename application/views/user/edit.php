<h1>Редактировать учетную запись</h1>

<?php
var_dump($this->user);
?>

<div class="wrapper">
    <form action="<?=URL?>user/editSave/<?=$this->user['user_id']?>" method="post">
        <div id="from-registration-container">
            <ul>
                <li>
                    <label for="last_name">Фамилия</label>
                    <input type="text" name="registration[last_name]" id="last_name" value="<?=isset($this->user['last_name'])?$this->user['last_name'] : '';?>">
                    <span><?=isset($this->err['last_name'])?$this->err['last_name'] : '';?></span>
                </li>
                <li>
                    <label for="first_name">Имя</label>
                    <input type="text" name="registration[first_name]" id="first_name" value="<?=isset($this->user['first_name'])?$this->user['first_name'] : '';?>">
                    <span><?=isset($this->err['first_name'])?$this->err['first_name'] : '';?></span>
                </li>
                <li>
                    <label for="middle_name">Отчество</label>
                    <input type="text" name="registration[middle_name]" id="middle_name" value="<?=isset($this->user['middle_name'])?$this->user['middle_name'] : '';?>">
                    <span><?=isset($this->err['middle_name'])?$this->err['middle_name'] : '';?></span>
                </li>
                <li>
                    <label for="birthdate">Дата рождения</label>
                    <input type="text" name="registration[birthdate]" id="birthdate" value="<?=isset($this->user['birthdate'])?$this->user['birthdate'] : '';?>">
                    <span><?=isset($this->err['birthdate'])?$this->err['birthdate'] : '';?></span>
                </li>
                <li>
                    <label for="telephone">Телефон</label>
                    <input type="text" name="registration[telephone]" id="telephone" value="<?=isset($this->user['telephone'])?$this->user['telephone'] : '';?>">
                    <span><?=isset($this->err['telephone'])?$this->err['telephone'] : '';?></span>
                </li>
             </ul>
             <ul>
                <li>
                    <label for="login">Логин</label>
                    <input type="text" name="registration[login]" id="login" value="<?=isset($this->user['login'])?$this->user['login'] : '';?>">
                    <span><?=isset($this->err['login'])?$this->err['login'] : '';?></span>
                </li>
                <li>
                    <label for="password">Пароль</label>
                    <input type="password" name="registration[password]" id="password" value="<?=isset($this->user['password'])?$this->user['password'] : '';?>">
                    <span><?=isset($this->err['password'])?$this->err['password'] : '';?></span>
                </li>
                <li>
                    <label for="password_repeat">Повторите</label>
                    <input type="password" name="registration[password_repeat]" id="password_repeat" value="<?=isset($this->user['password_repeat'])?$this->user['password_repeat'] : '';?>">
                    <span><?=isset($this->err['password_repeat'])?$this->err['password_repeat'] : '';?></span>
                </li>
                <li>
                    <label for="role">Роль</label>
                    <select name="registration[role]" id="role">
                        <option value="user" <?php if($this->user['role'] == 'user') echo 'selected'; ?>>Пользователь</option>
                        <option value="administrator" <?php if($this->user['role'] == 'administrator') echo 'selected'; ?>>Администратор</option>
                        <option value="developer" <?php if($this->user['role'] == 'developer') echo 'selected'; ?>>Разработчик</option>
                    </select>
                    <span></span>
                </li>
                <li>
                    <label for="email_address">E-mail</label>
                    <input type="text" name="registration[email_address]" id="email_address" value="<?=isset($this->user['email_address'])?$this->user['email_address'] : '';?>">
                    <span><?=isset($this->err['email_address'])?$this->err['email_address'] : '';?></span>
                </li>
             </ul>
        </div>
        <div id="submit-container">
            <input type="submit" id="submit" value="Зарегистрироваться">
            <span id="message"></span>
        </div>
    </form>
</div>