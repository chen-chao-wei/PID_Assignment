<?php
class DB {
  private $pdo = null;
  private $stmt = null;

  function __construct(){
    try {
      $this->pdo = new PDO(
        "mysql:host=localhost:8889;dbname=pid;charset=utf8", 
        "root", "root", [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      );
    } catch (Exception $ex) { die($ex->getMessage()); }
  }

  function __destruct(){
    if ($this->stmt!==null) { $this->stmt = null; }
    if ($this->pdo!==null) { $this->pdo = null; }
  }

  function select($sql, $cond=null){
    $result = false;
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($cond);
      $result = $this->stmt->fetchAll();
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }
  function insert($sql, $cond=null){
    $result = false;
    try {      
      $result = $this->pdo->query($sql);
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }
  function update($sql, $cond=null){
    $result = false;
    try {      
      $result = $this->pdo->query($sql);
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }
  function delete($sql, $cond=null){
    $result = false;
    try {      
      $result = $this->pdo->query($sql);
    } catch (Exception $ex) { die($ex->getMessage()); }
    $this->stmt = null;
    return $result;
  }

  
}
