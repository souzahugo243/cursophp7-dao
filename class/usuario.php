<?php
  
   class Usuario {
     private $idUsuario;  
     private $nomeUsuario;

       public function getNomeUsuario(){
           return $this->nomeUsuario;
       }

       public function setNomeUsuario($value){
           return $this->nomeUsuario = $value;
       }

       public function getIdUsuario(){
           return $this->idUsuario;
       }
       
       public function setIdUsuario($value){
           return $this->idUsuario = $value;
       }

       public function loadById($id){

          $sql = new SQL();

          $results = $sql->select("SELECT * FROM usuario where id_usuario = :ID", array(
            ":ID"=>$id
          ));

          if (count($results) > 0){
              $row = $results[0];

              $this->setIdUsuario($row['ID_USUARIO']);
              $this->setNomeUsuario($row['NOME_USUARIO']);

          }

       }

       public function __toString()
       {
           return json_encode(array(
               "id_usuario"=>$this->getIdUsuario(),
               "nome_usuario"=>$this->getNomeUsuario()
           ));
       }
   }


?>