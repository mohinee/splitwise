<?php
namespace App\Models;

class TransactionMeta{
    public $id;
    public $userId;
    public $splitType;
    public $splitFactor;
    public $amountPayable;
    public $payToUserId;
    public $isActive;

    public function __construct($id, $userId, $splitType,$splitFactor,$amountPayable,$payToUserId,$isActive)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->splitType = $splitType;
        $this->splitFactor = $splitFactor;
        $this->amountPayable = $amountPayable;
        $this->payToUserId = $payToUserId;
        $this->isActive = $isActive;
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
     * Get the value of splitType
     */ 
    public function getSplitType()
    {
        return $this->splitType;
    }

    /**
     * Set the value of splitType
     *
     * @return  self
     */ 
    public function setSplitType($splitType)
    {
        $this->splitType = $splitType;

        return $this;
    }

    /**
     * Get the value of splitFactor
     */ 
    public function getSplitFactor()
    {
        return $this->splitFactor;
    }

    /**
     * Set the value of splitFactor
     *
     * @return  self
     */ 
    public function setSplitFactor($splitFactor)
    {
        $this->splitFactor = $splitFactor;

        return $this;
    }

    /**
     * Get the value of amountPayable
     */ 
    public function getAmountPayable()
    {
        return $this->amountPayable;
    }

    /**
     * Set the value of amountPayable
     *
     * @return  self
     */ 
    public function setAmountPayable($amountPayable)
    {
        $this->amountPayable = $amountPayable;

        return $this;
    }

    /**
     * Get the value of payToUserId
     */ 
    public function getPayToUserId()
    {
        return $this->payToUserId;
    }

    /**
     * Set the value of payToUserId
     *
     * @return  self
     */ 
    public function setPayToUserId($payToUserId)
    {
        $this->payToUserId = $payToUserId;

        return $this;
    }

    /**
     * Get the value of isActive
     */ 
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @return  self
     */ 
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }
}