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
        preg_match("/@php/", $this->samples, $php);
        preg_match("/@namespace/", $this->samples, $namespace);
        preg_match("/@class/", $this->samples, $class);
        
        $this->samples = str_replace($php[0], "<?php", $this->samples);
        $this->samples = str_replace($namespace[0], "App\\Http\\Model", $this->samples);
        $this->samples = str_replace($class[0], $name . 'Model', $this->samples);
        
        $model = $this->findDir('src/App/Http/Model');
        $file = $model . $name . 'Model.php';
        
        return file_put_contents($file, $this->samples);
    }
    
    public function createController($name)
    {
        $samples = $this->findFile('samples/controller.txt');
        $samples = file_get_contents($samples);
        $this->samples = $samples;
        preg_match("/@php/", $this->samples, $php);
        preg_match("/@namespace/", $this->samples, $namespace);
        preg_match("/@class/", $this->samples, $class);
        
        $this->samples = str_replace($php[0], "<?php", $this->samples);
        $this->samples = str_replace($namespace[0], "App\\Http\\Controller", $this->samples);
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