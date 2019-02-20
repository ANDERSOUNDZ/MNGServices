<?php
class MNG_TRABAJOS_TB9
{
   public $idTrabajos;
   public $fecha;
   public $imagen;
   public $descripción;

   function __construct(int $idTrabajos,date $fecha,string $imagen,string $descripción){
      $this->idTrabajos = $idTrabajos;
      $this->fecha = $fecha;
      $this->imagen = $imagen;
      $this->descripción = $descripción;
   }
}
?>