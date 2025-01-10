<a href="?do=add_movie">新增電影</a>
<hr>
<?php
$rows=$Movie->all(" order by rank");
foreach ($rows as $idx => $row):
    // 如果不是第一筆 顯示idx-1 如果是則
    $prev=($idx!=0)?$rows[$idx-1]['id']:$row['id'];
    // 如果不是最後一筆 顯示idx+1 如果是則
    $next=($idx!=(count($rows)-1))?$rows[$idx+1]['id']:$row['id'];
 ?>
<!-- overflow:auto;  -->
<div style="height:430px;">
    <div style="display:flex;">
        <div style="width:10%">
            <img src="./upload/<?=$row['poster'];?>" style="width:80px;height: 100px;">
        </div>
        <div style="width:10%">
            分級: <img src="./icon/03c0<?=$row['level'];?>.png" alt="">

        </div>
        <div style="width:80%;">
            <div style="display:flex;text-align:center;justify-content:space-between;">
                <div>片名:<?=$row['name'];?></div>
                <div>片長:<?=$row['length'];?></div>
                <div>上映時間<?=$row['ondate'];?></div>
            </div>
            <div>
                <button class="show" data-id="<?=$row['id'];?>">
                    <?=($row['sh']==1)?'隱藏':'顯示';?>
                </button>
                <button class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$prev;?>">上</button>
                <button class="sw" data-id="<?=$row['id'];?>" data-sw="<?=$next;?>">下</button>
                <button onclick="location.href='?do=edit_movie&id<?=$row['id'];?>'">編輯電影</button>
                <button class="del" data-id="<?=$row['id'];?>">刪除電影</button>
            </div>
            <div>
                劇情介紹: <?=nl2br($row['intro']);?>
            </div>
        </div>
    </div>
    <hr>
    <?php endforeach;?>
</div>

<script>
$(".sw").on("click", function() {
    let id = $(this).data('id');
    let sw = $(this).data('sw');
    $.post("./api/sw.php", {
        table: 'Movie',
        id,
        sw
    }, () => {
        location.reload();
    })
})
$(".show").on("click", function() {
    let id = $(this).data('id');
    $.post("./api/show.php", {
        id
    }, () => {
        location.reload();
    })
})
</script>