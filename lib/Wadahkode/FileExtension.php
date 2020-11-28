<?php
namespace Wadahkode;

class FileExtension
{
    protected $extensions = [
        'php' => '.php'
    ];
    
    static public function get($name)
    {
        $file = new self;
        if (!array_key_exists($name, $file->extensions)) {
            exit("Extension file not supported!");
        }
        return $file->extensions[$name];
    }
}