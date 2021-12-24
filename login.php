<?php
	require 'db.php';

	if(isset($_POST['do_login']))
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

		$user = R::findOne('users', 'login = ?', array($_POST['login']));

		if($user)
		{
			if(password_verify($_POST['password'], $user->password))
			{
				$_SESSION['logged_user'] = $user;
				header('Location: index.php');
				exit();
			}
			else
			{
				$errors[] = 'Неправильный пароль!';
			}
		}
		else
		{
			$errors[] = 'Пользователь с таким логином не найден!';
		}

		if(!empty($errors))
		{
			echo '<p>'.array_shift($errors).'/<p>';
		}
	}
?>

<head>
    <meta charset="utf-8">
	<title>Вход</title>
</head>

<form action="/login.php" method="POST">
	<p>Логин</p>
	<input type="text" name="login" value="<?php echo @$_POST['login']; ?>">
	<br>
	<p>Пароль</p>
	<input type="password" name="password" value="<?php echo @$_POST['password'];?>">
	<button type="submit" name="do_login">Войти</button>
</form>