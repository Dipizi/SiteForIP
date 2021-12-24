<?php
	require 'db.php';

	if(isset($_GET['id']))
	{
		$item = R::findOne('catalog', ' id = ? ', [$_GET['id']]);
	}
?>

<html>
	<head>
	    <meta charset="utf-8">
		<style>
			@import url('/styles/all.css');
			@import url('/styles/item.css');
		</style>
		<title><?php echo $item->title;?></title>
	</head>
	<body>
		<?php include 'header.php'; ?>
		<div class="main">
			<div class="content">
				<div class="item">
					<div class="item-img">
						<img class = "poster" src='<?php echo $item->image;?>'/>
					</div>
					<h1 class = "name"><?php echo $item->title;?></h1>
					<hr>
					<ul class="item-info">
						<li><b>Добавил: </b><?php echo $item->user;?></li>
					</ul>
					<div class="item-desc">
						<p><?php echo $item->description;?></p>
					</div>
				</div>
				<?php if(isset($_SESSION['logged_user'])) : ?>
				<div class="menu">
					<ul>
						<li class="to-list" id="watch">Смотрю</li>
						<li class="to-list" id="will_watch">Буду смотреть</li>
						<li class="to-list" id="watched">Просмотрено</li>
					</ul>
				</div>
				<?php else : ?>
                <p>Выполните авторизацию чтобы установить статус.</p>
            	<?php endif; ?>
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/item.js"></script>
</html>