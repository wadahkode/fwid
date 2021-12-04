<?php

namespace Wadahkode\Http;

/**
 * Router factory
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
abstract class RouterFactory extends Route
{
  /**
   * Request property
   *
   * @var array
   */
  private $request = [];

  /**
   * First method is call
   *
   * @param array $request
   */
  public function __construct(array $request=[])
  {
    return $this->request = array_merge($request, [
      "fileRouter" => $this->getFileRouter()
    ]);
  }

  // File router
  private function getFileRouter()
  {
    return [
      APP_ROUTE_DIR . "web" . PHP_EXT
    ];
  }

  // Get web router
  protected function getWebRouter()
  {
    if (isset($this->request['fileRouter']) && is_array($this->request['fileRouter'])) {
      foreach ($this->request['fileRouter'] as $fileRouter) {
        require($fileRouter);
      }
    }
  }

  // Parse and filter url
  private function parseURL()
  {
    $requestUri = $this->request[0]->requestUri;

    if (preg_match("/^\/([\w]+)(.*)/", $requestUri, $match)) {
      $requestUri = rtrim($match[0], DIRECTORY_SEPARATOR);
    }

    return filter_var($requestUri, FILTER_SANITIZE_URL);
  }

  // Check url, controller, and execute it
  protected function resolve()
  {
    array_map(function($directive){
      preg_match("/\{([a-zA-Z]+)\}/", $directive, $match);
      $a = explode("/", $directive);
      $b = explode("/", $this->parseURL());

      $c = (count($a) == count($b));

      if (!empty($match) && $c) {
        $explodes = explode("/", $this->parseURL());

        $this->request[0]->{end($match)} = end($explodes);
        $this->request[0]->requestUri = str_replace(end($explodes), $match[0], implode("/", $explodes));
      }

    }, array_keys($this->{strtolower($this->requestMethod())}));

    $requestMethod = strtolower($this->requestMethod());
    $requestUri = $this->parseURL();

    if (!isset($this->{$requestMethod}[$requestUri])) {
      printf("Router [%s] %s tidak dapat ditemukan.", strtoupper($requestMethod), $requestUri);

      return $this->invalidMethodHandler();
    }

    preg_match('/(^[\w]+)@([\w]+)$/i', $this->{$requestMethod}[$requestUri], $explodes);
    unset($explodes[0]);
    sort($explodes);

    if (empty($explodes)) {
      preg_match('/(^[\w]+)\/([\w]+)@([\w]+)$/i', $this->{$requestMethod}[$requestUri], $explodes);
      unset($explodes[0]);
      sort($explodes);
    }
        
    if (is_dir(APP_CONTROLLER_DIR . $explodes[0])) {
      $this->namespace = $this->namespace . $explodes[0] . "\\";
      unset($explodes[0]);
      sort($explodes);
    }

    list($controllers, $method) = $explodes;

    // $explodes = explode("@", $this->{$requestMethod}[$requestUri]);
    $this->controllers = $this->namespace . $controllers . "Controller";
    $this->method      = $method;
    $this->params      = $this->request[0];
    // switch ($requestMethod) {
    //   case 'get':
    //     break;
    //   case 'post':
    //     var_dump(isset($this->{$requestMethod}[$requestUri]));
    //     break;
    // }

    if (!class_exists($this->controllers)) {
      printf("<br>Kelas <b>[%s]</b> tidak dapat ditemukan.", $this->controllers);

      return $this->defaultControllerHandler();
    } else if (!method_exists($this->controllers, $this->method)) {
      printf("Method <b>[%s]</b> tidak ada pada kelas <b>%s</b>", $this->method, $this->controllers);

      return $this->invalidMethodHandler();
    }

    return call_user_func_array([new $this->controllers($this->params), $this->method], [$this->params]);
  }

  private function requestMethod()
  {
    return $this->request[0]->requestMethod;
  }

  private function defaultControllerHandler()
  {
    header("{$this->request[0]->serverProtocol} 500 Not Found Controller");
  }

  private function defaultRequestHandler()
  {
    header("{$this->request[0]->serverProtocol} 404 Not Found");
  }

  private function invalidMethodHandler()
  {
    header("{$this->request[0]->serverProtocol} 405 Method Not Allowed");
  }
}