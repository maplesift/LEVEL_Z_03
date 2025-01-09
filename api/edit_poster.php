<?php include_once "db.php";

if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){
        // del
        if (isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Poster->del($id);
        }else{
            // 編輯
            $row=$Poster->find($id);
            $row['name']=$_POST['name'][$idx];
            $row['ani']=$_POST['ani'][$idx];
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $Poster->save($row);
        }
    }
}



$do=$_GET['do'];
// echo $do;
to("../back.php?do=$do");