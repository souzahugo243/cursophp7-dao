<?php
 
  $data = array(
       "empresa"=>"Treinamentos"
  );

  $setcookie = setcookie("NOME_DO_COOKIE", json_encode($data), time() + 3600);

  echo "OK";

  

?>