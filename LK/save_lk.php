<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<?php
  session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
        <link href="../styles.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>



        <div class="container-fluid">
            <?php include '../db.php'; ?>
            <?php include '../api.php'; ?>
            <?php
                        $login = $_SESSION['login'];
                        $p1 = $_POST['Full_name'];
                        $p2 = $_POST['Academic_degree'];
                        $p3 = $_POST['Mail'];
                        $p4 = $_POST['Tel_number'];
                        $p5 = $_POST['About'];
                        $p6 = $_POST['Publications'];
                        $p7 = $_POST['Disciplines'];
                        $p8 = $_POST['S_activity'];
                        $p9 = $_POST['P_competencions'];
                        $p10 = $_POST['Qualification'];
                        $p11 = $_POST['Position'];
                        saveTeach_lk($db, $login, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11);
                        header("Location: edit_lk.php");
             ?>

        </div>

        <footer>

        </footer>
    </body>