<?php

class DB{

    private $dsn;
    private $username;
    private $password;

    public function __construct(){
      $this->dsn = 'firebird:dbname=localhost:C:\\PRUEBA.FDB;charset=utf8;';
      $this->username = 'SYSDBA';
      $this->password = 'masterkey';
    }

    function connect(){

          try {
            $dbh = new \PDO($this->dsn, $this->username, $this->password,
                            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
            return $dbh;

          } catch (\PDOException $e) {
            echo $e->getMessage();
          }
    }
}
?>
