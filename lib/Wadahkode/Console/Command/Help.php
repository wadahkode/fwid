<?php
namespace Wadahkode\Console\Command;

trait Help
{
    public function show($list = "")
    {
        if (!empty($list)) {
            return false;
        }
        
        $default = dirname(__Dir__) . '/Examples/help.txt';
       
        echo file_get_contents($default) . "\n";
    }
}