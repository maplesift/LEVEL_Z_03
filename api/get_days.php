<?php include_once "db.php";
$id=$_GET['movie'];
$row=$Movie->find($id);
// 上映時間
$ondate=strtotime($row['ondate']);
// 今天
$today=strtotime(date("Y-m-d"));

$passDay=floor(($today-$ondate)/(60*60*24));

for($i=$passDay;$i<3;$i++){
    $date=date("Y-m-d",strtotime("+$i days",$ondate));
    echo "<option value='$date'>";
    echo $date;
    echo "</option>";
}