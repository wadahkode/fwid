<?php

namespace Wadahkode\Support\Database;

class DB extends Connection
{
  protected $table    = null;

  protected $column   = null;

  public function __construct()
  {
    return parent::__construct();
  }

  protected function setTable($table)
  {
    $this->table = $table;
  }
}