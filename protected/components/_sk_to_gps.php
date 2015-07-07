<?php

Class GPS {
    
    public $x;
    public $y;
    
    const _114  = 6378137;
    const _115  = 57.29577951308232;
    const PI    = 3.141592653589793;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }
    
    public function _118($rad) {
        return $rad * self::_115;
    }
    
    public function result()
    {
        $_11e = $this->_118($this->x / self::_114);
        return array($_11e - (floor(($_11e + 180) / 360) * 360), $this->_118((self::PI / 2) - (2 * atan(exp(-1 * $this->y / self::_114)))));
    }
    
}