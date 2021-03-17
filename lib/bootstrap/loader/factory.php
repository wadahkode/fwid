<?php

require_once __DIR__ . '/container/classloader.php';

/**
 * Factory class
 * 
 * automatically load your class!
 * 
 * @author wadahkode
 * @since version v1.0.0
 */
class Factory extends ClassLoader
{
  /**
   * @var object $loader
   */
  protected $loader;
  
  /**
   * @var array $cfg
   */
  protected $cfg = [
    'autoload' => [],
    'classmap' => []
  ];
  
  public function __construct(String $basepath = "")
  {
    $this->loader = parent::__construct($basepath);
    $this->config();
  }
  
  protected function config()
  {
    array_map(function($key){
      $config = include(
        $this->basepath . "src/Config/{$key}.php"
      );
      
      $this->cfg[$key] = $config;
    }, array_keys($this->cfg));
  }
  
  static public function getLoader()
  {
    return call_user_func(array(new self, 'setLoader'));
  }
  
  protected function setClassMap($key = "classmap"): void
  {
    if (array_key_exists($key, $this->cfg)) {
      foreach ($this->cfg[$key] as $prefix => $path) {
        $this->loader->add(array(
          $prefix => $path
        ));
      }
    }
  }
  
  protected function setConfig($key = "autoload")
  {
    if (array_key_exists($key, $this->cfg)) {
      foreach ($this->cfg[$key] as $name => $value) {
        $this->loader->set($name, $value);
      }
    }
  }
  
  protected function setLoader()
  {
    $this->setConfig();
    $this->setClassMap();
    $this->loader->is('vendor')->register();
  }
}