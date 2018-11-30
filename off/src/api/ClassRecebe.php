<?php
include("ClassConexao.php");

class ClassRecebe extends ClassConexao {
    
    #busca no banco de dados em um json
    public function exibe () {
        $BFetch = $this->conectaDB()->prepare("select * from pessoas");
        $BFetch->execute();

        $j[];
        $i=0;

        while ($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
            $j[$i] =  [
                "id" = $Fetch['IDpessoa'],
                "nome" = $Fetch['nome'],
                "datanasc" = $Fetch['datanasc'],
                "cpf"   = $Fetch['CPF'],
                "sexo" = $Fetch['sexo'];
            ];
            $i++;
        }

        header("Access-Control-Allow-Origin:*");
        header("Content-type: application/json");
        echo json_encode($j);
    }
}