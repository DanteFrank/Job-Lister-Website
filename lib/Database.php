<?php

class Database {
    //Set Var
    private $dbhost = DB_HOST;
    private $dbuser = DB_USER;
    private $dbpass = DB_PASSWORD;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $stmt;

    public function __construct() {
        //Set DSN
        $dsn = 'mysql:host='. $this->dbhost.';dbname='. $this->dbname;

        //Set Options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }

    }

    //SQL QUERY
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    //BIND PARAMS
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int ($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);

    }

    //EXECUTE STATEMENT
    public function execute() {
        $this->stmt->execute();
    }

    //FETCH ALL RESULTS
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //FETCH A SINGLE RESULT
    public function singleSet() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

}