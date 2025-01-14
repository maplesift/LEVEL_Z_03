<?php include_once "db.php";?>

<div id="info">
    <?php
for ($i=0; $i <20 ; $i++) { 
    echo "<div class='seat null'>";
    echo floor($i/5)+1 ."排".($i%5+1)."號";
    echo "<input type='checkbox' value='$i' class='chk' >";
    echo "</div>";
}
?>
</div>
<div id="movieInfo">
    <div>您選擇的電影是：<?=$_GET['name'];?></div>
    <div>您選擇的時刻是：<?=$_GET['date']."&nbsp;&nbsp;".$_GET['session'];?></div>
    <div>您已經勾選<span id='tickets'></span>張票，最多可以購買四張票</div>
    <div class='ct'>
        <button onclick="$('#booking,#order').toggle()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>
</div>

<script>
let seats = new Array();

$(".chk").on("change", function() {
    if ($(this).prop('checked')) {
        if (seats.length > 3) {
            alert("最多只能選四張票");
            $(this).prop('checked', false);
        } else {
            // 把 值丟入 陣列seats
            seats.push($(this).val());
        }

    } else {
        // 把值 從seats移出
        seats.splice(seats.indexOf($(this).val()), 1) // 1=>刪除的個數
    }
    $("#tickets").text(seats.length)
    // console.log(seats);
})

function checkout() {
    movie.seats = seats;
    console.log(movie);
    $.post("api/checkout.php", movie, function(res) {
        console.log(res);
        $('#mm').html(res);
    })
}
</script>