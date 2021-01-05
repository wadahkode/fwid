<?php
namespace App\Http\Controller;

/**
 * Controller core
 */
class Controller
{
  public function __construct($prop)
  {
    if (gettype($prop) == 'array') {
      foreach ($prop as $k => $v) {
        if (isset($prop[$k])) {
          if (method_exists($this, $prop[$k])) {
            $this->{$prop[$k]}();
          }
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
    
    echo $blade->make($filename)->render();
    // return (
    //   file_exists(APP_TEMPLATES_DIR.$filename.'.html')
    //   ? APP_TEMPLATES_DIR.$filename.'.html'
    //   : false
    // );
  }
}