<section class="main">
<div class="row">
<div class="lk_menu col-md-4">
	<ul class="lk_item">
		<li><a href="Beography.php">Биография</a></li>
		<li><a href="Publications.php">Публикации</a></li>
		<li><a href="Disciplines.php">Преподаваемые дисциплины</a></li>
		<li><a href="S_activity.php">Научная деятельность</a></li>
		<li><a href="P_competencions.php">Профессиональные компетенции</a></li>
		<li><a href="Qualification.php">Повышения квалификации</a></li>
		<li><a href="Publications.php">Расписание</a></li>
</ul>
</div>
<?php
	$login = $_SESSION['login'];
	$info = getTeachName($db , $login);
	$Be = getTeachBe($db , $login);
	?>

	<div class="card col-md-8">
		<div class="row">
			<div class="col-md-4">
				<img class="img_lk" src="<?php echo  $info['Img']; ?>" alt="">
			</div>
		<div class="info col-md-8">
			<h2><?php echo  $info['Full_name']; ?></h2>
			<h5>Ученая степень:  <?php echo  $info['Academic_degree']; ?></h5>
			<h5>Должность:  <?php echo  $info['Position']; ?></h5>
			<h5>Эл.почта:  <?php echo  $info['Mail']; ?></h5>
			<h5>Тел:  <?php echo  $info['Tel_number']; ?></h5>			
			<a href="edit_lk.php">Настройки</a>
		</div>
		</div>
		</div>
	</div>
<div class="row">
</section>