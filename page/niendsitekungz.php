<?php
$log_directory = './Upload';
$results_array = array();
if (is_dir($log_directory)) {
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                        $results_array[] = $file;
                }
                closedir($handle);
        } }

 //foreach($results_array as $value) { echo 'http://codefb.com/avt/Upload/'.$value.'<br/>'; }
?> 
<html>
<head> 

  <div class="page-header">
    <h1 style="font-family: 'Kanit', sans-serif;" class="text-center">ระบบอัพรูปโปรไฟล์</h1></div>
<div class="col-lg-7" style="float:none;">
    <div class="panel panel-default">
        <div class="panel-heading">จัดการระบบ</div>
        <div class="panel-body">
            <div id="status">
 <div class="row">
            </div>
          <form action="javascript: excute();"> 
            <label for="access_token">Access tokene</label>
          <div class="form-group"> <textarea class="form-control" id="access_token" placeholder="EAA...
EAAA...
EAAA...
EAAA...
EAAA..."></textarea> 
          </div>
          <div style="padding-top: 10px;"></div><div class="form-group"> 
            <label for="image_url">Image url</label>
          <textarea class="form-control" id="url" placeholder="input image url"> <?php foreach($results_array as $value) { echo 'http://codefb.com/avt/Upload/'.$value,"\n"; } ?></textarea> 
          </div>
          <div class="form-group" style="text-align: right; padding-top: 10px;">
               <button id="btn-submit" class="btn btn-primary">เริ่มทำงาน</button> 
          </div>
          </form> Success: <font id="success" color="green">0</font> / Error: <font id="error" color="red">0</font> </section> 
          </div>
          </div>
          </div>
          </body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">function excute(){if($("#btn-submit").prop("disabled",!0),""==$("#access_token").val())return alert("Input token"),void $("#btn-submit").prop("disabled",!1);for(var e=$("#access_token").val().split("\n"),t=e.length,s=$("#url").val().split("\n"),o=0;o<e.length;o++){var r=s[Math.floor(Math.random()*s.length)];$.post(graph,{batch:'[{"name":"photos","method":"POST","relative_url":"/me/photos","omit_response_on_success":false,"body":"url='+encodeURIComponent(r)+'&published=0"},{"method":"POST","relative_url":"/me/picture/{result=photos:$.id}", "body":"scaled_crop_rect=%7B%22x%22%3A0%2C%22y%22%3A0%2C%22width%22%3A1%2C%22height%22%3A1%7D"}]',access_token:e[o]},function(e){200==e[0].code&&200==e[1].code?$("#success").html(parseInt($("#success").html())+1):$("#error").html(parseInt($("#error").html())+1),parseInt($("#success").html())+parseInt($("#error").html())==t&&$("#btn-submit").prop("disabled",!1)})}}const graph="https://graph.facebook.com/v2.10/";</script></html>