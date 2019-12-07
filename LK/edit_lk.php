<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="../styles.css" rel="stylesheet" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

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
			<?php
				$login = $_SESSION['login'];
				$Be = getTeachBe($db , $login);
			?>
			<div class="content">

				<form action=upload.php method=post enctype=multipart/form-data style="display: flex;">
					<input type=file name=uploadfile>
					<input type=submit value=Загрузить>
				</form>
				 <form action="save_lk.php" method="post">
	                <input type="hidden" name="login" value="<?php echo $login['login']; ?>">
	                <div class="form-group">
	                    <label class="lb_lk" for="name">ФИО</label>
	                    <input type="text" class="form-control" id="Full_name" name="Full_name" value="<?php echo $Be['Full_name']; ?>">
	                    <label class="lb_lk" for="name">Ученая степень</label>
	                    <input type="text" class="form-control" id="Academic_degree" name="Academic_degree" value="<?php echo $Be['Academic_degree']; ?>">
	                    <label class="lb_lk" for="name">Должность</label>
	                    <input type="text" class="form-control" id="Position" name="Position" value="<?php echo $Be['Position']; ?>">
	                    <label class="lb_lk" for="name">Эл.почта</label>
	                    <input type="text" class="form-control" id="Mail" name="Mail" value="<?php echo $Be['Mail']; ?>">
	                    <label class="lb_lk" for="name">Номер телефона</label>
	                    <input type="text" class="form-control" id="Tel_number" name="Tel_number" value="<?php echo $Be['Tel_number']; ?>">
	                    <label class="lb_lk" for="name">Биография</label>
	                    <textarea id="About" name="About"><?php echo $Be['About']; ?></textarea>



	                    <label class="lb_lk" for="name">Публикации</label>
	                    <textarea id="Publications" name="Publications"><?php echo $Be['Publications']; ?></textarea>

	                    
	                    <label class="lb_lk" for="name">Преподаваемые дисциплины</label>
	                    <textarea id="Disciplines" name="Disciplines"><?php echo $Be['Disciplines']; ?></textarea>
	                    <label class="lb_lk" for="name">Научная деятельность</label>
	                    <textarea id="S_activity" name="S_activity"><?php echo $Be['S_activity']; ?></textarea>
	                    <label class="lb_lk" for="name">Проффесиональная компитенция</label>
	                    <textarea id="P_competencions" name="P_competencions"><?php echo $Be['P_competencions']; ?></textarea>
	                    <label class="lb_lk" for="name">Повышение квалификации</label>
	                    <textarea id="Qualification" name="Qualification"><?php echo $Be['Qualification']; ?></textarea>
	                </div>
	                  <div class="wrap_btn">
	                  	<button type="submit" class="btn btn-default btn_style">Сохранить</button>
	                  </div>
	            </form>
			</div>
		<?php } ?>
	</div>

<footer>
</footer>
<script>
      // $('#summernote').summernote({});
      $(function(){

        // Reference each summernote object
        var summernoteObjects = [
        	'About',
            'Publications',
            'Disciplines',
            'S_activity',
            'P_competencions',
            'Qualification',
        ];

        // Create hidden values for each summernote
        for(var i=0; i<summernoteObjects.length; i++){
            var objectPointerName = summernoteObjects[i];

            $("#" + objectPointerName).summernote();
            $("#formId").append("<input type='hidden' name='"+objectPointerName+"'>");
        }

        // Update hidden values on form submit
        $("#formId").submit(function(){
            for(var i=0; i<summernoteObjects.length; i++){
                var objectPointerName = summernoteObjects[i];
                var summernoteValue = $("#" + objectPointerName).summernote('code');

                $("#formId input[name='"+objectPointerName+"']").val(summernoteValue);
            }
        });

    });


  </script>
</body>
</html>