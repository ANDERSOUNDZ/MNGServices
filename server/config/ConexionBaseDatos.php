<?php
include_once("../persistencia/DatosConexion.php");
class ConexionBaseDatos {
    private static $array = array();
    public static function DatosConexiones(){
        $array = array();
        v$array[] = new DatosConexion("local","sql306.byethost32.com","b32_21171906_mngservices","b32_21171906","");
        return $array;
    }
}
