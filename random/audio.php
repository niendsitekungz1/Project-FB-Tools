		<script type="text/javascript">
<!--
 var imlocation = "random/SPD_Random/audio/";
 var currentdate = 2;
 var image_number = 0;
 function ImageArray (n) {
   this.length = n;
   for (var i =1; i <= n; i++) {
     this[i] = ' '
   }
 }
 image = new ImageArray(5)
 image[0] = 's1.mp3'
 image[1] = 's2.mp3'
 image[2] = 's3.mp3'
 image[3] = 's4.mp3'
 image[4] = 's5.mp3'
 var rand = 50/image.length
 function randomimage() {
 	currentdate = new Date()
 	image_number = currentdate.getSeconds()
 	image_number = Math.floor(image_number/rand)
 	return(image[image_number])
 }
 document.write("<source src='" + imlocation + randomimage()+ "'");
//-->
</script>