<?php header ("Content-Type: text/html; charset=utf-8")?>
<?php
     include 'autorize.php';
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Notes
        </title>
        <link rel="stylesheet" href="style.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/jquery-ui.min.js"></script>

        <script type="text/javascript">
            
    $(function() {
	
	$('.form2').draggable({
        containment: "window"
    });
});
    </script>
    </head>
    <body>
        <div align="right"><label>Приветствуем, <?php  echo $person["name"];?> | <a href="logout.php">Разлогиниться</a></label></div><br>
        <h2>Создавайте собственные записи!</h2>
        <div align="center">
        <div class="form">
         <form method="post" action="addNote.php">
         <textarea class="note" name="notes" cols="48" rows="7" wrap="hard" required placeholder="Write your note here..."></textarea><br><br>
         <input type="submit" value="OK" class="button3"/>
         <span id="result"></span>
         </form>
        </div>  
        </div>
        
        <hr width="60%">
        <h2 style="text-align:center">Ваши записи</h2><?php
    $notes = $person["notes"];
    if (count($notes)== 1)
    {
        echo "<div align='center'><div class='form' style='text-align:center;'><span style='color:crimson;font-size:24px;font-family:cursive;'>Create your first note now!</span></div></div>";
    }
    for ($i = count($notes)-1; $i > 0; $i--)
    {
        ?>
        <div align="center" >
            <div class ="form2">
            <h5 style='width:20%'><?php echo $notes[$i]["date"]?></h5>
            <form method="post" action="deleteNote.php" id="delete">
                <input type="submit" value="Delete" class="btn1" title="Delete"/>
                <textarea class="id" name="id" ><?php echo $notes[$i]["id"]?></textarea>         
            </form>
            <form method="post" action="changenote.php">
            <textarea class="id" name="id"><?php echo $notes[$i]["id"]?></textarea>
            <textarea class="note2" name="note" cols="48" rows="7" wrap="hard" onkeypress="if(event.keyCode==10||(event.ctrlKey && event.keyCode==13))koment.click();"><?php echo $notes[$i]["text"];?>
            </textarea>
            <input type="submit" value="Save" class="btn" id="koment"/>
            </form>
            
            </div>
            </div><?php
    }?>
        
    </body>
</html>