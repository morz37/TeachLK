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
                    $Code_works = getAllTypeofworks($db);

             ?>
             <table class="table table-bordered">
                 <tr>
                     <th>Code_work</th>
                     <th>Type_work</th>
                     <th>Title</th>
                     <th>Order_B</th>
                 </tr>
                 <?php foreach ($Code_works as $Code_work) { ?>
                    <tr>
                        <td><?php echo $Code_work['Code_work']; ?></td>
                        <td><?php echo $Code_work['Type_work']; ?></td>
                        <td><?php echo $Code_work['Title']; ?></td>
                        <td><?php echo $Code_work['Order_B']; ?></td>

                    </tr>
                <?php } ?>

             </table>
        </div>

        <footer>

        </footer>
    </body>
</html>