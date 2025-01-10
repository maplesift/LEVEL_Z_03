<?php include_once "db.php";
// $_POST['id'];
// 預告影片
if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/{$_FILES['trailer']['name']}" );
    $_POST['trailer']=$_FILES['trailer']['name'];
    }
// 海報
if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../upload/{$_FILES['poster']['name']}" );
    $_POST['poster']=$_FILES['poster']['name'];
    }
    
$_POST['ondate']=$_POST['year'] ."-" .$_POST['month'] ."-" .$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);

// edit中不需更改rank sh
// if(!isset($_POST['id'])){
// }
    // $_POST['sh']=1;
    // $_POST['rank']=$Movie->max('id')+1;

$Movie->save($_POST);

// 
// dd($_POST);

to("../back.php?do=movie");