<?php 
  
   $image = imagecreatefromjpeg("certificado.jpg");

   $titleColor = imagecolorallocate($image,   0,    0,    0);
   $gray       = imagecolorallocate($image, 100,  100,  100);

   //$font = dirname(__FILE__) . '/fonts/arial.ttf';
   $font = dirname(__FILE__) . '/fonts/arial.ttf';    
  
   //imagettftext($image, 32, 2, 450, 150, $titleColor, $font, "CERTIFICADO");   
   // imagettftext($image, 32, 0, 590, 150, $titleColor, "Bevan/Bevan-Regular.ttf", 
   // "SORVETERIA - POR - DO SOL");
   
   //imagettftext($image, 10, 0, 440, 350, $titleColor, "Bevan/Bevan-Regular.ttf", "PEDRO PEREIRA CORREA MOTOVLOG");
   
   //imagettfbbox($image, 0)
   imagestring($image, 3, 440, 370, utf8_decode("Concluído em: ").date("d-m-Y"), $titleColor);

   header("Content-type: image/jpeg");
   
   imagejpeg($image);

   imagedestroy($image);

?>