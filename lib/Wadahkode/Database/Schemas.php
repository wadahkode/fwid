<?php

namespace Wadahkode\Database;

abstract class Schemas extends DB
{
  private $db = null;

  // first method calling
  public function __construct()
  {
    $this->db = $this->setConnection();
  }

  /**
   * Method for create
   * 
   * @param null
   */
  public function create()
  {}

  /**
   * Method for update
   * 
   * @param null
   */
  public function update()
  {}

  /**
   * Method for read
   * 
   * @param null
   */
  public function read()
  {}

  /**
   * Method for delete
   * 
   * @param null
   */
  public function delete()
  {}
}