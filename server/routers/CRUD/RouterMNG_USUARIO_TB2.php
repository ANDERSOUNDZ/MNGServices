<?php
include_once('../routers/RouterBase.php');
include_once('../controladores/CRUD/ControladorMNG_USUARIO_TB2.php');
class RouterMNG_USUARIO_TB2 extends RouterBase
{
   public $controlador;

   function __construct(){
      parent::__construct();
      $this->controlador = new ControladorMNG_USUARIO_TB2();
   }
   function route()
   {
      switch (strtolower($this->datosURI->accion)){
         case "borrar":
            return $this->controlador->borrar($this->datosURI->argumentos["id"]);
            break;
         case "leer":
            return $this->controlador->leer($this->datosURI->argumentos["id"]);
            break;
         case "leer_paginado":
            return $this->controlador->leer_paginado($this->datosURI->argumentos["pagina"],$this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "numero_paginas":
            return $this->controlador->numero_paginas($this->datosURI->argumentos["registros_por_pagina"]);
            break;
         case "leer_filtrado":
            return $this->controlador->leer_filtrado($this->datosURI->argumentos["columna"],$this->datosURI->argumentos["tipo_filtro"],$this->datosURI->argumentos["filtro"]);
            break;
         case "crear":
            return $this->controlador->crear(new MNG_USUARIO_TB2($this->datosURI->mensaje_body["idUsuario"],$this->datosURI->mensaje_body["nombre"],$this->datosURI->mensaje_body["apellido"],$this->datosURI->mensaje_body["fechaDeNacimento"],$this->datosURI->mensaje_body["crew"],$this->datosURI->mensaje_body["nickname"],$this->datosURI->mensaje_body["imagen"],$this->datosURI->mensaje_body["idBooking"],$this->datosURI->mensaje_body["idBadge"],$this->datosURI->mensaje_body["idTrabajos"],$this->datosURI->mensaje_body["idCuenta"]));
            break;
         case "actualizar":
            return $this->controlador->actualizar(new MNG_USUARIO_TB2($this->datosURI->mensaje_body["idUsuario"],$this->datosURI->mensaje_body["nombre"],$this->datosURI->mensaje_body["apellido"],$this->datosURI->mensaje_body["fechaDeNacimento"],$this->datosURI->mensaje_body["crew"],$this->datosURI->mensaje_body["nickname"],$this->datosURI->mensaje_body["imagen"],$this->datosURI->mensaje_body["idBooking"],$this->datosURI->mensaje_body["idBadge"],$this->datosURI->mensaje_body["idTrabajos"],$this->datosURI->mensaje_body["idCuenta"]));
            break;
      }
   }
}