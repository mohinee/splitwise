<?php
namespace App\Models;

class UserMeta{
  public $id;
  public $userId;
  public $balance;
 

  function __construct($id, $userId, $balance) {
  	$this->id = $id;
    $this->userId = $userId;
    $this->balance = $balance;
    
  }

  /**
   * Get the value of Id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of Id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of userId
   */ 
  public function getUserId()
  {
    return $this->userId;
  }

  /**
   * Set the value of userId
   *
   * @return  self
   */ 
  public function setUserId($userId)
  {
    $this->userId = $userId;

    return $this;
  }

  /**
   * Get the value of balance
   */ 
  public function getBalance()
  {
    return $this->balance;
  }

  /**
   * Set the value of balance
   *
   * @return  self
   */ 
  public function setBalance($balance)
  {
    $this->balance = $balance;

    return $this;
  }
}