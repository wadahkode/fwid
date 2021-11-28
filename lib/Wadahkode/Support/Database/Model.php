<?php

namespace Wadahkode\Support\Database;

use Closure;
use Wadahkode\Http\Session\SessionFactory;

class Model extends Schemas
{
  static public function setModel($model)
  {
    return new Self($model);
  }

  public function deleteBy($name, $value)
  {
    return $this->delete($name, $value);
  }

  public function findAll()
  {
    return $this->read();
  }

  public function findBy($name, $value)
  {
    $this->{'bind'} = $name;
    return $this->read([$value]);
  }

  public function publish(array $data=[])
  {
    return $this->create($data);
  }

  public function session()
  {
    $this->session = SessionFactory::getInstance();

    return $this->session;
  }

  public function validate($arguments=[], Closure $callable)
  {
    $data = $this->read($arguments);
    
    if (empty($data)) {
      return $callable([
        "error"   => true,
        "message" => "Email belum terdaftar!"
      ]);
    } else if (password_verify($arguments[1], $data[0]->password)) {
      return $callable([
        "error" => false,
        "data"  => $data[0]
      ]);
    }

    return $callable([
      "error"   => true,
      "message" => "Kata sandi tidak cocok!"
    ]);
  }
}