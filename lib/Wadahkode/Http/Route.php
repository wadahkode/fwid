<?php

namespace Wadahkode\Http;

/**
 * Class Route
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
abstract class Route
{
  /**
   * Controllers
   *
   * @var string $controllers
   */
  protected $controllers = "PageNotFound";

  /**
   * Method of controllers
   *
   * @var string $method
   */
  protected $method      = "index";

  /**
   * Namespace of controllers
   *
   * @var string $namespace
   */
  protected $namespace   = "App\\Http\\Controller\\";

  /**
   * Parameter of controllers
   *
   * @var array $params
   */
  protected $params      = [];

  /**
   * Pathname of Route::get(pathname)
   *
   * @var string $pathname
   */
  protected $pathname    = "";

  /**
   * Default supported global http method for route
   *
   * @var array $supportedHttpMethods
   */
  protected $supportedHttpMethods = [
    'GET', 'POST', 'FILES', 'PUT', 'OPTIONS'
  ];
  
  /**
   * Magic method of call $this->{$_SERVER["REQUEST_METHOD"]}
   *
   * @param string $name
   * @param string $arguments
   */
  public function __call($name, $arguments)
  {
    list($pathname, $controllers) = $arguments;

    if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
      return $this->invalidMethodHandler();
    }

    $this->{$name}[$pathname] = $controllers;
  }

  /**
   * Magic method of call Route::[METHOD_NAME]
   *
   * @param string $name
   * @param string $arguments
   */
  static public function __callStatic($name, $arguments)
  {
    $routerSelf = new Routes([Request::fromGlobals()]);

    if (empty($arguments)) {
      return false;
    }

    list($pathname, $controllers) = $arguments;

    $routerSelf->pathname = $pathname;
    $routerSelf->{$name}[$pathname] = $controllers;

    return $routerSelf;
  }

  private function invalidMethodHandler()
  {
    $serverProtocol = $_SERVER["SERVER_PROTOCOL"];

    header("{$serverProtocol} 405 Method Not Allowed");
  }
}