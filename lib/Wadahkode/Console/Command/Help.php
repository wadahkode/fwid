<?php
namespace Wadahkode\Console\Command;

trait Help
{
    protected $filename = "";
    
    public function show($list = "")
    {
        if (!empty($list)) {
            return false;
        }
        
        if (file_exists($this->basepath . 'samples/help.txt')) {
            $this->filename = $this->basepath . 'samples/help.txt';
        } else {
            $this->basepath = dirname(dirname($this->basepath)) . DIRECTORY_SEPARATOR;
            
            if (file_exists($this->basepath . 'samples/help.txt')) {
                $this->filename = $this->basepath . 'samples/help.txt';
            }
        }
       
        echo file_get_contents($this->filename) . "\n";
    }
}