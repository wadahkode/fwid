<?php
namespace Wadahkode\Contract;

trait Property
{
    public static $propertyClass = "";
    
    public function propertyEmpty($name)
    {
        throw new \Exception("property $name has set but is empty on the class " . Property::$propertyClass);
    }
    
    public function propertyNotFound($name)
    {
        throw new \Exception("property $name not set on the class " . Property::$propertyClass);
    }
}