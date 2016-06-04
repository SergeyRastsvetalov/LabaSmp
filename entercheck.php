<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php 
    session_start();
    $login = $_POST["login"];
    $password = $_POST["password"];
    
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    include "autorize.php";
    if ($person["login"] != NULL && $person["password"] != NULL)
    {
        echo "<a href='main.php' style='font-size:20px;'>Нажмите здесь для входа</a>";
    }
    else 
    {
		echo "<span style='color:crimson;font-size:18px;'>Неправильные данные</span>"; 
    }