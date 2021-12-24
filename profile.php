<?php
	require 'db.php';
?>

<html>
	<head>
	    <meta charset="utf-8">
		<title>Профиль</title>
		<style>
    		@import url(/styles/profile.css);
			@import url(/styles/all.css);
		</style>
	</head>
	<body>
		<?php include 'header.php';?>

		<div class="main">
			<div class="profile-block">
				<div class="welcome">
					<h2>Ваш профиль, <?php echo $_SESSION['logged_user']->login ?></h2>
				</div>
			</div>
			<div class="lists">
				<div class="status-menu">
					<ul>
						<li id='watch'>Смотрю</li>
						<li id='will_watch'>Буду смотреть</a></li>
						<li id='watched'>Просмотрено</li>
					</ul>
				</div>
				<div class="content">
				</div>
			</div>
		</div>

	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/profile.js"></script>
</html>