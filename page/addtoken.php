    <form method="POST">
    <div class="panel-body">
        <p>
          <textarea style="width:500px;height:200px;" class="form-control" placeholder="วางโคเทน ได้ที่นี่ เช่น 
EAA...
EAAA...
EAAA...
EAAA...
EAAA...
EAAA...
" name="upload_txt"></textarea>
        </p>
        <p>
          <button type="submit" name="sent_txt" class="btn btn-outline-warning"><i class="fa fa-upload"></i>&nbsp;เพิ่มโทเคนนน</button>
        </p>
    </form>
    <?php
    if (isset($_POST['sent_txt'])) {
		$file = fopen($file_token,"a+");
        $text = $_POST["upload_txt"];
        fwrite($file, $text);
        fclose($file);
		echo '<script>isuccess("AddToken Success !!", "เพิ่มโทเคน<br>เข้าสู่ระบบสำเร็จ");</script>';
    }
    ?>