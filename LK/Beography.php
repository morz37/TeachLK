<?php

	session_start();
	include '../db.php';
	include '../api.php';

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
<link href="../styles.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<?php   include_once "header_lk.php";    ?>


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

			<?php   include_once "main_section.php";    ?>

				<div class="col-md-offset-4">
						<p class="info_block_tab">О себе</p>
						<div class="info_block">
							<p><?php echo  $Be['About']; ?></p>
						</div>
				</div>
				</div>
			</div>
		 <?php } ?>
		</div>
		
	</div>

<footer>
</footer>
</body>
</html>