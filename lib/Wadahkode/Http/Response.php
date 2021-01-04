<?php
namespace Wadahkode\Http;

use Wadahkode\Http\Route;

class Response
{
  public function next($request, $app)
  {
    $route = new Route($request);
    return $route->call($app);
  }
}