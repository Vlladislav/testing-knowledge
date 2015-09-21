<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=(isset($this->title)) ? $this->title : 'Система тестирования'; ?></title>
    <link rel="stylesheet" href="<?=URL?>css/default.css" />    
    <?php 
        if (isset($this->js)){
            foreach ($this->js as $js){
                echo '<script src="'.URL.'application/views/'.$js.'"></script>';
            }
        }
    ?>
</head>
<body>

<?php Session::init(); ?>
    
<header>
    <nav>
        <?php if (Session::get('loggedIn') == false):?>
            <a href="<?=URL?>index">Главная</a>
            <a href="<?=URL?>help">Помощь</a>
        <?php endif; ?>   
        <?php if (Session::get('loggedIn') == true):?>
            <a href="<?=URL?>groups">Группы</a>
            <a href="<?=URL?>test">Тест</a>
            <a href="<?=URL?>development">Создать тест</a>
            <?php if (Session::get('role') == 'administrator'):?>
            <a href="<?=URL?>user">Пользователи</a>
            <?php endif; ?>
            
            <a href="<?=URL?>test/logout">Выход</a>    
        <?php else: ?>
            <a href="<?=URL?>login">Войти</a>
        <?php endif; ?>
    </nav>
</header>
    
<div id="content">
    
    