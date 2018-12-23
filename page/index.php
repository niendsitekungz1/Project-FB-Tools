<?php
if ($_GET["check_token"] == '1'){
$alert["checktoken"] = '<script>itoken("Token Success !!", "เคลียร์ Token เรียบร้อบแล้วว");</script>';
}

?>
    <h1 style="font-size: 40px;"></h1>
    <p>Token ในระบบมีทั้งหมด <?php echo number_format($count["token"]); ?> Token</p>
	<?php echo $alert["checktoken"]; ?>
    <p><a class="btn btn-outline-danger"  onclick="check_token();" href="?page=check_access_token" id="checktoken" role="button">เริ่มเช็ค Access Token ที่ใช้งานไม่ได้</a></p>
