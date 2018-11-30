<?php
    abstract class ClassConexao {
        
        #conexao com bd
        protected function conectaDB(){
            try {
                $con = new PDO("mysql:host=localhost;dbname=projectdb","root","");
                return $con;
            } catch (PDOException $Erro) {
                return $Erro->getMessage();
            }
        }   
    }
