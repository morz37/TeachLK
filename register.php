<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<?php include 'db.php'; ?>
<?php include 'api.php'; ?>
<!DOCTYPE html>
	<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <link href="./styles.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
	<body>
		<div class="container mregister">
		<div id="login">
		 <h1>Регистрация</h1>
		<form action="register.php" id="registerform" method="post"name="registerform">
		 <p><label for="user_login">Полное имя<br>
		 <input class="input" id="Full_name" name="Full_name"size="32"  type="text" value=""></label></p>
		<p><label for="user_pass">Должность<br>
		<input class="input" id="Position" name="Position" size="32"type="Position" value=""></label></p>
		<p><label for="user_login">Кафедра<br>
		 <input class="input" id="Number_dep" name="Number_dep"size="32"  type="text" value=""></label></p>
		<p><label for="user_pass">Логин<br>
		<input class="input" id="login" name="login"size="20" type="text" value=""></label></p>
		<p><label for="user_pass">Пароль<br>
		<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
		<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
		<a href="index.php">На главную</a>
		 </form>
		</div>
		</div>
<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['Full_name']) && !empty($_POST['Position']) && !empty($_POST['Number_dep']) && !empty($_POST['login']) && !empty($_POST['password'])) 
	{
		 $Full_name= htmlspecialchars($_POST['Full_name']);
		 $Position=htmlspecialchars($_POST['Position']);
		 $Number_dep=htmlspecialchars($_POST['Number_dep']);
		 $login=htmlspecialchars($_POST['login']);
		 $password=htmlspecialchars($_POST['password']);
		 
		 // проверка на существование пользователя 
		 $query= "SELECT * FROM Teacher WHERE login=:login" ;
		 $stmt = $db->prepare($query);
		 $stmt->bindValue(':login', $login, PDO::PARAM_STR);
		 $stmt->execute();
 	     $row = $stmt->fetch(PDO::FETCH_ASSOC);

	if(empty($row))
		{

			$sql = "INSERT INTO Teacher(Full_name, Position, login,password , Number_dep) VALUES(:Full_name,:Position,:login,:password,:Number_dep)";

		    $stmt = $db->prepare($sql);
		    $stmt->bindValue(':Full_name', $Full_name, PDO::PARAM_STR);
		    $stmt->bindValue(':Position', $Position, PDO::PARAM_STR);
		    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
		    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
		    $stmt->bindValue(':Number_dep', $Number_dep, PDO::PARAM_INT);

		    $stmt->execute();

		    echo "Регистрация прошла успешно!";
		}
	else{
		    echo "Пользователь уже зарегистрирован";
		}
}
}
?>
<footer>
 </footer>
</body>
</html>
