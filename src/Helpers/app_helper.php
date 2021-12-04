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
  // (isset($_SERVER['HTTPS']) ? "https://" : "http://")
  return "https://" . $_SERVER['HTTP_HOST'] .
    str_replace(
      basename($_SERVER['SCRIPT_NAME']),
      "",
      $_SERVER['SCRIPT_NAME']
    );
}

function getCodeHash() {
  return hash("sha256", str_shuffle("i love u lian"));
}

function uuid() {
  // $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

  echo sprintf("%04x%04x-%04x-%04x-%04x%04x%04x",
    mt_rand(0, 0xffff), mt_rand(0, 0xffff),
    mt_rand(0,0xffff),
    mt_rand(0,0x0fff) | 0x4000,
    mt_rand(0,0x3fff) | 0x8000,
    mt_rand(0,0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
  );
}

function view($filename, $data = []) {
  require(dirname(__DIR__,2) . '/lib/Wadahkode/vendor/autoload.php');
  $blade = \Jenssegers\Blade\Blade::class;
  $blade = new $blade(APP_TEMPLATES_DIR, APP_STORE_DIR.'cache');
    
  echo $blade->make($filename, $data)->render();
}