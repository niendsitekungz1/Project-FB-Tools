<?php
$cou = 0;
$login = 'false';

if ($config["group"] != '-'){
	$group = $config["group"];
}
if (isset($_GET["login"])){

	if (empty($_POST["token"])){
		$status["error"] = "<script>ierror('Error', 'กรุณาอย่าเว้นช่องว่าง..');</script>";
	}else{
		$check_token = curl("https://graph.facebook.com/me?access_token=".$_POST["token"]);
		$arr = json_decode($check_token,TRUE);
		if (isset($arr["error"]["message"])){
			$status["error"] = "<script>ierror('Error', 'Access Token นี้ไม่สามารถใช้งานได้..');</script>";
		}else{
		$count_friend = curl("https://graph.facebook.com/me/friends?limit=5000&access_token=".$_POST["token"]);
		$de = json_decode($count_friend,TRUE);
        foreach ($de["data"] as $count){
			$cou++;
		}
		$login = 'true';
		$status["error"] = "<script>isuccess('Success', 'เข้าสู่ระบบเรียบร้อย..');</script>";
		$act = '
		<div class="row">
  <div class="col-xs-6 col-md-3" style="float:none;">
    <a href="#" class="thumbnail">
      <img src="https://graph.facebook.com/'.$arr["id"].'/picture?type=large" alt="...">
    </a>
  </div>
</div>
		<p><b>ชื่อ : '.$arr["name"].'</b></p>
		<p><b>UID : '.$arr["id"].'</b></p>
		<p><b>เพื่อนทั้งหมด : '.number_format($cou).' คน</b></p>

<div class="input-group col-lg-5" style="float:none;">
  <span class="input-group-addon" id="basic-addon1">ไอดีกลุ่ม</span>
  <input style="text-align: center;" type="text" class="form-control" placeholder="ใส่เฉพาะตัวเลขเท่านั้น" id="group" value="'.$group.'" name="group">
</div>
<br>
		<p><button id="req" onclick="request(\''.$_POST["token"].'\');" class="btn btn-danger"><i class="fa fa-user"></i> ขอเข้ากลุ่ม</button> <button id="start" onclick="started(\''.$_POST["token"].'\');" class="btn btn-success"><i class="fa fa-plus"></i> เริ่มปั้มเพื่อนเข้ากลุ่ม</button> <a  href="index.php" class="btn btn-primary"><i class="fa fa-times"></i> ออกจากระบบ</a></p>

		'
		;
		}
	}

}
?>

<div class="page-header">
<h1><i class="fab fa-facebook"></i>&nbsp;Access Token : <?php echo number_format($count["token"]);?> ตัว</h1></div>
<div class="col-lg-7" style="float:none;">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="status">
                                <?php if(isset($status["error"])){ echo $status["error"]; }?>
                            </div>


                            <?php if(isset($act)){ echo $act; }?>

                            <?php if ($login == 'false'){?>
                            <form action="?page=addgroup&login=1" method="post">
                                <div class="input-group">
                                    <input id="access_token" type="text" class="form-control" placeholder="Access Token" name="token">
                                </div>
                                <br>

                                <button type="button" onclick="window.open('<?php echo $config["link_app"]; ?>');" class="btn btn-danger btn-block">#1 ยืนยันแอพ</button> <button type="button" onclick="window.open('view-source:<?php echo $config["link_app"]; ?>');" class="btn btn-primary btn-block">#2 รับโทเคน</button> <button type="submit" id="login" onclick="checktoken();" class="btn btn-success btn-block">#3 เข้าสู่ระบบ</button>
                            </form>
                            <?php } ?>



                        </div>
                    </div>
                </div>
