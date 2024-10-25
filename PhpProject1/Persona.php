<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Persona
 *
 * @author Pablo
 */
//Creamos la clase Persona
//Lo ideal es en un fichero a parte con el mismo nombre que la clase
class Persona {

    public $nombre;
    public $edad;

    public function imprimirDatos() {
        echo "Nombre: " . $this->nombre . "</br>";
        echo "Edad: " . $this->edad . "</br>";
    }

}
