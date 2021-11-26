<?php

/**
 * Api Helper
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
function asset($url) {
  return base_url() . $url;
}

function base_url() {
  return (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'] .
    str_replace(
      basename($_SERVER['SCRIPT_NAME']),
      "",
      $_SERVER['SCRIPT_NAME']
    );
}

function createNotification($message, $errorType) {
    echo $message;
}

function test() {
    echo "Hello";
}

function view($filename, $data = []) {
  require(dirname(__DIR__,2) . '/lib/Wadahkode/vendor/autoload.php');
  $blade = \Jenssegers\Blade\Blade::class;
  $blade = new $blade(APP_TEMPLATES_DIR, APP_STORE_DIR.'cache');
    
  echo $blade->make($filename, $data)->render();
}