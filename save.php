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
        <link href="./styles.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>

<?php   include_once "header.php";    ?>



        <div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>
            <?php
                    $fun = $_GET['func'];
                    if ($fun == 1){
                      if(!empty($_POST['Title']) && !empty($_POST['Number'])) {
                            $Title = $_POST['Title'];
                            $Number = $_POST['Number'];
                            saveDep($db, $Number, $Title);
                            header("Location: Department.php");
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Ошибка сохранения
                                    </div>';
                        }
                    }


                    if ($fun == 2) {
                      if(!empty($_POST['Title']) && !empty($_POST['Number'])) {
                            $Title = $_POST['Title'];
                            $Number = $_POST['Number'];
                            saveDep($db, $Number, $Title);
                            header("Location: Department.php");
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Ошибка сохранения
                                    </div>';
                        }
                    }

                    if ($fun == 6) {
                      if(!empty($_POST['Full_name'])) {
                            $Full_name = $_POST['Full_name'];
                            $Code_teacher = $_POST['Code_teacher'];
                            $Position = $_POST['Position'];
                            $Number_dep = $_POST['Number_dep'];
                            saveTeacher($db, $Code_teacher, $Full_name,$Number_dep,$Position);
                            header("Location: Teacher.php");
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Ошибка сохранения
                                    </div>';
                        }
                    }
                    if ($fun == 8) {
                      if(!empty($_POST['Group_number'])) {
                            $Group_number = $_POST['Group_number'];
                            $Faculty = $_POST['Faculty'];
                            $Col_student = $_POST['Col_student'];
                            $D_enterance = $_POST['D_enterance'];
                            $ID_groupe = $_POST['ID_groupe'];
                            saveGroup($db,$Faculty, $Group_number , $Col_student, $D_enterance , $ID_groupe);
                            header("Location: Group.php");
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Ошибка сохранения
                                    </div>';
                        }
                    }
                    if ($fun == 9) {
                      if(!empty($_GET['ID_record'])) {
                            $Code_teacher = $_GET['Code_teacher'];
                            $Date = $_POST['Date'];
                            $Start = $_POST['Start'];
                            $Finish = $_POST['Finish'];
                            $C_student = $_POST['C_student'];
                            $C_hours = $_POST['C_hours'];
                            $ID_groupe = $_POST['ID_groupe'];
                            $Code_work = $_POST['Code_work'];
                            $ID_record = $_GET['ID_record'];
                            save_date($db, $Code_teacher, $Date, $Start, $Finish, $C_student, $C_hours, $ID_groupe, $Code_work  , $ID_record);
                            header("Location: Work_fact.php");
                        }
                        else {
                            echo '<div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                      <span class="sr-only">Error:</span>
                                      Ошибка сохранения
                                    </div>';
                        }
                    }
                    
             ?>

        </div>

        <footer>

        </footer>
    </body>