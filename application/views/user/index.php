<h1>Регистрайция нового пользователя</h1>

<div class="wrapper">
    <form action="<?=URL?>user/create" method="post">
        <div id="from-registration-container">
            <ul>
                <li>
                    <label for="last_name">Фамилия</label>
                    <input type="text" name="registration[last_name]" id="last_name" value="<?=isset($this->data['last_name'])?$this->data['last_name'] : '';?>">
                    <span><?=isset($this->err['last_name'])?$this->err['last_name'] : '';?></span>
                </li>
                <li>
                    <label for="first_name">Имя</label>
                    <input type="text" name="registration[first_name]" id="first_name" value="<?=isset($this->data['first_name'])?$this->data['first_name'] : '';?>">
                    <span><?=isset($this->err['first_name'])?$this->err['first_name'] : '';?></span>
                </li>
                <li>
                    <label for="middle_name">Отчество</label>
                    <input type="text" name="registration[middle_name]" id="middle_name" value="<?=isset($this->data['middle_name'])?$this->data['middle_name'] : '';?>">
                    <span><?=isset($this->err['middle_name'])?$this->err['middle_name'] : '';?></span>
                </li>
                <li>
                    <label for="birthdate">Дата рождения</label>
                    <input type="text" name="registration[birthdate]" id="birthdate" value="<?=isset($this->data['birthdate'])?$this->data['birthdate'] : '';?>">
                    <span><?=isset($this->err['birthdate'])?$this->err['birthdate'] : '';?></span>
                </li>
                <li>
                    <label for="telephone">Телефон</label>
                    <input type="text" name="registration[telephone]" id="telephone" value="<?=isset($this->data['telephone'])?$this->data['telephone'] : '';?>">
                    <span><?=isset($this->err['telephone'])?$this->err['telephone'] : '';?></span>
                </li>
             </ul>
             <ul>
                <li>
                    <label for="login">Логин</label>
                    <input type="text" name="registration[login]" id="login" value="<?=isset($this->data['login'])?$this->data['login'] : '';?>">
                    <span><?=isset($this->err['login'])?$this->err['login'] : '';?></span>
                </li>
                <li>
                    <label for="password">Пароль</label>
                    <input type="password" name="registration[password]" id="password" value="<?=isset($this->data['password'])?$this->data['password'] : '';?>">
                    <span><?=isset($this->err['password'])?$this->err['password'] : '';?></span>
                </li>
                <li>
                    <label for="password_repeat">Повторите</label>
                    <input type="password" name="registration[password_repeat]" id="password_repeat" value="<?=isset($this->data['password_repeat'])?$this->data['password_repeat'] : '';?>">
                    <span><?=isset($this->err['password_repeat'])?$this->err['password_repeat'] : '';?></span>
                </li>
                <li>
                    <label for="role">Роль</label>
                    <select name="registration[role]" id="role">
                        <option value="user">Пользователь</option>
                        <option value="administrator">Администратор</option>
                        <option value="developer">Разработчик</option>
                    </select>
                    <span></span>
                </li>
                <li>
                    <label for="email_address">E-mail</label>
                    <input type="text" name="registration[email_address]" id="email_address" value="<?=isset($this->data['email_address'])?$this->data['email_address'] : '';?>">
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


<table>
<tr><th>#</th><th>Логин</th><th>ФИО</th><th>Роль</th><th>Редактивровать</th><th>Удалить</th></tr>
<?php
    foreach($this->userList as $key => $value) {
        echo '<tr>
                <td>' . $value['user_id'] . '</td>
                <td>' . $value['login'] . '</td>
                <td>' . $value['fio'] . '</td>
                <td>' . $value['role'] . '</td>
                <td><a href="'.URL.'user/edit/'.$value['user_id'].'">Изменить</a></td>
                <td><a href="'.URL.'user/delete/'.$value['user_id'].'">Удалить</a></td>
             </tr>';
    }
?>
</table>