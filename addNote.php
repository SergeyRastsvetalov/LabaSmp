<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<?php
   include 'autorize.php';
   $note = $_POST["notes"];
   $count = count($person["notes"])-1;
   $this_day = date("d.m.y");
   $newElem = array('$push' => array("notes" => array("id"=>++$count,"text"=>$note,"date"=>$this_day)));
   $list->update($filter,$newElem);
   ?>
<script>
   document.location = 'main.php';
</script>
  