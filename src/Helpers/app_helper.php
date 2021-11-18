<?php

use Wadahkode\Http\Fetch;

/**
 * Api Helper
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 */
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