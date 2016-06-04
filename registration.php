<?php
header ("Content-Type: text/html; charset=utf-8");?>
<!DOCTYPE html>
<html>
<head>
 <title>Sign up</title>
        <link rel="style" href="style.css"/>
        <script src="jquery-2.2.2.min.js"></script>
        <script>
             function AjaxFormRequest(result_id,form_id,url) {
                jQuery.ajax({
                    url:url, //Адрес подгружаемой страницы
                    type:"POST", //Тип запроса
                    dataType:"html", //Тип данных
                    data: jQuery("#"+form_id).serialize(), 
                    success: function(response) 
					{ 
                    document.getElementById(result_id).innerHTML = response;
                    },
                error: function(response) { //Если ошибка
                document.getElementById(result_id).innerHTML = "Ошибка при отправке формы";
                }
             });
        }
         </script>
      
    </head>
    <body>
        <br><br><br>
        <h1>Registration</h1>
        <div align = "center">
            <div class = "form" >
                <form action="" method="post" id="regForm">
                    <label>Имя</label><br><input type="text" name="name" class="data" autofocus /><br><br>
                    <label>Почтовый ящик</label><br><input type ="tel" name="email" class="data" /><br><br>
                    <label>Логин</label><br><input type ="text" name="login" class="data"  autocomplete="off"/><br><br>
                    <label>Пароль</label><br><input type="password" name="password" class="data" /><br><br>
                    <label>Подтверждение пароля</label><br><input type="password" name="password2" class="data" /><br><br>
					<label>Уже зарегистрированы?<a href="index.php">Вход</a></label><br><br>
                    <input type="button" value="Sign up" class = "button3" onclick="AjaxFormRequest('result','regForm','regcheck.php')"/>
                    <div id="result"></div>
                </form>
            </div>
        </div>
    </body>
</html>