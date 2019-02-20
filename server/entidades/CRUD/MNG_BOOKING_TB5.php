<?php
class MNG_BOOKING_TB5
{
   public $idBooking;
   public $idEventos;
   public $descripcion;

   function __construct(int $idBooking,int $idEventos,string $descripcion){
      $this->idBooking = $idBooking;
      $this->idEventos = $idEventos;
      $this->descripcion = $descripcion;
   }
}
?>