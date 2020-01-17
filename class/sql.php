<?php
  
  class SQL extends PDO{

     private $conexao;

      public function __construct(){
        
         $this->conexao = new PDO("mysql:host=localhost;dbname=gestao_financeira", "root", "");
          
      }

      private function setParams($statment, $parameters = array()){
                
        foreach ($parameters as $key => $value) {
            # code...
             $this->setParam($statment, $key, $value);
        }

      }

      private function setParam($statment, $key, $value){
          
        $statment->bindParam($key, $value);

      }

      public function query($rawQuery, $params = array()){
         
         $stmt = $this->conexao->prepare($rawQuery);

         $this->setParams($stmt, $params);
         
         $stmt->execute(); 

         return $stmt;
     
      }

      public function select($rawQuery, $params = array()):array{
          
         $stmt = $this->query($rawQuery, $params);

         return $stmt->fetchAll(PDO::FETCH_ASSOC);

      }

  }


?>