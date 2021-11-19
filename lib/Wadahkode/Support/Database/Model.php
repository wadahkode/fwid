<?php

namespace Wadahkode\Support\Database;

class Model extends Schemas
{
  static public function setModel($model)
  {
    return new Self($model);
  }

  public function findAll()
  {
    return $this->read();
  }
}