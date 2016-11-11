<?php
//include_once ('setcookie.php');
include_once ('admincheck.php');
$decision = $_POST['decision'];
//$login = $_COOKIE['login'];

switch ($decision){
    case 'Регистрация':
        header ('Location: ../bdhtml/reg.html');  // перенаправление на нужную страницу
        exit();//
        break;

    case 'Вернуться на главную страницу':
        header ('Location: ../bdhtml/login.html');  // перенаправление на нужную страницу
        exit();
        break;

    case 'Перейти к панели управления':
        if(check($login)) {
            header('Location: ../bd/admin_panel.php');  // перенаправление на нпанель управления
            exit();
        }else{
            header('Location: ../bdhtml/user_panel.html');
            exit();
        }
        break;
}