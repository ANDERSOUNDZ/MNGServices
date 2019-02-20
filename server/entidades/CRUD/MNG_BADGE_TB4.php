<?php
class MNG_BADGE_TB4
{
   public $idBadge;
   public $disponibilidad;

   function __construct(int $idBadge,string $disponibilidad){
      $this->idBadge = $idBadge;
      $this->disponibilidad = $disponibilidad;
   }
}
?>