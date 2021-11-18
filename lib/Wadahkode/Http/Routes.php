<?php

namespace Wadahkode\Http;

/**
 * Routes
 * 
 * @author wadahkode <mvp.dedefilaras@gmail.com>
 * @since version 0.0.1
 */
class Routes extends RouterFactory
{
  /**
   * Get instance class
   *
   * @param object $request
   */
  static public function getInstance(object $request)
  {
    return new Self([$request]);
  }

  // Access method getWebRouter on the class RouterFactory
  public function getWebRouter()
  {
    parent::getWebRouter();
  }

  // Access method resolve on the class RouterFactory
  public function resolve()
  {
    parent::resolve();
  }

  // Remove resolve duplicate running.
  // public function __destruct()
  // {
  //   return $this->resolve();
  // }
}