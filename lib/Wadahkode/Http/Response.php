<?php
namespace Wadahkode\Http;

class Response
{
  private $request = [];

  public function __construct(object $request)
  {
    $this->request = $request;
  }

  private function getRouterFactory()
  {
    $router = Routes::getInstance($this->request);
    $router->getWebRouter();

    return $router->resolve();
  }

  public function send()
  {
    $this->getRouterFactory();
  }
}