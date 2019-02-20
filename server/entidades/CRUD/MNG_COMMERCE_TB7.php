<?php
class MNG_COMMERCE_TB7
{
   public $idCommerce;
   public $idArticulo;

   function __construct(int $idCommerce,int $idArticulo){
      $this->idCommerce = $idCommerce;
      $this->idArticulo = $idArticulo;
   }
}
?>