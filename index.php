<?php

	session_start();
	include 'db.php';
	include 'api.php';

	if(!empty($_POST)) {

		if($_POST['login'] != '' && $_POST['password'] != '') {
			$login = trim(strip_tags($_POST['login']));
			$password = trim(strip_tags($_POST['password']));
			if(isUser($db, $login, $password)) {
				$_SESSION['login'] = $login;
			} else {
				echo "<h3>Пользатель не найден</h1>";	
			}
		} else {
			echo "<h3>Заполните все поля</h1>";
		}

	}
?>
<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="./styles.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<?php   include_once "header.php";    ?>

<div id="content">
		<div class="container-fluid">
		<?php if(!isset($_SESSION['login'])) { ?>
			<form action="" method="POST" role="form">
			
				<div class="form-group">
					<label for="">Логин</label>
					<input type="text" class="form-control" id="login" name="login">
				</div>

				<div class="form-group">
					<label for="">Пароль</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
			
				<button type="submit" class="btn btn-primary">Войти</button>
			</form>
			<p><a href="register.php">Нет аккаунта?</a></p>
		<?php } 
		else { ?>
			<div class="content">
				<div class="row">
					<div class="lk_menu col-md-4">
						<ul class="lk_item">
								<li><a href="LK/Beography.php">Биография</a></li>
								<li><a href="LK/Publications.php">Публикации</a></li>
								<li><a href="LK/Disciplines.php">Преподаваемые дисциплины</a></li>
								<li><a href="LK/S_activity.php">Научная деятельность</a></li>
								<li><a href="LK/P_competencions.php">Профессиональные компетенции</a></li>
								<li><a href="LK/Qualification.php">Повышения квалификации</a></li>
								<li><a href="LK/Publications.php">Расписание</a></li>
						</ul>
					</div>
					<?php
						$login = $_SESSION['login'];
						$info = getTeachName($db , $login);?>
				
						<div class="card col-md-8">
							<div class="row">
								<div class="col-md-4">
									<img  class="img_lk" src="LK/<?php echo  $info['Img']; ?>" alt="">
								</div>
								<div class="info col-md-8">
									<h2><?php echo  $info['Full_name']; ?></h2>
									<h5>Ученая степень:  <?php echo  $info['Academic_degree']; ?></h5>
									<h5>Должность:  <?php echo  $info['Position']; ?></h5>
									<h5>Эл.почта:  <?php echo  $info['Mail']; ?></h5>
									<h5>Тел:  <?php echo  $info['Tel_number']; ?></h5>
									<a href="LK/edit_lk.php">Настройки</a>
								</div>
							</div>
							</div>
						</div>
					  <?php } ?>
				</div>
			</div>
		
	</div>

<footer>
</footer>
</body>
</html>