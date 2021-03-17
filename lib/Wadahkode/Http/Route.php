<?php
namespace Wadahkode\Http;

class Route
{
  public $any = [];
  private $app;
  public $directive = [];
  private $dict;
  private $_GET = [];
  private $_POST = [];
  private $_FILES = [];
  public $server = [];
  public $request = [];
  private $supportedHttpMethods = [
    'GET', 'POST', 'FILES'
  ];
  private $pathname = "";
  private $response = [];
  
  public function __construct($prop)
  {
    $this->server = $prop;
    $this->request = $prop;
  }
  
  public function __call(string $name="", array $param=[])
  {
    if (count($param) < 2) return false;
    $pathname = $param[0];
    $func = $param[1];
    // list($pathname, $func) = $param;
    
    if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
      $this->invalidMethodHandler();
    }
    $pathFormated = $this->pathHandler($pathname);
    $this->pathname = $pathFormated;
    $this->{$name}[$pathFormated] = $func;
    $this->response = $this->resolve();
  }
  
  public function call($app)
  {
    $this->app = $app;
    
    if (file_exists(APP_ROUTE_DIR . 'web.php')) {
      require APP_ROUTE_DIR . 'web.php';
    } else {
      throw new \Exception('File '.APP_ROUTE_DIR . 'web.php'.' tidak dapat ditemukan!');
    }

    if (!is_array($this->response)) {
      printf("router [%s] tidak dapat ditemukan!", $this->server->requestMethod);
    }
  }
  
  private function defaultRequestHandler()
  {
    header("{$this->server->serverProtocol} 404 Not Found");
  }
  
  private function invalidMethodHandler()
  {
    header("{$this->server->serverProtocol} 405 Method Not Allowed");
  }
  
  private function parseURL()
  {
    $requestUri = $this->server->requestUri;
    // if (preg_match("/^\/([\w]+)(.*)/", $requestUri, $match)) {
    //   var_dump($match);
    //   $requestUri = rtrim($match[0], DIRECTORY_SEPARATOR);
    // }
    return filter_var($requestUri, FILTER_SANITIZE_URL);
  }
  
  private function pathHandler(string $pathname="")
  {
    $result = (rtrim($pathname, '/'));
    return (($result !== '') ? $result : '/');
  }
  
  public function require($module, ...$param)
  {
    return $this->app->require($module, $param);
  }
  
  private function resolve()
  {
    $pathname = $this->pathname;
    $pathFormated = "";
    
    $mdict = $this->{strtolower($this->server->requestMethod)};

    if ($pathname == $this->parseURL() && $pathname == '/') {
      if (isset($mdict[$pathname])) {
        echo $mdict[$pathname]($this);
      }
    } else if ($pathname !== '/' && $pathname == $this->parseURL()) {
      if (isset($mdict[$pathname])) {
        echo $mdict[$pathname]($this);
      }
    }

    return $mdict;
  }
}