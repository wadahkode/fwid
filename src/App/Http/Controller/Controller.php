<?php

namespace App\Http\Controller;

/**
 * Controller core
 * 
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 */
class Controller
{
  public function __construct($prop)
  {
    $childClass = get_called_class();

    if (gettype($prop) == 'array') {
      foreach($prop as $prop) {
        if (\is_array($prop)) {
          list($method, $arguments) = $prop;
  
          if (\method_exists($childClass, $method)) {
            return \call_user_func([$childClass, $method], $arguments !== "" ? $arguments : "");
          }
        } else {
          return $this->{$prop}();
        }
      }
    }
  }
  
  public function view(...$args)
  {
    if (count($args) > 2) return false;
    
    $filename = isset($args[0]) ? $args[0] : '';
    $data = isset($args[1]) ? $args[1] : [];
    
    if (empty($filename) && empty($data)) {
      return false;
    } else if (!empty($filename) && empty($data)) {
      $this->render($filename);
    } else {
      
    }
  }
  
  private function render($filename, $data=[])
  {
    require(dirname(__DIR__,4) . '/lib/Wadahkode/vendor/autoload.php');
    $blade = \Jenssegers\Blade\Blade::class;
    $blade = new $blade(APP_TEMPLATES_DIR, APP_STORE_DIR.'cache');
    
    echo $blade->make($filename, $data)->render();
    // return (
    //   file_exists(APP_TEMPLATES_DIR.$filename.'.html')
    //   ? APP_TEMPLATES_DIR.$filename.'.html'
    //   : false
    // );
  }
}