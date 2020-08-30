<?php
namespace Wadahkode\Console\Command;

trait Make
{
    protected $samples;
    
    public function createController($name)
    {
        $samples = dirname(__DIR__) . '/Examples/controller.txt';
        $samples = file_get_contents($samples);
        $this->samples = $samples;
        preg_match("/@php/", $this->samples, $php);
        preg_match("/@namespace/", $this->samples, $namespace);
        preg_match("/@class/", $this->samples, $class);
        
        $this->samples = str_replace($php[0], "<?php", $this->samples);
        $this->samples = str_replace($namespace[0], "App\\Http\\Controller", $this->samples);
        $this->samples = str_replace($class[0], $name . 'Controller', $this->samples);
        
        $basedir = realpath(rtrim(dirname(__DIR__) . '/../../../', '/\\')) . DIRECTORY_SEPARATOR;
        $controller = $basedir . 'src/App/Http/Controller' . DIRECTORY_SEPARATOR;
        $file = $controller . $name . 'Controller.php';
        
        if (file_exists($file)) {
            file_put_contents($file, $this->samples);
            
            return false;
        }
        file_put_contents($file, $this->samples);
    }
}