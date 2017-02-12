<?php

/**
 * Created by PhpStorm.
 * User: Кирилл
 * Date: 13.01.2017
 * Time: 14:41
 */
class SQL
{
    protected $dbconfig;
    protected $pdo;
    public $connected = false;

    public function connect(){
        if($this->dbconfig==NULL)return;

        try{
            if ($this->dbconfig[4]=='sqlite')
                $this->pdo = new PDO("{$this->dbconfig[4]}:{$this->dbconfig[0]}");
            else
                $this->pdo = new PDO("{$this->dbconfig[4]}:host={$this->dbconfig[0]};dbname={$this->dbconfig[1]}", $this->dbconfig[2], $this->dbconfig[3],array(PDO::ATTR_PERSISTENT => $this->dbconfig[5]));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connected = true;
            if(isset($this->dbconfig['charset']) && isset($this->dbconfig['collate'])){
                $this->pdo->exec("SET NAMES '". $this->dbconfig['charset']. "' COLLATE '". $this->dbconfig['collate'] ."'");
            }
            else if(isset($this->dbconfig['charset']) ){
                $this->pdo->exec("SET NAMES '". $this->dbconfig['charset']. "'");
            }
        }catch(PDOException $e){
            throw new SqlMagicException('Failed to open the DB connection', SqlMagicException::DBConnectionError);
        }
    }


    public function query($query, $param=null){

        $stmt = $this->pdo->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if($param==null) {
            $stmt->execute();
        }
        else {
            $stmt->execute($param);
        }
        return $stmt;
    }
    public function setconfig($config) {
        $this->dbconfig = $config;
    }
}