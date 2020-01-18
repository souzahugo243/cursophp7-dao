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

       public static function getList(){
           
         $sql = new SQL();
           
         return $sql->select("SELECT * from SERIE order by id_serie");
       
        }

       public static function search($parametro){
           $SQL = new SQL();

           return $SQL->select("SELECT * FROM SERIE WHERE DESCRICAO LIKE :DESC ORDER BY ID_SERIE",
                               array(
                                   ":DESC"=>"%".$parametro."%"
                               ));
       }

       public static function logar($username, $password){
           $SQL = new SQL();
           

        $verificaAcesso =  $SQL->select("SELECT 1 FROM USUARIO WHERE USERNAME = :USERNAME AND PASSWORD = :PASSWORD",
                        array(
                          ":USERNAME"=>$username,
                          ":PASSWORD"=>$password
                        ));

         if (Count($verificaAcesso) >= 1){
            $MSG = 'Existe Usuario Cadastrado';
         }else{
            $MSG = 'Não Existe Usuario Cadastrado, nao pode contiuar.';
         }                                
        return $MSG;                           
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