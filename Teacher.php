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
                    $Code_teachers = getAllTeacher($db);

             ?>
             <form method="POST" role="form">
               <table id="Teacher" class="table table-bordered">
                   <tr>
                       <th>Код преподавателя</th>
                       <th>Полное имя</th>
                       <th>Должность</th>
                       <th>Кафедра</th>
                       <th>Удалить</th>
                   </tr>
                   <?php foreach ($Code_teachers as $Code_teacher) { ?>
                      <tr>
                          <td><?php echo $Code_teacher['Code_teacher']; ?></td>
                          <td><a href="edit.php?func=6&Code_teacher=<?php echo $Code_teacher['Code_teacher']; ?>"><?php echo $Code_teacher['Full_name']; ?></a></td>
                          <td><?php echo $Code_teacher['Position']; ?></td>
                          <td><?php echo $Code_teacher['Title']; ?></td>
                          <td><a class="btn btn-danger" href="delete.php?func=7&Code_teacher=<?php echo $Code_teacher['Code_teacher']; ?>">Удалить</a></td>
                      </tr>
                  <?php } ?>
               
               </table>
             </form>
             <button id="addButton" class="btn btn-default">Добавить Преподавателя</button>

                  <form action="" method="POST" role="form" style="display: none; margin-top: 20px;">
                
                  <div class="form-group">
                    <label for="">Введите ФИО</label>
                    <input type="text" class="form-control" id="Full_name" name="Full_name" placeholder="Введите ФИО">
                    <label for="">Введите Должность</label>
                    <input type="text" class="form-control" id="Position" name="Position" placeholder="Введите Должность">
                    <label for="">Выберите Кафедру</label>
                    <select id="Number_dep" name="Number_dep">
                    <?php
                    $Dep = getAllDepartment($db);
                      foreach ($Dep as $Number) { ?>
                        <option id="Number_dep" name="Number_dep" value="<?php echo $Number['Number']; ?>"><?php echo $Number['Title']; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-default">Добавить</button>
                </form>

                <?php
                    if(isset($_POST['Full_name']) && $_POST['Full_name'] != '') {
                      $Full_name = $_POST['Full_name'];
                      $Number_dep = $_POST['Number_dep'];
                      $Position = $_POST['Position'];
                      addTeach($db, $Full_name , $Number_dep ,$Position);
                      echo '<meta http-equiv="refresh" content="0; url=Teacher.php">';
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