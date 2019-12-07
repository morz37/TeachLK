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
                    $Work_facts = getAllWork_plane($db);

             ?>
             <table class="table table-bordered">
                 <tr>
                     <th>Код записи</th>
                     <th>Дата</th>
                     <th>Начало</th>
                     <th>Конец</th>
                     <th>Кол-во студентов</th>
                     <th>Кол-во часов</th>
                     <th>Номер недели</th>
                     <th>День недели</th>
                     <th>Курс</th>
                     <th>Группа</th>
                     <th>Код типа занятия</th>
                     <th>Код преподавателя</th>
                 </tr>
                 <?php foreach ($Work_facts as $ID_record) { ?>
                    <tr>
                        <td><?php echo $ID_record['ID_record']; ?></td>
                        <td><?php echo $ID_record['Date']; ?></td>
                        <td><?php echo $ID_record['Start']; ?></td>
                        <td><?php echo $ID_record['Finish']; ?></td>
                        <td><?php echo $ID_record['C_student']; ?></td>
                        <td><?php echo $ID_record['C_hours']; ?></td>
                        <td><?php echo $ID_record['N_week']; ?></td>
                        <td><?php echo $ID_record['Day_week']; ?></td>
                        <td><?php echo $ID_record['Course']; ?></td>
                        <td><?php echo $ID_record['Group_number']; ?></td>
                        <td><?php echo $ID_record['Code_work']; ?></td>
                        <td><?php echo $ID_record['Code_teacher']; ?></td>

                    </tr>
                <?php } ?>


             </table>
        </div>

        <footer>

        </footer>
    </body>
</html>