<?php include_once "db.php";?>

<div id="info">
    <?php
for ($i=0; $i <20 ; $i++) { 
    echo "<div class='seat null'>";
    echo floor($i/5)+1 ."排".($i%5+1)."號";
    echo "<input type='checkbox' value='$i' >";
    echo "</div>";
}
?>
</div>
<div id="movieInfo">
    <div>您選擇的電影是：<?=$_GET['name'];?></div>
    <div>您選擇的時刻是：<?=$_GET['date']."&nbsp;&nbsp;".$_GET['session'];?></div>
    <div>您已經<span id='tickets'></span>勾選張票，最多可以購買四張票</div>
    <div class='ct'>
        <button onclick="$('#booking,#order').toggle()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>

</div>