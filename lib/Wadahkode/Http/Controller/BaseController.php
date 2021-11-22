<?php

namespace Wadahkode\Http\Controller;

use Symfony\Component\Yaml\Yaml;
use Wadahkode\Support\Database\Model;

abstract class BaseController
{
  protected $model_dir = APP_MODEL_DIR;
  
  protected $extensionsYaml = [
    ".yaml", ".yml"
  ];
  
  protected $model = [];

  protected function model(string $name="")
  {
    require(dirname(__DIR__,2) . '/vendor/autoload.php');
    
    foreach ($this->extensionsYaml as $ext) {
      if (file_exists($this->model_dir . $name . $ext)) {
        $this->model = Yaml::parseFile($this->model_dir . $name . $ext);
      }
    }

    return $this->setModel();
  }

  protected function setModel()
  {
    return Model::setModel(json_decode(json_encode($this->model)));
  }
}