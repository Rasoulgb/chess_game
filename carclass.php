<?php
abstract class car
{
    protected $tankvol;
    public function __construct($vol)
    {
        $this->tankvol=$vol;
    }
    abstract function calckm();
}

class honda extends car
{
    public function calckm()
    {
        // TODO: Implement calckm() method.
        $km=$this->tankvol*30;
        return $km;
    }
}

$honda=new honda(10);
echo $honda->calckm();