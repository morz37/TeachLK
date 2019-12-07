<?php
//Type_of_work
function getAllTypeofworks($db) {

    $sql = "SELECT * FROM Type_of_work";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['Code_work']] = $row;
    }

    return $result;
}
function getWorkById($db, $Code_work) {
    $sql = "SELECT * FROM Type_of_work
            WHERE Code_work = :Code_work;";

    $stmt = $db->prepare($sql);
    $stmt->bindValue('Code_work', $Code_work, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveWork($db,$Title, $Type_work , $Order_B, $Code_work) {
    $sql = "UPDATE Type_of_work
            SET Type_work = :Type_work , 
            Title = :Title ,
            Order_B = :Order_B , 
            WHERE Code_work = :Code_work";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Type_work', $Type_work, PDO::PARAM_STR);
    $stmt->bindValue(':Title', $Title, PDO::PARAM_STR);
    $stmt->bindValue(':Order_B', $Order_B, PDO::PARAM_INT);
    $stmt->bindValue(':Code_work', $Code_work, PDO::PARAM_INT);
    $stmt->execute();
}

function addWork_type($db,$Title, $Type_work , $Order_B, $Code_work) {
    $sql = "INSERT INTO Type_of_work(Title , Type_work,Order_B,Code_work) 
            VALUES(:Title , :Type_work , :Order_B,:Code_work)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Type_work', $Type_work, PDO::PARAM_STR);
    $stmt->bindValue(':Title', $Title, PDO::PARAM_STR);
    $stmt->bindValue(':Code_work', $Code_work, PDO::PARAM_INT);
    $stmt->bindValue(':Order_B', $Order_B, PDO::PARAM_INT);
    $stmt->execute();

}
function deleteWork_type($db, $Code_work) {
    $sql = "DELETE FROM Type_of_work WHERE Code_work = :Code_work";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":Code_work", $Code_work, PDO::PARAM_INT);

    $stmt->execute();
}


function getAllDepartment($db) {

    $sql = "SELECT * FROM Department";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['Number']] = $row;
    }

    return $result;
}
//Group
function getAllGroup($db) {

    $sql = "SELECT * FROM Groupe_n";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['ID_groupe']] = $row;
    }
    return $result;
}
function getGroupById($db, $ID_groupe) {
    $sql = "SELECT * FROM Groupe_n
            WHERE ID_groupe = :ID_groupe;";

    $stmt = $db->prepare($sql);
    $stmt->bindValue('ID_groupe', $ID_groupe, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveGroup($db,$Faculty, $Group_number , $Col_student, $D_enterance , $ID_groupe) {
    $sql = "UPDATE Groupe_n
            SET Group_number = :Group_number , 
            Faculty = :Faculty ,
            Col_student = :Col_student , 
            D_enterance = :D_enterance
            WHERE ID_groupe = :ID_groupe";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Group_number', $Group_number, PDO::PARAM_STR);
    $stmt->bindValue(':Faculty', $Faculty, PDO::PARAM_STR);
    $stmt->bindValue(':D_enterance', $D_enterance, PDO::PARAM_INT);
    $stmt->bindValue(':Col_student', $Col_student, PDO::PARAM_INT);
    $stmt->bindValue(':ID_groupe', $ID_groupe, PDO::PARAM_INT);
    $stmt->execute();
}

function addGroup($db, $Faculty, $Group_number , $Col_student, $D_enterance) {
    $sql = "INSERT INTO Groupe_n(Faculty , Group_number,Col_student,D_enterance) 
            VALUES(:Faculty , :Group_number , :Col_student,:D_enterance)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Group_number', $Group_number, PDO::PARAM_STR);
    $stmt->bindValue(':Faculty', $Faculty, PDO::PARAM_STR);
    $stmt->bindValue(':D_enterance', $D_enterance, PDO::PARAM_INT);
    $stmt->bindValue(':Col_student', $Col_student, PDO::PARAM_INT);
    $stmt->execute();

}
function deleteGroup($db, $ID_groupe) {
    $sql = "DELETE FROM Groupe_n WHERE ID_groupe = :ID_groupe";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":ID_groupe", $ID_groupe, PDO::PARAM_INT);

    $stmt->execute();
}

//Teacher
function getAllTeacher($db) {

    $sql = "SELECT * FROM Teacher 
     Left JOIN Department ON Teacher.Number_dep = Department.Number order by Teacher.Code_teacher ";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['Code_teacher']] = $row;
    }

    return $result;
}
function getTeacherById($db, $Code_teacher) {
    $sql = "SELECT * FROM Teacher
            WHERE Code_teacher = :Code_teacher;";

    $stmt = $db->prepare($sql);
    $stmt->bindValue('Code_teacher', $Code_teacher, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveTeacher($db, $Code_teacher, $Full_name , $Number_dep, $Position) {
    $sql = "UPDATE Teacher
            SET Full_name = :Full_name , 
            Number_dep = :Number_dep , 
            Position = :Position
            WHERE Code_teacher = :Code_teacher";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Full_name', $Full_name, PDO::PARAM_STR);
    $stmt->bindValue(':Position', $Position, PDO::PARAM_STR);
    $stmt->bindValue(':Number_dep', $Number_dep, PDO::PARAM_INT);
    $stmt->bindValue(':Code_teacher', $Code_teacher, PDO::PARAM_INT);
    $stmt->execute();
}

function addTeach($db, $Full_name , $Number_dep ,$Position) {
    $sql = "INSERT INTO Teacher(Full_name , Number_dep,Position) 
            VALUES(:Full_name , :Number_dep , :Position)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Full_name', $Full_name, PDO::PARAM_STR);
    $stmt->bindValue(':Position', $Position, PDO::PARAM_STR);
    $stmt->bindValue(':Number_dep', $Number_dep, PDO::PARAM_INT);
    $stmt->execute();

}
function deleteTeach($db, $Code_teacher) {
    $sql = "DELETE FROM Teacher WHERE Code_teacher = :Code_teacher";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":Code_teacher", $Code_teacher, PDO::PARAM_INT);

    $stmt->execute();
}


function getAllWork_fact($db ,$login) {

    $sql = "SELECT * FROM Work_fact Left JOIN
            Groupe_n ON Work_fact.`ID_groupe` = `Groupe_n`.`ID_groupe`
            Left JOIN
            Type_of_work ON Work_fact.`Code_work` = `Type_of_work`.`Code_work`
            Left JOIN
            Teacher ON Work_fact.`Code_teacher` = `Teacher`.`Code_teacher` 
            WHERE Teacher.`Code_teacher` = `Teacher`.`Code_teacher` and  login = :login
            order by Work_fact.Date";
    $result = array();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['ID_record']] = $row;
    }

    return $result;
}
function getAllWork_plane($db) {

    $sql = "SELECT * FROM ID_record";
    $result = array();

    $stmt = $db->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
        $result[$row['ID_record']] = $row;
    }

    return $result;
}

