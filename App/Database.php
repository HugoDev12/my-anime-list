<?php 

namespace App;

class Database{

    protected $db_name;
    protected $db_user;
    protected $db_pass;
    protected $db_host;
    protected $pdo;
    // protected $table;

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
        // $this->table = strtolower(get_class());

        
    }

    protected function getPDO(){
        if($this->pdo === null){ // pour empêcher d'appeler la bdd à chaque fois que l'on fait une requête SQL
            try {
                $pdo = new \PDO('mysql:host=localhost;dbname=my_anime_list','root','');
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;                
            
            } catch(\PDOException $e){
                echo "Connection failed:" . $e->getMessage();
                exit();
            } 
        } 
        // var_dump("ok");       
        return $this->pdo;
    }



    public function select(string $field, string $value, string $table, string $class){
        $sql = "SELECT * FROM ".$table." WHERE ".$field." = :".$field."";

        $req = $this->getPDO()->prepare($sql);
        // return $req;
        $req->bindParam(":".$field, $value, \PDO::PARAM_STR);
        $req->execute();

        $req->setFetchMode(\PDO::FETCH_CLASS, $class);
        $datas = $req->fetch();
        return $datas;
    }

    /**
     * @param string $table
     * @param string $class
     * 
     * @return [type]
     */
    public function selectAll(string $table, string $class){
        $req = $this->getPDO()->query("SELECT * FROM ".$table);
        $datas = $req->fetchAll(\PDO::FETCH_CLASS, $class);
        return $datas;
    }

    /**
     * @param string $table /the name of the table focused
     * @param array $params /must be of type $param = ["field" => $value] and correspond to the focused table
     * 
     */
    public function insert(string $table, array $params){

        foreach($params as $k=>$v) $values[] = ':'.$k;

        $fields = implode(",", array_keys($params));
        $bindValues = implode(",", $values); // --> ':field, :field2, :field3...'
  

        $sql = 'INSERT INTO ' .$table. ' ('.$fields.') VALUES ('.$bindValues.')';
        $req = $this->getPDO()->prepare($sql);
        $req->execute($params); // will bind all parameters to PDO::PARAM_STR, if you want other bindings then use normal bindParam method

    }

    public function update(int $id, string $table, array $params){
        foreach($params as $k=>$v) $fields[] = $k.'=:'.$k;
        $stmt = join(",",$fields);
        
        $sql = 'UPDATE '.$table.' SET '.$stmt.' WHERE id ='.$id;
        $req = $this->getPDO()->prepare($sql);
        $req->execute($params);
        // return $sql;
    }

    public function delete(int $id, string $table, string $imgFile){
        $req = $this->getPDO()->prepare("DELETE FROM $table WHERE id = :id");
        $req->bindParam(":id", $id, \PDO::PARAM_INT);
        $req->execute();
        unlink("../imgs/".$imgFile);
        unlink("../imgs_rembg/".$imgFile);
        // return $req;
    }

}
