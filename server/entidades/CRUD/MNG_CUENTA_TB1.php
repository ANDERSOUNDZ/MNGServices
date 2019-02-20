<?php
class MNG_CUENTA_TB1
{
   public $idCuenta;
   public $contraseña;
   public $idCommerce;

   function __construct(int $idCuenta,string $contraseña,int $idCommerce){
      $this->idCuenta = $idCuenta;
      $this->contraseña = $contraseña;
      $this->idCommerce = $idCommerce;
   }
}
?>