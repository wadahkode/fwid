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
    
    public function createApp()
    {
      $request = $this->require('Wadahkode/Http/Request');
      $response = $this->require('Wadahkode/Http/Response');
      
      $this->terminate($request, $response);
    }
    
    public function compatible(array $settings=[])
    {
      if (array_key_exists('php_version', $settings)) {
        $this->phpCheckVersion($settings['php_version']);
      } else if (array_key_exists('extension_loaded', $settings)) {
        $module = $this->require('Wadahkode/Contract/Module');
        $module->ref($settings['extension_loaded']);
      }
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
    
    /**
     * Check version php
     *
     * Fungsi yang digunakan untuk mengecek versi php
     * yang terinstall pada system webserver.
     *
     * @var bool $system['version']
     */
    protected function phpCheckVersion(bool $version)
    {
        /**
         * Jika operating system yang digunakan adalah linux
         * ubah karakter backslash menjadi slash.
         * @return os windows|linux
         */
        if (defined('PHP_OS') && PHP_OS == 'Linux') {
            $phpversion = substr(PHP_VERSION, 0, 5);
        } else {
            $phpversion = PHP_VERSION;
        }

        // Jika versi tidak didukung keluarkan dari program dan beri sebuah pesan.
        if ($version !== false)
            throw new \Exception(
                "
                Peringatan: PHP versi "
                    . $phpversion
                    . " tidak didukung, silahkan perbarui ke versi PHP-7.* atau lebih tinggi."
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
        if (!is_dir($this->sourcePath)) {
          $this->rootPath = dirname($this->rootPath) . DIRECTORY_SEPARATOR;
          $this->sourcePath = $this->rootPath . 'src' . DIRECTORY_SEPARATOR;
        }
        $this->config[$file] = $this->sourcePath . ucfirst($path) . DIRECTORY_SEPARATOR . $file . FileExtension::get('php');
    }
    
    protected function terminate($req, $res)
    {
      return $res->next($req->fromGlobals());
    }
}