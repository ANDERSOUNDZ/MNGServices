<?php
class MNG_ARTICULO_TB8
{
   public $idArticulo;
   public $descripcion;
   public $precio;
   public $imagen;
   public $idUsuario;

   function __construct(int $idArticulo,string $descripcion,float $precio,string $imagen,int $idUsuario){
      $this->idArticulo = $idArticulo;
      $this->descripcion = $descripcion;
      $this->precio = $precio;
      $this->imagen = $imagen;
      $this->idUsuario = $idUsuario;
   }
}
?>