<?php
namespace Wadahkode\Http;

class Route
{
  public $any = [];
  private $app;
  public $directive = [];
  private $dict = "";
  private $_GET = [];
  private $_POST = [];
  private $_FILES = [];
  public $server = [];
  private $supportedHttpMethods = [
    'GET', 'POST', 'FILES'
  ];
  private $pathname = "";
  
  public function __construct($prop)
  {
    $this->server = $prop;
  }
  
  public function __call(string $name="", array $param=[])
  {
    if (count($param) < 2) return false;
    list($pathname, $func) = $param;
    
    if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
      $this->invalidMethodHandler();
    }
    $this->pathname = $pathname;
    $this->{$name}[$this->pathHandler($pathname)] = $func;
    $this->resolve();
  }
  
  public function call($app)
  {
    $this->app = $app;
    
    if (file_exists(APP_ROUTE_DIR . 'web.php')) {
      require APP_ROUTE_DIR . 'web.php';
    } else {
      throw new \Exception('File '.APP_ROUTE_DIR . 'web.php'.' tidak dapat ditemukan!');
    }
  }
  
  private function invalidMethodHandler()
  {
    
  }
  
  private function parseURL()
  {
    $requestUri = $this->server->requestUri;
    if (preg_match("/^\/([\w]+)(.*)/", $requestUri, $match)) {
      $requestUri = rtrim($match[0], DIRECTORY_SEPARATOR);
    }
    return filter_var($requestUri, FILTER_SANITIZE_URL);
  }
  
  private function pathHandler(string $pathname="")
  {
    $result = (rtrim($pathname, '/'));
    if ($result !== '') {
      return $result;
    } else {
      return '/';
    }
  }
  
  public function require($module)
  {
    return $this->app->require($module);
  }
  
  private function resolve()
  {
    $pathname = $this->pathname;
    $pathFormated = "";
    
    if ($this->parseURL() == '/') {
      $pathname = $this->parseURL();
    } else {
      $pathname = explode('/', ltrim($this->parseURL(), DIRECTORY_SEPARATOR));
    }
    
    // kamus mencari method pada kelas Route
    $methodDict = $this->{strtolower($this->server->requestMethod)};
    
    foreach ($methodDict as $dict => $value) {
      preg_match_all('/\w+/', $dict, $d);
      
      foreach ($d[0] as $k => $v) {
        $this->directive[$v] = $pathname[$k];
      }
      
      if (!empty($this->directive)) {
        $methodDict[$dict](json_decode(json_encode($this->directive)));
      } else {
        $pathFormated = $this->pathHandler($this->server->requestUri);
      
        if (isset($methodDict[$pathFormated])) {
          echo($methodDict[$pathFormated]($this));
        }
      }
    }
  }
}