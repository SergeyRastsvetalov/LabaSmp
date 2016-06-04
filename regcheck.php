<?PHP  header("charset=utf-8");?>
<?php
	$login = $_POST['login'];
	$password1 = $_POST['password'];
	$password2 = $_POST['password2'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$today = date("d.m.y"); 
	include "connect.php";
	$filter = array("login"=>$login);
	$person = $list->findOne($filter);

	if (!preg_match('/^[a-zA-Z]{1,}$/',$name))
	{
		echo "<span style='color:crimson;font-size:18px;'>Неправильное имя</span>";
		return;
	}
	if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo "<span style='color:crimson;font-size:18px;'>Некорректная почта</span>";
		return;
	}
	if (!preg_match('/^[a-zA-Z0-9]{3,12}$/',$login))
	{
		echo "<span style='color:crimson;font-size:18px;'>Логин должен превышать 3 символа, но быть не более 12 символов</span>";
		return;
	}
	if ($person != NULL)
	{
		echo "<span style='color:crimson;font-size:18px;'>Логин уже существует</span>";
		return;
	}

	if (!preg_match('/.{6,12}/', $password1))
	{
		echo "<span style='color:crimson;font-size:18px;'>Password should be more than 6 characters and less than 12.</span>";
		return;
	}
	if ($password1 != $password2)
	{
		echo "<span style='color:crimson;font-size:18px;'>Passwords aren't equal.</span>";
		return;
	}
	else 
	{
		$user = array(
		"login"=>$login,
		"password"=>md5($password1),
		"name"=>$name,
		"email"=>$email,
		"regdate"=>$today,
		"notes"=> array(array(
			"id"=>-1,
			"text"=>"",
			"date"=>$today
		))
		);      
		$list->insert($user);
		echo "<a href='index.php' style='font-size:22px;'>Нажмите здесь для входа</a>"; 
	}

	$connection->close();
     