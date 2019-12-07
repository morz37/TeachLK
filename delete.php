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

                $r = $_GET["func"];

                if ($r == 4){
                    $id = $_GET['Number'];
                    if($id) {
                        deleteDep($db, $id);
                        header("Location: Department.php"); 
                    } else {
                        echo "<h1>Error</h1>";
                        exit();
                    }
                }
				
                

                if($r == 5){
                    $ID_record = $_GET['ID_record'];
                    if($ID_record) {
                    deleteWork($db, $ID_record);
                    header("Location: Work_fact.php"); 
                    } else {
                        echo "<h1>Error</h1>";
                        exit();
                    }
                }

                
                if ($r == 6) {
                    $Date_start = $_GET['Date_start'];
                    $Date_end = $_GET['Date_end'];
                    $dates = getDatesFromRange($db,'1',$Date_start,$Date_end);
                }
                if ($r == 7) {
                    $Code_teacher = $_GET['Code_teacher'];
                    deleteTeach($db,$Code_teacher);
                    header("Location: Teacher.php"); 

                }
                if ($r == 8) {
                    $ID_groupe = $_GET['ID_groupe'];
                    deleteGroup($db, $ID_groupe);
                    header("Location: Group.php");
                }

			?>
		</div>
	</div>

	<footer>
		
	</footer>
</body>
</html>