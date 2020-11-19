<?php

namespace App\Models;


class Transaction{
	
	public $id;
	public $userId;
  public $amount;
  	
  function __construct($id, $userId, $amount) {
    $this->id = $id;
    $this->userId = $userId;
    $this->amount = $amount;
  }


	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
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
   * Get the value of amount
   */ 
  public function getAmount()
  {
    return $this->amount;
  }

  /**
   * Set the value of amount
   *
   * @return  self
   */ 
  public function setAmount($amount)
  {
    $this->amount = $amount;

    return $this;
  }
}