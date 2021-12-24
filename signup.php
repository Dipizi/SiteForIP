<?php
	require 'db.php';

	if(isset($_POST['do_signup']))
	{
		//массив для ошибок
		$errors = array();

		//если не введен логин
		if(trim($_POST['login']) == '')
		{
			$errors[] = 'Введите логин!';
		}

		//если не введен пароль
		if($_POST['password'] == '')
		{
			$errors[] = 'Введите пароль!';
		}

		//проверяем, есть ли уже такой пользователь
		if(R::count('users', 'login = ?', array($_POST['login'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже есть!';
		}

		//если всё хоккей, то регистрируем
		if(empty($errors))
		{
			$user = R::dispense('users');
			$user->login = $_POST['login'];
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			R::store($user);
			echo '<p>Успешная регистрация!</p>';
			sleep(2);
			header("Location: ".$_SERVER['HTTP_REFERER']);
		}
		else //иначе выводим сообщение об ошибке
		{
			echo '<p>'.array_shift($errors).'</p>';
		}
	}
?>

<?php include ("header.php"); ?>

<style>
	@import url("/styles/all.css");
	@import url("/styles/signup.css");
</style>

<head>
    <meta charset="utf-8">
	<title>Регистрация</title>
</head>
<body>
	<div class="main-block">
		<form action="/signup.php" method="POST">
			<p>Логин</p>
			<input type="text" name="login" value="<?php echo @$_POST['login']; ?>">
			<br>
			<p>Пароль</p>
			<input type="password" name="password" value="<?php echo @$_POST['password'];?>">
			<br>
			<button type="submit" name="do_signup">Зарегистрироваться</button>
		</form>
	</div>
</body>