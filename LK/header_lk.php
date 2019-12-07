<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Личный кабинет</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="../index.php">Главная</a></li>
                    <li><a href="../Department.php">Кафедра</a></li>
                    <li><a href="../Teacher.php">Преподаватель</a></li>
                    <li><a href="../Group.php">Группы</a></li>
                    <li><a href="../Work_fact.php">Занятие факт</a></li>
                    <li><a href="../Work_plane.php">Заниятие план</a></li>
                    <li><a href="../Type_of_work.php">Тип занятия</a></li>
                </ul>
                <div class="pull-right">
						<?php if(isset($_SESSION['login'])) { ?>
							<p>Пользователь: <?php echo $_SESSION['login'];  ?></p>
							<p><a href="logout.php">Выйти</a></p>
						<?php } ?>
					</div>
            </div>
        </div>
    </nav>
</header>