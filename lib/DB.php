<?php
require_once $base_dir.'/config.php';

class DB{
    protected $db;
    public $sql;
    public $values;


    public function __construct(){
        $this->db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

    public function getRow(){
        $query = $this->db->prepare($this->sql);
        $query->execute($this->values);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOne(){
        $stmt = $this->db->prepare($this->sql);
        $stmt->execute($this->values);
        $result = $stmt->fetch(PDO::FETCH_NUM);
        return $result[0];
    }

    public function execute_query(){
        $stmt = $this->db->prepare($this->sql);
        return $stmt->execute($this->values);
    }

    public function getArray($paginate=false){
        $stmt = $this->db->prepare($this->sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if(is_array($this->values)){
            $stmt->execute($this->values);
        }else{
            $stmt->execute();
        }
        $results = $stmt->fetchAll();
        if($paginate){
            $start = paginate($stmt->rowCount());
            $results = array_slice($results, $start, PAGINATE_PAGE_SIZE);
        }
        return $results;
    }

    public function exists($key, $table, $column='id'){
        if(is_array($key)){
            $this->sql="select count(*) from $table ";
            $i=0;
            foreach($key as $k => $v){
                if($i==0){
                    $this->sql .="where $k = ? ";
                }else{
                    $this->sql .= "and $k = ?";
                }
                $this->values[]=$v;
                $i++;
            }
        }else{
            $this->sql = "select count(*) from $table where $column = ?";
            $this->values = array($key);
        }
        return $this->getOne($this->sql, $this->values);
    }

    public function echo_sql(){
	     echo vsprintf(str_replace("?", "'%s'",$this->sql),$this->values);
    }
}
?>