function getDepById($db, $Number) {
    $sql = "SELECT * FROM Department
            WHERE Number = :Number;
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue('Number', $Number, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveDep($db, $Number, $Title) {
    $sql = "UPDATE Department
            SET Title = :Title
            WHERE Number = :Number
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Title', $Title, PDO::PARAM_STR);
    $stmt->bindValue(':Number', $Number, PDO::PARAM_INT);
    $stmt->execute();
}

function addDep($db, $Title) {
    $sql = "INSERT INTO Department(Title) 
            VALUES(:Title)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Title', $Title, PDO::PARAM_STR);
    $stmt->execute();

}
function deleteDep($db, $Number) {
    $sql = "DELETE FROM Department WHERE Number = :Number";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":Number", $Number, PDO::PARAM_INT);

    $stmt->execute();
}

function deleteWork($db, $ID_record) {
    $sql = "DELETE FROM Work_fact WHERE ID_record = :ID_record";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":ID_record", $ID_record, PDO::PARAM_INT);

    $stmt->execute();
}

function isUser($db , $user , $password){
    $sql = "SELECT  * FROM Teacher 
            WHERE login = :login AND password = :password";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":login", $user, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($row)){
        return true ;
    }

    else{
            return false ;
        }
}

function addDate($db, $date){
    $sql = "insert into `Work_fact` (`Date`)
            SELECT DATE_ADD('2018-09-01', INTERVAL c.number DAY)    AS `Date`
            FROM 
            (
                SELECT singles + tens + hundreds+thousands number FROM 
                ( 
                    SELECT 0 singles
                    UNION ALL SELECT   1 UNION ALL SELECT   2 UNION ALL SELECT   3
                    UNION ALL SELECT   4 UNION ALL SELECT   5 UNION ALL SELECT   6
                    UNION ALL SELECT   7 UNION ALL SELECT   8 UNION ALL SELECT   9
                ) singles JOIN 
                (
                    SELECT 0 tens
                    UNION ALL SELECT  10 UNION ALL SELECT  20 UNION ALL SELECT  30
                    UNION ALL SELECT  40 UNION ALL SELECT  50 UNION ALL SELECT  60
                    UNION ALL SELECT  70 UNION ALL SELECT  80 UNION ALL SELECT  90
                ) tens  JOIN 
                (
                    SELECT 0 hundreds
                    UNION ALL SELECT  100 UNION ALL SELECT  200 UNION ALL SELECT  300
                    UNION ALL SELECT  400 UNION ALL SELECT  500 UNION ALL SELECT  600
                    UNION ALL SELECT  700 UNION ALL SELECT  800 UNION ALL SELECT  900
                ) hundreds
                 JOIN 
                (
                    SELECT 0 thousands
                    UNION ALL SELECT  1000 UNION ALL SELECT  2000 UNION ALL SELECT  3000
                    UNION ALL SELECT  4000 UNION ALL SELECT  5000 UNION ALL SELECT  6000
                    UNION ALL SELECT  7000 UNION ALL SELECT  8000 UNION ALL SELECT  9000
                ) thousands
                ORDER BY number DESC
            ) c  
            WHERE c.number BETWEEN 
            0 
            AND
            DATEDIFF('2019-05-31', '2018-09-01')";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":login", $user, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

function Duplicate_work_fact($db ,$ID_record ){
    $sql = "INSERT into `Work_fact` (`Date`, `Start`, `Finish` , `C_student`, `C_hours`, `Code_work` , `Code_teacher` , `ID_groupe`  )
            select `Date`, `Start`, `Finish` , `C_student`, `C_hours`, `Code_work` , `Code_teacher` , `ID_groupe` 
            from `Work_fact`
            where ID_record =:ID_record";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(":ID_record", $ID_record, PDO::PARAM_STR);
    $stmt->execute();

}



// LK

function getTeachName($db , $login){
    $sql = "SELECT * FROM Teacher INNER JOIN
            Teach_LK ON Teacher.`Code_teacher` = `Teach_LK`.`id` 
            where Teacher.login=:login ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function getTeachBe($db , $login){
    $sql = "SELECT * FROM Teach_LK INNER JOIN
            Teacher ON Teacher.`Code_teacher` = `Teach_LK`.`id` 
            where Teacher.login=:login ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function saveTeach_lk($db, $login, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11) {
    $sql = "UPDATE Teacher,Teach_LK
            SET Teacher.Full_name = :Full_name,
            Teach_LK.Academic_degree = :Academic_degree,
            Teach_LK.Mail = :Mail,
            Teach_LK.Tel_number = :Tel_number,
            Teach_LK.About = :About,
            Teach_LK.Publications = :Publications,
            Teach_LK.Disciplines = :Disciplines,
            Teach_LK.S_activity = :S_activity,
            Teach_LK.P_competencions = :P_competencions,
            Teach_LK.Qualification = :Qualification,
            Teacher.Position = :Position
            WHERE Teacher.`Code_teacher` = `Teach_LK`.`id` and  login = :login";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Full_name', $p1, PDO::PARAM_STR);
    $stmt->bindValue(':Academic_degree', $p2, PDO::PARAM_STR);
    $stmt->bindValue(':Mail', $p3, PDO::PARAM_STR);
    $stmt->bindValue(':Tel_number', $p4, PDO::PARAM_INT);
    $stmt->bindValue(':About', $p5, PDO::PARAM_STR);
    $stmt->bindValue(':Publications', $p6, PDO::PARAM_STR);
    $stmt->bindValue(':Disciplines', $p7, PDO::PARAM_STR);
    $stmt->bindValue(':S_activity', $p8, PDO::PARAM_STR);
    $stmt->bindValue(':P_competencions', $p9, PDO::PARAM_STR);
    $stmt->bindValue(':Qualification', $p10, PDO::PARAM_STR);
    $stmt->bindValue(':Position', $p11, PDO::PARAM_STR);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
}

function insert_date($db, $Code_teacher, $Date, $Start, $Finish, $C_student, $C_hours, $ID_groupe, $Code_work ){
    $sql = "INSERT INTO Work_fact (Code_teacher , Date, Start, Finish, C_student, C_hours, ID_groupe, Code_work)
            VALUES(:Code_teacher , :Date, :Start, :Finish, :C_student, :C_hours, :ID_groupe, :Code_work)";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Code_teacher', $Code_teacher, PDO::PARAM_INT);
    $stmt->bindValue(':Date', $Date, PDO::PARAM_STR);
    $stmt->bindValue(':Start', $Start, PDO::PARAM_STR);
    $stmt->bindValue(':Finish', $Finish, PDO::PARAM_STR);
    $stmt->bindValue(':C_student', $C_student, PDO::PARAM_INT);
    $stmt->bindValue(':C_hours', $C_hours, PDO::PARAM_INT);
    $stmt->bindValue(':ID_groupe', $ID_groupe, PDO::PARAM_INT);
    $stmt->bindValue(':Code_work', $Code_work, PDO::PARAM_INT);

    $stmt->execute();
}
function save_date($db, $Code_teacher, $Date, $Start, $Finish, $C_student, $C_hours, $ID_groupe, $Code_work  , $ID_record){
    $sql = "UPDATE  Work_fact
    SET Code_teacher= :Code_teacher, 
    Date =:Date, 
    Start =:Start, 
    Finish= :Finish, 
    C_student =:C_student, 
    C_hours = :C_hours, 
    ID_groupe =:ID_groupe, 
    Code_work =:Code_work
    where ID_record =:ID_record";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':Code_teacher', $Code_teacher, PDO::PARAM_INT);
    $stmt->bindValue(':Date', $Date, PDO::PARAM_STR);
    $stmt->bindValue(':Start', $Start, PDO::PARAM_STR);
    $stmt->bindValue(':Finish', $Finish, PDO::PARAM_STR);
    $stmt->bindValue(':C_student', $C_student, PDO::PARAM_INT);
    $stmt->bindValue(':C_hours', $C_hours, PDO::PARAM_INT);
    $stmt->bindValue(':ID_groupe', $ID_groupe, PDO::PARAM_INT);
    $stmt->bindValue(':Code_work', $Code_work, PDO::PARAM_INT);
    $stmt->bindValue(':ID_record', $ID_record, PDO::PARAM_INT);

    $stmt->execute();
}
function getDateById($db, $ID_record) {
    $sql = "SELECT * FROM Work_fact
            WHERE ID_record = :ID_record;
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue('ID_record', $ID_record, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}


function getDatesFromRange($db,$Code_teacher,$start, $end, $format = 'Y-m-d') {

    $interval = new DateInterval('P1D');
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) { 
        $Date = $date->format($format); 
        
        $sql = "INSERT INTO Work_fact(Date , Code_teacher) 
            VALUES(:Date , :Code_teacher)";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':Date', $Date, PDO::PARAM_STR);
        $stmt->bindValue(':Code_teacher', $Code_teacher, PDO::PARAM_INT);

        $stmt->execute();
        
    }

}

function setimg($db, $login, $img) {
    $sql = "UPDATE Teach_LK tl
            inner join Teacher t on
                tl.id = t.Code_teacher
            set tl.img = :img
            where t.login= :login";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':img', $img, PDO::PARAM_STR);
    $stmt->bindValue(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
}




//Datepicker
?>
<script>
( function( factory ) {
        if ( typeof define === "function" && define.amd ) {
    
            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {
    
            // Browser globals
            factory( jQuery.datepicker );
        }
    }( function( datepicker ) {
    
    datepicker.regional.ru = {
        closeText: "Закрыть",
        prevText: "&#x3C;Пред",
        nextText: "След&#x3E;",
        currentText: "Сегодня",
        monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
        "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
        monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
        "Июл","Авг","Сен","Окт","Ноя","Дек" ],
        dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
        dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
        dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
        weekHeader: "Нед",
        dateFormat: "yy-mm-dd",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" };
    datepicker.setDefaults( datepicker.regional.ru );
    
    return datepicker.regional.ru;
    
    } ) );
$(document).ready(function(){
          $('.datepicker').datepicker({
            constrainInput: true,   // prevent letters in the input field
            showOn: 'button',       // Show a button next to the text-field
            autoSize: true,         // automatically resize the input field 
            firstDay: 1 // Start with Monday
          })
      })
</script>
