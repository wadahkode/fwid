<?php

namespace Wadahkode\Http\Session;

class SessionFactory
{
  public function __construct()
  {
    session_start();
  }

  static public function getInstance()
  {
    return new Self();
  }

  public function __call($name, $arguments)
  {
    return call_user_func_array([$this, $name], $arguments);
  }

  protected function get($name)
  {
    return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
  }

  protected function set($name, $value)
  {
    return $_SESSION[$name] = $value;
  }

  protected function clear() {
    session_destroy();
  }
}