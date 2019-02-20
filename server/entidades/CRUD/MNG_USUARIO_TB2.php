<?php
class MNG_USUARIO_TB2
{
   public $idUsuario;
   public $nombre;
   public $apellido;
   public $fechaDeNacimento;
   public $crew;
   public $nickname;
   public $imagen;
   public $idBooking;
   public $idBadge;
   public $idTrabajos;
   public $idCuenta;

   function __construct(int $idUsuario,string $nombre,string $apellido,date $fechaDeNacimento,string $crew,string $nickname,string $imagen,int $idBooking,int $idBadge,int $idTrabajos,int $idCuenta){
      $this->idUsuario = $idUsuario;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->fechaDeNacimento = $fechaDeNacimento;
      $this->crew = $crew;
      $this->nickname = $nickname;
      $this->imagen = $imagen;
      $this->idBooking = $idBooking;
      $this->idBadge = $idBadge;
      $this->idTrabajos = $idTrabajos;
      $this->idCuenta = $idCuenta;
   }
}
?>