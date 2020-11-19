<?php
namespace App\Models;


class Users {
	public $Id;
	public $name;
  public $email;
  public $phoneNo;

  function __construct($id, $name, $email, $phoneNo) {
  	$this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->phoneNo = $phoneNo;
  }

   function get_id() {
    return $this->id;
  }

  function get_name() {
    return $this->name;
  }

  function get_email() {
    return $this->name;
  }

  function get_phoneNo() {
    return $this->name;
  }

  function set_id($id) {
    $this->id = $id;
  }

  function set_name($name) {
    $this->name = $name;
  }

  function set_email($email) {
    $this->email = $email;
  }

  function set_phoneNo($phoneNo) {
    $this->phoneNo = $phoneNo;
  }

}