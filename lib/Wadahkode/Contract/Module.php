<?php
namespace Wadahkode\Contract;

final class Module
{
  public function __construct()
  {
    return $this;
  }
  
  public function ref(array $ref=[])
  {
    $totalExtensionsToLoad = count($ref);

    for ($i = 0; $i < $totalExtensionsToLoad; $i++) {
      if (!extension_loaded($ref[$i]))
        throw new \Exception("Module Extension: $totalExtensionsToLoad[$i] can't to loaded, please enable in php.ini.");
    }
  }
}