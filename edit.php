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
                   $func = $_GET['func'];

                   if ($func == 5) {
                        $Number = $_GET['Number'];
                        $Numbers = getDepById($db, $Number);

                     ?>
                        <form action="save.php" method="post">
                            <input type="hidden" name="Number" value="<?php echo $Numbers['Number']; ?>">
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" id="Number" name="Title" value="<?php echo $Numbers['Title']; ?>">
                              </div>
                              <button type="submit" class="btn btn-default">Сохранить</button>
                        </form>
                    <?php }
                    
                    if ($func == 6) {
                        $Code_teacher = $_GET['Code_teacher'];
                        $Code_teachers = getTeacherById($db, $Code_teacher);

                     ?>
                        <form action="save.php?func=6" method="post">
                            <input type="hidden" name="Code_teacher" value="<?php echo $Code_teachers['Code_teacher']; ?>">
                            <div class="form-group">
                                <label for="name">ФИО</label>
                                <input type="text" class="form-control" id="Full_name" name="Full_name" value="<?php echo $Code_teachers['Full_name']; ?>">
                                <label for="name">Должность</label>
                                <input type="text" class="form-control" id="Position" name="Position" value="<?php echo $Code_teachers['Position']; ?>">
                                <label for="name">Кафедра</label>
                                  <td>
                                    <select id="Number_dep" name="Number_dep">
                                    <?php
                                    $Dep = getAllDepartment($db);
                                      foreach ($Dep as $Number) { ?>
                                        <option id="Number_dep" name="Number_dep" value="<?php echo $Number['Number']; ?>"><?php echo $Number['Title']; ?></option>
                                        <?php } ?>
                                    </select>
                                  </td>
                              </div>
                              <button type="submit" class="btn btn-default">Сохранить</button>
                        </form>
                    <?php }

                    if ($func == 8) {
                        $ID_groupe = $_GET['ID_groupe'];
                        $ID_groupes = getGroupById($db, $ID_groupe);

                     ?>
                        <form action="save.php?func=8" method="post">
                            <input type="hidden" name="ID_groupe" value="<?php echo $ID_groupes['ID_groupe']; ?>">
                            <div class="form-group">
                                <label for="">Номер группы</label>
                                <input type="text" class="form-control" id="Group_number" name="Group_number" placeholder="Номер группы" value="<?php echo $ID_groupes['Group_number']; ?>">
                                <label for="">Факультет</label>
                                <input type="text" class="form-control" id="Faculty" name="Faculty" placeholder="Факультет" value="<?php echo $ID_groupes['Faculty']; ?>">
                                <label for="">Количество студентов</label>
                                <input type="text" class="form-control" id="Col_student" name="Col_student" placeholder="Количество студентов" value="<?php echo $ID_groupes['Col_student']; ?>">
                                <label for="">Дата поступления</label>
                                <input type="text" class="form-control" id="D_enterance" name="D_enterance" placeholder="Дата поступления" value="<?php echo $ID_groupes['D_enterance']; ?>">
                              </div>
                              <button type="submit" class="btn btn-default">Сохранить</button>
                        </form>
                    <?php }

                    if ($func == 9) {
                        $ID_record = $_GET['ID_record'];
                        $ID_records = getDateById($db, $ID_record);

                     ?>
                        <form action="save.php?func=9&ID_record=<?php echo $ID_records['ID_record']; ?>&Code_teacher=<?php echo $ID_records['Code_teacher']; ?>" method="post">
                           <table class="table table-bordered">
                             <tr>
                                   <th>Дата</th>
                                   <th>Начало</th>
                                   <th>Конец</th>
                                   <th>Кол-во студентов</th>
                                   <th>Кол-во часов</th>
                                   <th>Номер группы</th>
                                   <th>Тип занятия</th>
                             </tr>
                             <tr>
                                   <th>
                                    <input type="text" class="datepicker" id="datepicker3" name="Date" value="<?php echo $ID_records['Date']; ?>">
                                   </th>
                                   <th>
                                    <select name="Start" id="Start" value = "<?php echo $ID_records['Start']; ?>">
                                      <option value="08:00:00">08:00:00</option>
                                      <option value="09:50:00">09:50:00</option>
                                      <option value="11:40:00">11:40:00</option>
                                      <option value="13:30:00">13:30:00</option>
                                      <option value="15:20:00">15:20:00</option>
                                      <option value="17:10:00">17:10:00</option>
                                      <option value="19:00:00">19:00:00</option>
                                    </select>
                                   </th>
                                   <th>
                                    <select name="Finish" id="Finish" value = "<?php echo $ID_records['Finish']; ?>">
                                      <option value="09:35:00">09:35:00</option>
                                      <option value="11:25:00">11:25:00</option>
                                      <option value="13:15:00">13:15:00</option>
                                      <option value="15:05:00">15:05:00</option>
                                      <option value="16:55:00">16:55:00</option>
                                      <option value="18:45:00">18:45:00</option>
                                      <option value="20:35:00">20:35:00</option>
                                    </select>
                                   </th>
                                   <th><input type="number" class="number_input" id="C_student" name="C_student" value = "<?php echo $ID_records['C_student']; ?>"></th>
                                   <th><input type="number" class="number_input" id="C_hours" name="C_hours" value = "<?php echo $ID_records['C_hours']; ?>"></th>
                                   <th>
                                    <?php 

                                        $Group=getGroupById($db, $ID_records['ID_groupe']);?>
                                    <select id="framework1" name="ID_groupe">
                                    <?php
                                      $Groups = getAllGroup($db);?>
                                      <?php foreach ($Groups as $ID_group) { ?>
                                        <option value="<?php echo $ID_group['ID_groupe']; ?>"><?php echo $ID_group['Group_number']; ?></option>
                                        <?php } ?>
                                    </select>
                                  </th>
                                   <th>
                                    <?php 
                                        $Type_work=getWorkById($db, $ID_records['Code_work']);
                                     ?>
                                     <select id="Code_work" name="Code_work">
                                    <?php
                                       $Code_works = getAllTypeofworks($db);?>
                                      <?php foreach ($Code_works as $Code_work) { ?>
                                        <option class="opt" value="<?php echo $Code_work['Code_work']; ?>"><?php echo $Code_work['Type_work']; ?></option>
                                        <?php } ?>
                                    </select>
                                   </th>
                                                        
                             </tr>
                           </table>
                           <button type="submit" class="btn btn-default">Сохранить</button>
                          </div>
                         </form>
                    <?php }?>


        </div>

        <footer>
        </footer>
<script>
    $(document).ready(function(){
        //set current value select
        var f = <?php echo $func ?>;
        if (f == 9 ) {
            $("#framework1 :contains('<?php echo $Group['Group_number'] ?>')").attr("selected", "selected");
            $("#Code_work :contains('<?php echo $Type_work['Type_work'] ?>')").attr("selected", "selected");
            $("#Start :contains('<?php echo $ID_records['Start'] ?>')").attr("selected", "selected");
            $("#Finish :contains('<?php echo $ID_records['Finish'] ?>')").attr("selected", "selected");

        };
        if (f == 6 ){
            
        };
    
})
</script>
    </body>