<?php
  require_once("config.php");
  $sql = new SQL();

  $usuarios = $sql->select("SELECT * FROM USUARIO");

  echo json_encode($usuarios);
?>