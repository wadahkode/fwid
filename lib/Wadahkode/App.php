<?php
namespace Wadahkode;

use Closure;
use Wadahkode\Http\Request;
use Wadahkode\Http\Response;

/**
 * Application class
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
class App extends Container
{
	/**
	 * @var array $config = []
	 */
	protected $config = [];
	
	/**
	 * @var string $prefixHelper
	 */
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
		$this->setConfig('config.app');
		$this->getConfig('app');
	}
	
	/**
	 * Creating Application
	 *
	 * @return void
	 */
	public function createApp()
	{
		$this->terminate(Request::fromGlobals(), function($response){
			$response->send();
		});
	}

	/**
	 * Debugging
	 *
	 * @param boolean $boolean
	 * @return void
	 */
	public function debug($boolean=false)
	{
		ini_set('display_errors', $boolean);
	}
	
	/**
	 * Check Compatible version of php and module php
	 *
	 * @param array $settings
	 * @return void
	 */
	public function compatible(array $settings=[])
	{
	  if (array_key_exists('php_version', $settings)) {
			$this->phpCheckVersion($settings['php_version']);
	  } else if (array_key_exists('extension_loaded', $settings)) {
			$module = $this->require("Wadahkode/Contract/Module");
			$module->ref($settings['extension_loaded']);
	  }
	}
	
	/**
	 * Helpers application
	 *
	 * @param [type] ...$helpers
	 * @return void
	 */
	public function getSupportHelper(...$helpers)
	{
		list($helper, $prepend) = $helpers;
		
		if (!is_array($helper)) {
			throw new \Exception("parameter 1 must be an array");
		}
		
		array_map(function($fileHelper){
			
			$fileHelper = APP_HELPERS_DIR . $fileHelper . $this->prefixHelper . FileExtension::get('php');
			
			return $this->includeFile($fileHelper);
			
		}, array_values($helper));
	}
	
	/**
	 * Override include function
	 *
	 * @param string $filename
	 * @return void
	 */
	protected function includeFile(string $filename)
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
	
	/**
	 * Register Application
	 *
	 * @param callable $app
	 * @return void
	 */
	public function register(callable $app)
	{
		return ($app($this));
	}
	
	/**
	 * Override require function
	 *
	 * @param string $className
	 * @param array ...$args
	 * @return $className
	 */
	public function require(string $className, ...$args)
	{
		$className = str_replace("/","\\",$className);

		if (class_exists($className) && empty($args)) {
			return new $className;
		} else if (class_exists($className) && !empty($args)) {
			list($method, $params) = $args;

			switch (count($args)) {
				case 2:
					return call_user_func_array([$className, $method], $params);
				case 3:
					return call_user_func_array([$className, $method], $params);
				default:
					return call_user_func_array([$className, $method], []);
			}
		}

		return false;
	}
	
	/**
	 * Settings config application
	 *
	 * @param string $name
	 * @return void
	 */
	protected function setConfig(String $name)
	{
		$name = preg_split("/\./", $name);
		list($path, $file) = $name;
		if (!is_dir($this->sourcePath)) {
			$this->rootPath = dirname($this->rootPath) . DIRECTORY_SEPARATOR;
			$this->sourcePath = $this->rootPath . 'src' . DIRECTORY_SEPARATOR;
		}
		$this->config[$file] = $this->sourcePath . ucfirst($path) . DIRECTORY_SEPARATOR . $file . FileExtension::get('php');
	}
	
	/**
	 * Terminate application for sending of request
	 *
	 * @param Object $request
	 * @param Closure $callback
	 * @return void
	 */
	protected function terminate(Object $request, Closure $callback)
	{
		return $callback(new Response($request));
	}
}