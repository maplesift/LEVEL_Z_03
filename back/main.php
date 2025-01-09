<?php

if(isset($_POST['acc'])) {

    if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
        $_SESSION['login']=1;
    }else{
        echo " <div class='ct'> 帳號或密碼錯誤 </div>";
    }
    
}

if(empty($_SESSION['login'])):?>
<form action="?" method="post">
    <table class="tab ct" style="width:300px;">
        <tr>
            <td>帳號:</td>
            <td><input name="acc" id="acc" type="text"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input name="pw" id="pw" type="text"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="登入">
        <input type="reset" value="重置">
    </div>
    <?php else:?>
    <div class="rb tab">
        <h2 class="ct">請選擇所需功能**</h2>
    </div>
    <?php endif;?>

</form>