<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "mng_articulo_tb8":
            $routerMNG_ARTICULO_TB8 = new RouterMNG_ARTICULO_TB8();
            return json_encode($routerMNG_ARTICULO_TB8->route());
            break;
         case "mng_badge_tb4":
            $routerMNG_BADGE_TB4 = new RouterMNG_BADGE_TB4();
            return json_encode($routerMNG_BADGE_TB4->route());
            break;
         case "mng_booking_tb5":
            $routerMNG_BOOKING_TB5 = new RouterMNG_BOOKING_TB5();
            return json_encode($routerMNG_BOOKING_TB5->route());
            break;
         case "mng_calendario_tb6":
            $routerMNG_CALENDARIO_TB6 = new RouterMNG_CALENDARIO_TB6();
            return json_encode($routerMNG_CALENDARIO_TB6->route());
            break;
         case "mng_commerce_tb7":
            $routerMNG_COMMERCE_TB7 = new RouterMNG_COMMERCE_TB7();
            return json_encode($routerMNG_COMMERCE_TB7->route());
            break;
         case "mng_cuenta_tb1":
            $routerMNG_CUENTA_TB1 = new RouterMNG_CUENTA_TB1();
            return json_encode($routerMNG_CUENTA_TB1->route());
            break;
         case "mng_eventos_tb3":
            $routerMNG_EVENTOS_TB3 = new RouterMNG_EVENTOS_TB3();
            return json_encode($routerMNG_EVENTOS_TB3->route());
            break;
         case "mng_trabajos_tb9":
            $routerMNG_TRABAJOS_TB9 = new RouterMNG_TRABAJOS_TB9();
            return json_encode($routerMNG_TRABAJOS_TB9->route());
            break;
         case "mng_usuario_tb2":
            $routerMNG_USUARIO_TB2 = new RouterMNG_USUARIO_TB2();
            return json_encode($routerMNG_USUARIO_TB2->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
