<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster-block">
            <div class="lists">
                <?php
                $posters=$Poster->all(['sh'=>1]," order by rank");
                foreach($posters as $idx =>$poster):
                ?>
                <div class="poster" data-ani="<?=$poster['ani'];?>">
                    <img src="./upload/<?=$poster['img'];?>" alt=""><br>
                    <span><?=$poster['name'];?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="controls">
                <div class="left">

                </div>
                <div class='icons'>
                    <?php foreach($posters as $idx =>$poster): ?>
                    <div class="icon">
                        <img src="./upload/<?=$poster['img'];?>" alt="">
                        <div><?=$poster['name'];?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="right">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('.poster').eq(0).show();

let slider = setInterval(() => {
    sliders();
}, 2000);



function sliders(next = -1) {
    let now = $(".poster:visible").index();
    if (next == -1) {
        next = ($(".poster").length == now + 1) ? 0 : now + 1;
    }
    this.next = next
    let ani = $(".poster").eq(next).data('ani');


    switch (ani) {
        case 1:
            $(".poster").eq(now).fadeOut(750, function() {

                $(".poster").eq(next).fadeIn(750);
            });
            break;
        case 2:
            $(".poster").eq(now).hide(750, function() {

                $(".poster").eq(next).show(750);
            });

            break;
        case 3:

            $(".poster").eq(now).slideUp(750, function() {

                $(".poster").eq(next).slideDown(750);
            });

            break;
    }
}
// 按鈕水平位移
let total = $(".icon").length;
let p = 0
$(".left,.right").on("click", function() {
    if ($(this).hasClass('left')) {
        if (p - 1 >= 0) {
            p--;
        }
        // p = (p - 1 >= 0) ? p - 1 : 0;
    } else {

        if (p + 1 <= total - 4) {
            p++
        }
        // p = (p + 1 <= total - 4) ? p + 1 : total - 4;
    }
    $(".icon").animate({
        right: p * 80
    });
})
// hover 滑鼠fun1移入fun2移出
$(".icons").hover(
    function() {
        clearInterval(slider);
    },
    function() {
        slider = setInterval(() => {
            sliders();
        }, 2000);
    }
)

$(".icon").on("click", function() {
    let next = $(this).index();
    sliders(next);
})
</script>



<div class="half">
    <h1>院線片清單</h1>
    <?php
    $today=date("Y-m-d");
    $ondate=date("Y-m-d",strtotime("-2 days"));
    
    $all=$Movie->count(['sh'=>1]," AND ondate BETWEEN '$ondate' AND '$today'");
    $div=4;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;

    $rows=$Movie->all(['sh'=>1]," AND ondate BETWEEN '$ondate' AND '$today' order by rank limit $start,$div");
    
    // dd($rows);
    ?>

    <div class="rb tab" style="width:95%;">
        <div style="display:flex;flex-wrap:wrap;">
            <?php foreach ($rows as $row): ?>
            <div class="movie-item">

                <div style="width:65px">
                    <a href="?do=intro&id=<?=$row['id'];?>">
                        <img src="./upload/<?=$row['poster'];?>" style="width: 60px;height: 80px;">
                    </a>
                </div>
                <div style="width:calc(100% - 65px);">
                    <div>片名:<?=$row['name'];?></div>
                    <div>分級:
                        <img src="./icon/03C0<?=$row['level'];?>.png" style="width:20px;vertical-align:middle">
                        <?=$Movie::$level[$row['level']];?>
                    </div>
                    <div>上映日期:<?=$row['ondate'];?></div>
                </div>
                <div>
                    <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'"> 劇情簡介</button>
                    <button onclick="location.href='?do=order&id=<?=$row['id'];?>'"> 線上訂票</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="ct">
            <!-- 分頁 -->
            <?php

                if(($now-1)>0){
                    echo "<a href='?p=".($now-1)."' > < </a>";
                }
                
                for($i=1;$i<=$pages;$i++){
                    $fontsize=($i==$now)?'24px':'18px';
                    echo "<a href='?p=$i' style='font-size:$fontsize'>$i</a>";
                }
                
                if(($now+1)<=$pages){
                    echo "<a href='?p=".($now+1)."' > > </a>";
                }


            ?>
        </div>
    </div>
</div>
<style>

</style>