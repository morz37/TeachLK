<?php
// На всякий случай создадим каталог. Если он уже создан,
// сообщение об ошибки мы не увидим, поскольку воспользуемся оператором @:
session_start();
$login = $_SESSION['login'];
include '../db.php';
include '../api.php';


// Желаемая структура папок
$structure = 'uploads/images/'.$login;
rmdir('uploads/images/'.$login);
// Для создания вложенной структуры необходимо указать параметр
// $recursive в mkdir().
mkdir($structure, 0777, true);
 

$b = copy($_FILES['uploadfile']['tmp_name'],$structure.'/'.basename($_FILES['uploadfile']['name']));
$img = $structure.'/'.basename($_FILES['uploadfile']['name']);
if ($b == true) {
	setimg($db, $login, $img);
	header("Location: edit_lk.php");
}
else {
    echo "файл не загружен!";
}





?>

