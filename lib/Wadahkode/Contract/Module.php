<?php
namespace Wadahkode\Contract;

final class Module {
  public function ref(array $ref=[]) {
    $totalExtensionsToLoad = count($ref);

    for ($i = 0; $i < $totalExtensionsToLoad; $i++) {
      if (!extension_loaded($ref[$i]))
        throw new \Exception("Module Extension: $extensions[$i] can't to loaded, please enable in php.ini.");
    }
  }
}