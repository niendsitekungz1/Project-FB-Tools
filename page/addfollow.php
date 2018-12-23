<div class="page-header">
<h1><i class="fab fa-facebook"></i>&nbsp;Access Token : <?php echo number_format($count["token"]);?> ตัว</h1></div>
<div class="col-lg-7" style="float:none;">
    <div class="panel panel-default">
        <div class="panel-body">
            <div id="status">
            </div>
            <div class="row" style="margin-top:20px;">
            </div>

            <div class="input-group col-lg-8" style="float:none;">
                <input style="text-align: center;" type="text" class="form-control" placeholder="UID (ตัวเลขเท่านั้น)" id="uid" value="" name="uid">
            </div>
<br>
                <div class="col-lg-5" style="float:none;"><button id="start_follow" onclick="addfollow();" class="btn btn-outline-success"><i class="fa fa-check fa-lg"></i> เริ่มปั้มผู้ติดตาม</button></div>
        </div>
    </div>
</div>
