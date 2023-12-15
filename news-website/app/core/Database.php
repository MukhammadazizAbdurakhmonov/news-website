<?php

/**
 * Database
 * 
 * A connection to database
 * Creating prepared statements
 * Binding values 
 * Return results set/single row as objects
 */
class Database{
    /**
     * Database host
     * @var {string}
     */
    private $host = DB_HOST;
    
    /**
     * Database uername
     * @var {string}
    */
    private $username = DB_USERNAME;

    /**
     * Database password
     * @var {string}
     */
    private $password = DB_PASSWORD;

    /**
     * Database name
     * @var {string}
     */
    private $name = DB_NAME;

    /**
     * Database connection
     * @var {string}
     */
    private $conn;

    /**
     * Prepared statement
     * @var {string}
     */
    private $stmt;

    /**
     * Database error
     * @var {string}
     */
    private $error;

    /**
     * Return connection when Database class instantiated
     */
    public function __construct(){
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;

      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try{
        $this->conn = new PDO($dsn, $this->username, $this->password, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    /**
     * Preparing query
     *
     * @param [string] $sql
     * @return [prepared statement]
     */
    public function query($sql){
      $this->stmt = $this->conn->prepare($sql);
    }

    /**
     * Binding values to prepared statement
     *
     * @param [string|int] $value
     * @param [mixed] $param
     * @param array $type
     * @return [boolean]
     */
    public function bind($value, $param, $type = null){
      if (is_null($type)) {
        switch(true){
            case is_int($value):
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
        }
      }
      $this->stmt->bindValue($value, $param, $type);
    }

    /**
     * Execute SQL
     *
     * @return [boolean]
     */
    public function execute(){
      return $this->stmt->execute();
    }

    /**
     * Results of the execution
     *
     * @return [array of results as objects]
     */
    public function results(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Single result of execution
     *
     * @return [single result as object]
     */
    public function singleResult(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * First row of results set
     *
     * @return void
     */
    public function rowCount(){
      return $this->stmt->fetchColumn();
  }
}