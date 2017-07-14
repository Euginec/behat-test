<?php

class Cucumber
{
    private $cucumbers = 0;
    
    public function setCountOfCucumbers($cucumbers)
    {
        $this->cucumbers = $cucumbers;
    }
    
    public function eatCucumbers($count)
    {
        $this->cucumbers -= $count;
    }
    
    public function getLeftCucumbers()
    {
        return $this->cucumbers;
    }
}
