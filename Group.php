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
                    $Groups = getAllGroup($db);

             ?>
         <form method="POST" role="form">
             <table class="table table-bordered">
                 <tr>
                     <th>Код группы</th>
                     <th>Номер группы</th>
                     <th>Факультет</th>
                     <th>Количество студентов</th>
                     <th>Дата поступления</th>
                     <th>Удалить</th>
                 </tr>
                 <?php foreach ($Groups as $ID_group) { ?>
                    <tr>
                        <td><?php echo $ID_group['ID_groupe']; ?></td>
                        <td><a href="edit.php?func=8&ID_groupe=<?php echo $ID_group['ID_groupe']; ?>"><?php echo $ID_group['Group_number']; ?></a></td>
                        <td><?php echo $ID_group['Faculty']; ?></td>
                        <td><?php echo $ID_group['Col_student']; ?></td>
                        <td><?php echo $ID_group['D_enterance']; ?></td>
                        <td><a class="btn btn-danger" href="delete.php?func=8&ID_groupe=<?php echo $ID_group['ID_groupe']; ?>">Удалить</a></td>
                    </tr>
                <?php } ?>

             </table>
         </form>
         <button id="addButton" class="btn btn-default">Добавить Группу</button>

                  <form action="" method="POST" role="form" style="display: none; margin-top: 20px;">
                
                  <div class="form-group">
                    <input type="number" class="form-control" id="ID_groupe" name="ID_groupe" placeholder="Код группы" >
                    <label for="">Номер группы</label>
                    <input type="number" class="form-control" id="Group_number" name="Group_number" placeholder="Номер группы">
                    <label for="">Факультет</label>
                    <input type="text" class="form-control" id="Faculty" name="Faculty" placeholder="Факультет">
                    <label for="">Количество студентов</label>
                    <input type="number" class="form-control" id="Col_student" name="Col_student" placeholder="Количество студентов">
                    <label for="">Дата поступления</label>
                    <input type="number" class="form-control" id="D_enterance" name="D_enterance" placeholder="Дата поступления">
                  </div>
                  <button type="submit" class="btn btn-default">Добавить</button>
                </form>

                <?php
                    if(isset($_POST['Group_number']) && $_POST['Group_number'] != '') {
                      $Group_number = $_POST['Group_number'];
                      $ID_groupe = $_POST['ID_groupe'];
                      $Faculty = $_POST['Faculty'];
                      $Col_student = $_POST['Col_student'];
                      $D_enterance = $_POST['D_enterance'];
                      addGroup($db, $Faculty, $Group_number , $Col_student, $D_enterance);
                      echo '<meta http-equiv="refresh" content="0; url=Group.php">';
                    }
                    
                ?>
        </div>
        <footer>
        </footer>
    </body>
<script>
$("#addButton").click(function(){
$("form").slideDown();
});
</script>
</html>