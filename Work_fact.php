<?php ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); ?>
<?php
  session_start();
?>
<!DOCTYPE html>
<html>
     <head>
      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <link href="./styles.css" rel="stylesheet" crossorigin="anonymous">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     </head>
    <body>

<?php   include_once "header.php";    ?>


        <div class="container-fluid">
            <?php include 'db.php'; ?>
            <?php include 'api.php'; ?>
            <?php
                    $login = $_SESSION['login'];
                    $Work_facts = getAllWork_fact($db,$login);
                    $p=null;
             ?>
              <div class="insert_date">
                <form method="POST" role="form">
                <p>Заполнение журнала выбранным диапазоном дат</p>
                <input type="text" class="datepicker" id="datepicker1" name="Date_start">
                <input type="text" class="datepicker" id="datepicker2" name="Date_end">
                <button type="submit" class="btn btn-default">Заполнить</button>
                <?php
                    $login = $_SESSION['login'];
                    $Code_teacher = getTeachName($db,$login)['Code_teacher'];
                    if(!empty($_POST['Date_start']) && $_POST['Date_start'] < $_POST['Date_end']) {
                      $Date_start = $_POST['Date_start'];
                      $Date_end = $_POST['Date_end'];
                      getDatesFromRange($db,$Code_teacher,$Date_start,$Date_end); 
                      echo '<meta http-equiv="refresh" content="0; url=Work_fact.php">';
                     }
               ?>
                </form>
              </div>

             <table class="table table-bordered work_f">
                 <tr class="header">
                     <th>+</th>
                     <th>Дата</th>
                     <th>Начало</th>
                     <th>Конец</th>
                     <th>Кол-во студентов</th>
                     <th>Кол-во часов</th>
                     <th>Номер группы</th>
                     <th>Факультет</th>
                     <th>Тип занятия</th>
                     <th></th>
                 </tr>
                 <?php foreach ($Work_facts as $ID_record) { ?>
                      <?php if ($p<>$ID_record['Date']): ?>
                          <tr class="header">
                              <td><i class="fa fa-plus" aria-hidden="true"></i></td>
                                <td><?php echo $ID_record['Date']; ?></td>
                                <td><?php echo $ID_record['Start']; ?></td>
                                <td><?php echo $ID_record['Finish']; ?></td>
                                <td><?php echo $ID_record['C_student']; ?></td>
                                <td><?php echo $ID_record['C_hours']; ?></td>
                                <td><?php echo $ID_record['Group_number']; ?></td>
                                <td><?php echo $ID_record['Faculty']; ?></td>
                                <td><?php echo $ID_record['Type_work']; ?></td>
                                <td>
                                  <a href="delete.php?func=5&ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-trash-alt"></i></a>
                                  <a href="copy.php?ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-copy"></i></a>
                                  <a href="edit.php?func=9&ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-edit"></i></a>
                                </td>
                          </tr>
                        <?php endif ?>
                      <?php if ($p==$ID_record['Date']): ?>
                        <tr>
                              <td>--</td>
                                <td><?php echo $ID_record['Date']; ?></td>
                                <td><?php echo $ID_record['Start']; ?></td>
                                <td><?php echo $ID_record['Finish']; ?></td>
                                <td><?php echo $ID_record['C_student']; ?></td>
                                <td><?php echo $ID_record['C_hours']; ?></td>
                                <td><?php echo $ID_record['Group_number']; ?></td>
                                <td><?php echo $ID_record['Faculty']; ?></td>
                                <td><?php echo $ID_record['Type_work']; ?></td>
                                <td>
                                  <a href="delete.php?func=5&ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-trash-alt"></i></a>
                                  <a href="copy.php?ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-copy"></i></a>
                                  <a href="edit.php?func=9&ID_record=<?php echo $ID_record['ID_record']; ?>"><i class="fas fa-edit"></i></a>
                                </td>
                        </tr>
                      <?php endif ?>
                      <?php $p=$ID_record['Date']; ?>
                  <?php } ?>
             </table>


             <form method="POST" role="form">
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
                        <input type="text" class="datepicker" id="datepicker3" name="datepicker">
                       </th>
                       <th>
                        <select name="Start" id="Start">
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
                        <select name="Finish" id="Finish">
                          <option value="09:35:00">09:35:00</option>
                          <option value="11:25:00">11:25:00</option>
                          <option value="13:15:00">13:15:00</option>
                          <option value="15:05:00">15:05:00</option>
                          <option value="16:55:00">16:55:00</option>
                          <option value="18:45:00">18:45:00</option>
                          <option value="20:35:00">20:35:00</option>
                        </select>
                       </th>
                       <th><input type="number" class="number_input" id="C_student" name="C_student"></th>
                       <th><input type="number" class="number_input" id="C_hours" name="C_hours"></th>
                       <th>
                        <select id="framework1" name="framework1" >
                        <?php
                          $Groups = getAllGroup($db);?>
                          <?php foreach ($Groups as $ID_group) { ?>
                            <option value="<?php echo $ID_group['ID_groupe']; ?>"><?php echo $ID_group['Group_number']; ?></option>
                            <?php } ?>
                        </select>
                      </th>
                       <th>
                         <select id="Code_work" name="Code_work">
                        <?php
                           $Code_works = getAllTypeofworks($db);?>
                          <?php foreach ($Code_works as $Code_work) { ?>
                            <option value="<?php echo $Code_work['Code_work']; ?>"><?php echo $Code_work['Type_work']; ?></option>
                            <?php } ?>
                        </select>
                       </th>
                                            
                 </tr>
               </table>
               <button type="submit" class="btn btn-default">Добавить</button>
               <?php
                    $login = $_SESSION['login'];
                    $Code_teacher = getTeachName($db,$login)['Code_teacher'];
                    if(!empty($_POST['datepicker'])) {
                      $Date = $_POST['datepicker'];
                      $Start = $_POST['Start'];
                      $Finish = $_POST['Finish'];
                      $C_student = $_POST['C_student'];
                      $C_hours = $_POST['C_hours'];
                      $ID_groupe = $_POST['framework1'];
                      $Code_work = $_POST['Code_work'];
                      insert_date($db, $Code_teacher, $Date, $Start, $Finish, $C_student, $C_hours, $ID_groupe, $Code_work );
                      flush();
                      echo '<meta http-equiv="refresh" content="0; url=Work_fact.php">';
                     }
               ?>
              </div>
             </form>

        <footer>
        </footer>
        
    </body>
</html>
<script type="text/javascript">
          $(document).ready(function() {
          //Fixing jQuery Click Events for the iPad
            var ua = navigator.userAgent,
              event = (ua.match(/iPad/i)) ? "touchstart" : "click";
            if ($('.table').length > 0) {
              $('.table .header').on(event, function() {
                $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
                  return this.style.display === 'table-row' ? 'none' : 'table-row';
                });
              });
            }
          })
          $(document).ready(function(){
           $('#framework').multiselect({
            nonSelectedText: 'Выберите',
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            buttonWidth:'400px'
           });
           
           $('#framework_form').on('submit', function(event){
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
             url:"insert.php",
             method:"POST",
             data:form_data,
             success:function(data)
             {
              $('#framework option:selected').each(function(){
               $(this).prop('selected', false);
              });
              $('#framework').multiselect('refresh');
              alert(data);
             }
            });
           });
          });

$(function() {
    $("#datepicker1").datepicker();
    $("#datepicker2").datepicker();
    $("#datepicker2").datepicker();

});
 </script>