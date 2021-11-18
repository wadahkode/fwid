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
    $rf = Routes::getInstance($this->request);
    $rf->getWebRouter();

    return $rf;
  }

  public function send()
  {
    $this->getRouterFactory();

    return $this;
  }
}