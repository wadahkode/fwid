<?php
namespace Wadahkode;

class App extends Container
{
    protected $config = [];
    
    protected $prefixHelper = "_helper";
    
    /**
     * @var string $rootPath
     */
    protected $rootPath = "";
    
    /**
     * @var string $sourcePath;
     */
    protected $sourcePath = "";
    
    /**
     * @param string $rootPath
     */
    public function __construct(String $rootPath = "")
    {
        $this->rootPath = realpath(rtrim(dirname($rootPath), '/\\')) . DIRECTORY_SEPARATOR;
        $this->sourcePath = $this->rootPath . 'src' . DIRECTORY_SEPARATOR;
        $this->setConfig('config.realpath');
        $this->getConfig('realpath');
    }
    
    public function getSupportHelper(...$helpers)
    {
        list($helper, $prepend) = $helpers;
        
        if (!is_array($helper)) {
            throw new Exception("parameter 1 must be an array");
        }
        
        array_map(function($fileHelper){
            
            $fileHelper = APP_HELPERS_DIR . $fileHelper . $this->prefixHelper . FileExtension::get('php');
            
            return $this->includeFile($fileHelper);
            
        }, array_values($helper));
    }
    
    protected function includeFile($filename)
    {
        return (file_exists($filename)
            ? include($filename)
            : false
        );
    }
    
    public function register(callable $app)
    {
        return ($app($this));
    }
    
    // @override: require()
    public function require($module, ...$param)
    {
        $module = str_replace("/","\\",$module);
        if (class_exists($module)) {
            if (empty($param)) {
                return new $module;
            } else {
                switch (count($param)) {
                    case 2: return new $module($param[0],$param[1]);
                    case 3: return new $module($param[0],$param[1],$param[2]);
                    default: return new $module($param[0]);
                }
            }
            return false;
        }
    }
    
    protected function setConfig($name)
    {
        $name = preg_split("/\./", $name);
        list($path, $file) = $name;
        
        $this->config[$file] = $this->sourcePath . ucfirst($path) . DIRECTORY_SEPARATOR . $file . FileExtension::get('php');
    }
}