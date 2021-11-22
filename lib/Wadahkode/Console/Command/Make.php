<?php
namespace Wadahkode\Console\Command;

trait Make
{
  protected $filename = "";
  protected $samples;
  
  public function createModel($name)
  {
    $samples = $this->findFile('samples/model.txt');
    $samples = file_get_contents($samples);
    $this->samples = $samples;
    preg_match("/@table/", $this->samples, $table);
    preg_match("/@column/", $this->samples, $column);
    preg_match("/@order/", $this->samples, $order);
    preg_match("/@limit/", $this->samples, $limit);
    preg_match("/@sort/", $this->samples, $sort);
    
    $this->samples = str_replace($table[0], "table", $this->samples);
    $this->samples = str_replace($column[0], "column", $this->samples);
    $this->samples = str_replace($order[0], "order", $this->samples);
    $this->samples = str_replace($limit[0], "limit", $this->samples);
    $this->samples = str_replace($sort[0], "sort", $this->samples);
    
    $model = $this->findDir('src/App/Http/Model');
    $file = $model . $name . '.yaml';

    return file_put_contents($file, $this->samples);
  }
  
  public function createController($name)
  {
    $samples = $this->findFile('samples/controller.txt');
    $samples = file_get_contents($samples);
    $this->samples = $samples;
    preg_match("/@php/", $this->samples, $php);
    preg_match("/@namespace.*/", $this->samples, $namespace);
    preg_match("/@class/", $this->samples, $class);

    $explodes = preg_match("/(^[\w]+)\/([\w]+)$/i", $name, $match) ? $match : $name;
    
    if (is_array($explodes)) {
      $this->samples = str_replace($namespace[0], "App\\Http\\Controller\\" . $explodes[1] . ";\n\nuse App\\Http\\Controller\\Controller;", $this->samples);
      $this->samples = str_replace($class[0], $explodes[2] . 'Controller', $this->samples);

      if (!is_dir(APP_CONTROLLER_DIR . $explodes[1])) {
        mkdir(APP_CONTROLLER_DIR . $explodes[1]);
      }

      $name = $explodes[0];
    }

    $this->samples = str_replace($php[0], "<?php", $this->samples);
    $this->samples = str_replace($namespace[0], "App\\Http\\Controller;", $this->samples);
    $this->samples = str_replace($class[0], $name . 'Controller', $this->samples);
    
    $controller = $this->findDir('src/App/Http/Controller');
    $file = $controller . $name . 'Controller.php';
    
    return file_put_contents($file, $this->samples);
  }
  
  private function findDir($dirname)
  {
    if (is_dir($this->basepath . $dirname)) {
      return $this->filename = $this->basepath . $dirname . DIRECTORY_SEPARATOR;
    } else {
      $this->basepath = dirname($this->basepath) . DIRECTORY_SEPARATOR;
      
      if (is_dir($this->basepath . $dirname)) {
        return $this->filename = $this->basepath . $dirname . DIRECTORY_SEPARATOR;
      }
    }
  }
  
  private function findFile($filename)
  {
    if (file_exists($this->basepath . $filename)) {
      return $this->filename = $this->basepath . $filename;
    } else {
      $this->basepath = dirname(dirname($this->basepath)) . DIRECTORY_SEPARATOR;
      
      if (file_exists($this->basepath . $filename)) {
        return $this->filename = $this->basepath . $filename;
      }
    }
  }
}