<?php

$conn = new mysqli('localhost' , 'root' , '','pks31');

$rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У',
    'Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к'
,'л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ');

$lat=array('a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u',
    'f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','e','gh','z','i',
'y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya',' '); //два массива для перевода русских символов в английские

$fio_rus=$_POST['fio'];
$birthday=$_POST['birthday'];
$sex = $_POST['sex'];
$login = $_POST['login'];
$password = $_POST['password']; //получаем данные о пользователе

$sql = "SELECT * from users where (login='$login')";
$result = $conn->query($sql);
$row = $result->fetch_row();
if($row[4] == $login ){ //если указанный логин существует,выводим сообщение

    echo "Пользователь с логином $login существует";

    $result->free();
    exit();
}

$fio_lat = str_replace($rus, $lat, $fio_rus); //функция для перевода кириллицы в латиницу


$sql = "INSERT INTO users (fio,birthday,sex,login,password) VALUES ('$fio_lat','$birthday','$sex','$login','$password')"; //заносим в бд данные пользователя


if($conn->query($sql) === TRUE){
    echo "Вы успешно зарегестрировались";
}else{
    echo "Упс,что-то пошло не так...  " .$conn->error;
}

$conn->close();