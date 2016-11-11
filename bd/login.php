<?php
require_once ('users.php');

$conn = new PDO('mysql:host=localhost;dbname=pks31' , 'root','');

$login = $_POST['login'];
$password = $_POST['password'];

if(!isset($login)){
    echo join('',file('../bdhtml/login_and_reg.html'));
}else{
    echo join('',file('../bdhtml/user_panel.html'));
}
/*
$stmt = $conn->prepare('SELECT * from users WHERE login = ?');
$stmt->execute(array($login));
$row = $stmt->fetch();


if($row['login'] == $login && $row['password'] == $password){  //логин/пароль совпали - авторизируемся

    echo "Добро пожаловать $login ";




}elseif($row['login'] == $login && $row['password'] != $password ){
    echo "Не верный логин или пароль";
}

else {
    echo "Пользователь с ником $login не найден";
    header('Refresh: 2; ../bdhtml/login_and_reg.html');
}*/