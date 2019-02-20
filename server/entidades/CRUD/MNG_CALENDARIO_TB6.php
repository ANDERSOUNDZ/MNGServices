<?php
class MNG_CALENDARIO_TB6
{
   public $idCalendario;
   public $fecha;
   public $descripcion;
   public $lugar;
   public $geoposicionamiento;

   function __construct(int $idCalendario,date $fecha,string $descripcion,string $lugar,string $geoposicionamiento){
      $this->idCalendario = $idCalendario;
      $this->fecha = $fecha;
      $this->descripcion = $descripcion;
      $this->lugar = $lugar;
      $this->geoposicionamiento = $geoposicionamiento;
   }
}
?>