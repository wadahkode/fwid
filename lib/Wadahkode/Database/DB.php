<?php

namespace Wadahkode\Database;

class DB extends Connection
{
  public function __construct()
  {
    return $this->setConnection();
  }
}