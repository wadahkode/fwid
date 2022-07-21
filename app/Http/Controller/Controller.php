<?php

namespace App\Http\Controller;

use Wadahkode\Http\Controller\BaseController;

/**
 * Controller core
 * 
 * @author Ayus Irfang Filaras <ayus.sahabat@gmail.com>
 * @since version 0.0.1
 */
class Controller extends BaseController
{
  public function model(string $name="")
  {
    return parent::model($name);
  }

  public function redirectTo($url)
  {
    $host  = $_SERVER['HTTP_HOST'];
    // $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("Location: http://{$host}/{$url}");
    exit;
  }
}