<?php
  session_start();
?>
<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Игроки</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php   include_once "header.php";    ?>


	<div id="content">
		<div class="container-fluid">
			<?php include 'db.php'; ?>
			<?php include 'api.php'; ?>
			<?php
                
                $ID_record = $_GET["ID_record"];
                
                    if($ID_record) {
                        Duplicate_work_fact($db, $ID_record);
                        header("Location: Work_fact.php"); 
                    } else {
                        echo "<h1>Error</h1>";
                        exit();
                    }


			?>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>