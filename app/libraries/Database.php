<?php

class Database
{
  private static $instance;
  private $dbh;
  private $stmt;

  private function __construct()
  {
    $this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  // public function getConnection() {
  //     return $this->dbh;
  // }

  // Prepare statement with query
  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Bind values
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
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

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  // Get result set as array of objects
  public function fetchAll()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get single record as object

  public function fetch()
  {
    $this->stmt->execute();
    $result = $this->stmt->fetch(PDO::FETCH_OBJ);

    return $result;
  }
  // Get row count
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
  public function getUserByEmailAndRole($email)
  {
    $this->query('SELECT * FROM admins WHERE email = :email');
    $this->bind(':email', $email);

    try {
      $user = $this->fetch();

      if ($user && $user->role == 1) {
        return $user;
      } else {
        return null;
      }
    } catch (PDOException $e) {

      return null;
    }
  }
}



?>