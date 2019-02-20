<?php
class MNG_EVENTOS_TB3
{
   public $idEventos;
   public $tipoEvento;
   public $descripcion;
   public $idCalendario;
   public $idBooking;

   function __construct(int $idEventos,string $tipoEvento,string $descripcion,int $idCalendario,int $idBooking){
      $this->idEventos = $idEventos;
      $this->tipoEvento = $tipoEvento;
      $this->descripcion = $descripcion;
      $this->idCalendario = $idCalendario;
      $this->idBooking = $idBooking;
   }
}
?>