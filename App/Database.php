<?php 

namespace App;

class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    public function __construct(
        $db_name = 'my_anime_list',
        $db_user = 'root', 
        $db_pass = '', 
        $db_host = 'localhost')
    {

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;

        
    }

    private function getPDO(){
        if($this->pdo === null){
            try {
                $pdo = new \PDO('mysql:host=localhost;dbname=my_anime_list','root','');
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
                
            
            } catch(\PDOException $e){
                echo "Connection failed:" . $e->getMessage();
                exit();
            } 
        }
        
        return $pdo;
    }

    public function query($stmt, $class_name){
        $req = $this->getPDO()->query($stmt);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, $class_name);
        return $datas;
    }

    // public function insert($stmt)
}
