<?php include_once "db.php";

// $table=$_POST['table'];

$Order->del([$_POST['type']=>$_POST['data']]);