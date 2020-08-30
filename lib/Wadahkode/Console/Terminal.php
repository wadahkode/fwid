<?php
namespace Wadahkode\Console;

use \Wadahkode\Console\Command\Help;
use \Wadahkode\Console\Command\Make;

class Terminal
{
    use Help, Make;
    
    protected $command;
    
    public function __construct($command=null)
    {
        $this->command = $command;
        
        return $this;
    }
    
    public function execute()
    {
        if (count($this->command) < 2) {
            return $this->show();
        }
        unset($this->command[0]);
        $command = array_values($this->command);
        list($method, $name) = $command;
        
        $method = explode(":", $method);
        
        $this->{$method[0]}($method[1], $name);
    }
    
    private function make($name, $param)
    {
        switch ($name) {
            case 'controller':
                $this->createController($param);
                break;
            
            default:
                // code...
                break;
        }
    }
    
    static public function register(callable $console)
    {
        return $console(new self(TERMINAL_INPUT));
    }
}