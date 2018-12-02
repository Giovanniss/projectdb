<?php
/**  
 * Metodos do relacionados ao modelo
 */


class Modelo {
    protected $db;
    public $_tabela;

    public function __construct() {
        $this->db = new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME, DB_USER, DB_PASS);
        $this->db->exec("set names " . DB_CHARSET);
    }


    public function insert(Array $dados, $tabela) {
        $campos = implode(", ", array_keys($dados));
        $valores = "'" . implode("', '", array_values($dados)) . "'";       
        return $this->db->query("INSERT INTO `{$tabela}` ({$campos}) VALUES ({$valores})");
    }


    public function read(Array $campos = null, $where = null, $orderby = null, $limit = null) {      
        $campos = ($campos != null ? implode(", ", $campos) : "*");
        $where = ($where != null ? "WHERE {$where}" : "");
        $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
        $limit = ($limit != null ? "LIMIT {$limit}" : "");
        $q = $this->db->query("SELECT {$campos} FROM `{$this->_tabela}` {$where} {$orderby} {$limit}");
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q->fetchAll();
    }


    public function update($tabela, Array $dados, $where) {      
        foreach ($dados as $inds => $vals) {
            $campos[] = "{$inds} = '{$vals}'";
        }

        $campos = implode(", ", $campos);
        return $this->db->query("UPDATE `{$tabela}` SET {$campos} WHERE {$where}");
    }


    public function delete($tabela, $where) {
        return $this->db->query("DELETE FROM `{$this->_tabela}` WHERE {$where}");
    }
 

    public function sql($sql) {
        $q = $this->db->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        return $q->fetchAll();
    }
}