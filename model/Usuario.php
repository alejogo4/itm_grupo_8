<?php

class usuario{


    private $rol;
    private $mensajes;
    private $nombre1;
    private $nombre2;
    private $apelllido1;
    private $apelllido2;

    function __construct($nombre1,$nombre2,$apelllido1,$apelllido2,$rol)
    {
        $this->rol = $rol;
        $this->nombre1 = $nombre1;
        $this->nombre2 = $nombre2;
        $this->apelllido1 = $apelllido1;
        $this->apelllido2 = $apelllido2;
    }

    public function __get($name) {
        return $this->$name;
    }

    
}

?>