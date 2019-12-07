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
                    $Numbers = getAllDepartment($db);

             ?>
             <table class="table table-bordered">
                 <tr>
                     <th>Номер</th>
                     <th>Название</th>
                     <th>Удалить</th>
                 </tr>
                 <?php foreach ($Numbers as $Number) { ?>
                    <tr>
                        <td><?php echo $Number['Number']; ?></td>
                        <td><a href="edit.php?func=5&Number=<?php echo $Number['Number']; ?>"><?php echo $Number['Title']; ?></a></td>
                        <td><a class="btn btn-danger" href="delete.php?func=4&Number=<?php echo $Number['Number']; ?>">Удалить</a></td>
                    </tr>
                <?php } ?>

             </table>

              <button id="addButton" class="btn btn-default">Добавить Кафедру</button>

                  <form action="" method="POST" role="form" style="display: none; margin-top: 20px;">
                
                  <div class="form-group">
                    <label for="">Введите название</label>
                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Введите название">
                  </div>
                  <button type="submit" class="btn btn-default">Добавить</button>
                </form>

                <?php
                    if(isset($_POST['Title']) && $_POST['Title'] != '') {
                      $Title = $_POST['Title'];
                      addDep($db, $Title);
                      echo '<meta http-equiv="refresh" content="0; url=Department.php">';
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