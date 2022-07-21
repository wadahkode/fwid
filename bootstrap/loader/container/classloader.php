<?php
/**
 * ClassLoader
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
abstract class ClassLoader
{
  /**
   * @var string $basepath
   */
  protected $basepath = "";
  
  /**
   * @var object Zip
   */
  protected $compiler;
  
  /**
   * @var array $psr
   */
  protected $psr = [
    0 => [],
    4 => []
  ];
  
  /**
   * @var array $psr0
   */
  protected $psr0 = [];
  
  /**
   * @var array $psr4
   */
  protected $psr4 = [];
  
  /**
   * @var string|array $prefix
   */
  protected $prefix;
  
  /**
   * @var string|array $path
   */
  protected $path;
  
  /**
   * @var string $vendor
   */
  protected $vendor = "";
  
  /**
   * @param string $basepath
   */
  public function __construct(String $basepath = "")
  {
    $this->basepath = (
      !empty($basepath)
        ? $basepath
        : realpath(rtrim(dirname(__DIR__, 3), "/\\")) . DIRECTORY_SEPARATOR
    );
    return $this;
  }
  
  /**
   * Metode add
   * 
   * @param string $prefix
   * @param string $paths
   * @example: $factory->add('Wadahkode', __DIR__);
   */
  public function add(...$class)
  {
    return $this->createPsr($class);
  }
  
  private function call()
  {
    $psr0 = $this->get('psr', 0);
    $psr4 = $this->get('psr', 4);
    
    if (!$this->development) {
      return $this->psrCallbackProduction(array(
        0 => $psr0,
        4 => $psr4
      ));
    }
    return $this->psrCallback(array(
      0 => $psr0,
      4 => $psr4
    ));
  }
  
  /***
   * @callable $instance
   * @example:
   * 
   * Autoload::createFactory(function($factory){
   *    $factory->is('vendor')->register();
   * });
   */
  static public function createFactory(callable $factory)
  {
    return (
      ($factory instanceof Closure)
        ? $factory(new self)
        : $factory()
    );
  }
  
  private function createPsr(array $psr = [])
  {
    foreach ($psr as $arr) {
      foreach ($arr as $prefix => $path) {
        $this->path[rtrim($prefix, '/\\')] = (
          $this->development && $prefix !== 'App\\'
            ? $path . DIRECTORY_SEPARATOR . rtrim($prefix, '/\\') . DIRECTORY_SEPARATOR
            : $path . DIRECTORY_SEPARATOR
        );
      }
    }
  }

  private function defaultFileHandler()
  {
    $serverProtocol = $_SERVER["SERVER_PROTOCOL"];

    header("{$serverProtocol} 404 Not Found");
  }
  
  private function findClass($className, $default = null)
  {
    $delimiter = count($default);
    if ($delimiter > 2) {
      $this->psr[0] = explode("/", str_replace("\\", "/", $className));
    } else {
      $this->psr[4] = explode("/", str_replace("\\", "/", $className));
    }
    return $this->call();
  }
  
  private function findFile($filename)
  {
    return(
      file_exists("{$filename}.php")
        ? $filename . ".php"
        : false
    );
  }
  
  private function get($prop, $key = 0)
  {
    if (property_exists($this, $prop)) {
      if (is_array($this->{$prop}) && array_key_exists($key, $this->{$prop})) {
        return $this->{$prop}[$key];
      }
    }
  }
  
  private function getAutoload($prepend)
  {
    spl_autoload_register(array($this, 'loadClass'), true, $prepend);
  }
  
  private function getComposer()
  {
    $this->unregister();
    $this->includeFile($this->vendor . 'autoload');
  }
  
  public function is($name)
  {
    $this->{$name} = (
      $this->composer ? $this->basepath . 'vendor' . DIRECTORY_SEPARATOR : ''
    );
    return $this;
  }
  
  private function includeFile($filename)
  {
    $file = $this->findFile($filename);

    if (!$file) {
      echo("File $filename" . PHP_EXT . " not found!\n");

      return $this->defaultFileHandler();
    }

    include($file);
  }
  
  private function loadClass($class)
  {
    preg_match_all("/\\\\/s", $class, $delimiter);
    $this->findClass($class, !empty($delimiter[0]) ? $delimiter[0] : null);
  }
  
  private function psrCallback(array $callback = [])
  {
    $identified = !empty($callback[0]) ? $callback[0] : $callback[4];
    
    if (array_key_exists($identified[0], $this->path)) {
      $path = $this->path[$identified[0]];
      unset($identified[0]);
      $identified = array_values($identified);
      $pathinfo = $path . implode(DIRECTORY_SEPARATOR, $identified);
      
      if (is_dir($pathinfo) && !is_file($pathinfo)) {
        throw new \InvalidArgumentException("$pathinfo is directory!");
      } else {
        $this->includeFile($pathinfo);
      }
    } else {
      throw new \InvalidArgumentException($identified[0] . " not supported!");
    }
  }
  
  private function psrCallbackProduction(array $callback = [])
  {
    $id = !empty($callback[0]) ? $callback[0] : $callback[4];
    
    if (!array_key_exists($id[0], $this->path)) {
      throw new \InvalidArgumentException($id[0] . " not supported!");
    }
    
    if ($id[0] === "App") {
      return $this->psrCallback($callback);
    }
    $pathinfo = $this->path[$id[0]] . $id[0] . '.zip';
    $search = implode(DIRECTORY_SEPARATOR, $id);
    // check status opening...
    $status = $this->compiler->open($pathinfo);
    
    if (!$status) {
      exit("File $pathinfo not found!\n");
    }
    $this->compiler->setExtension("php");
    $this->compiler->setPassword($this->password);
    $contents = $this->compiler->read($search);
    $build = $this->basepath . date("Y-m-d-") . "build";
    $this->compiler->writeTo($build, $contents);
    $this->compiler->close();
    $this->includeFile($build);
    @unlink($build . '.php');
  }
  
  public function register()
  {
    if (is_dir($this->vendor)) {
      return $this->getComposer();
    }
    
    if ($this->useZipReader()) {
      $this->compiler = new Zip;
    }
    return $this->getAutoload(true);
  }
  
  public function set($name, $value)
  {
    $this->__set($name, $value);
  }
  
  public function __set($name, $value)
  {
    $this->{$name} = $value;
  }
  
  private function unregister()
  {
    spl_autoload_unregister(array($this, 'loadClass'));
  }
  
  public function useZipReader()
  {
    $this->includeFile($this->basepath . 'bootstrap/reader/zip');
    
    if (class_exists(Zip::class) && !$this->zip) {
      exit("You has set [zip] for actived!\n");
    }
    return $this->zip;
  }
  
  public function __get($name)
  {
    return (property_exists($this, $name) ? $this->{$name} : false);
  }
}