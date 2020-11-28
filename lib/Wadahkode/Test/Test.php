<?php
namespace Wadahkode\Test;

class Test
{
    protected $arr = [];
    protected $str = "";
    
    public function __construct(...$parameter)
    {
        switch (gettype($parameter)) {
            case 'array': return array_push($this->arr, $parameter);
            case 'string': return $this->str = $parameter;
            default: return $this;
        }
    }
    
    public function module(...$parameter)
    {
        if (gettype($parameter[0]) === "array") {
            return extract($parameter[0]);
        }
    }
    
    public function say($say="")
    {
        if (empty($say)) {
            if (!empty($this->arr) && gettype($this->arr) === 'array') {
                foreach ($this->arr[0] as $key => $value) {
                    printf("%s<br>", $this->arr[0][$key]);
                }
            } else {
                printf("%s<br>", $this->str);
            }
        } else {
            printf("%s<br>", $say);
        }
    }
}

function say() {
    
}