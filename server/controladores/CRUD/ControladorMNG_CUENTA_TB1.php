<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_CUENTA_TB1.php');
class ControladorMNG_CUENTA_TB1 extends ControladorBase
{
   function crear(MNG_CUENTA_TB1 $mng_cuenta_tb1)
   {
      $sql = "INSERT INTO MNG_CUENTA_TB1 (idCuenta,contraseña,idCommerce) VALUES (?,?,?);";
      $parametros = array($mng_cuenta_tb1->idCuenta,$mng_cuenta_tb1->contraseña,$mng_cuenta_tb1->idCommerce);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_CUENTA_TB1 $mng_cuenta_tb1)
   {
      $parametros = array($mng_cuenta_tb1->idCuenta,$mng_cuenta_tb1->contraseña,$mng_cuenta_tb1->idCommerce,$mng_cuenta_tb1->id);
      $sql = "UPDATE MNG_CUENTA_TB1 SET idCuenta = ?,contraseña = ?,idCommerce = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM MNG_CUENTA_TB1 WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM MNG_CUENTA_TB1;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_CUENTA_TB1 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_CUENTA_TB1 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_CUENTA_TB1;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_CUENTA_TB1 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_CUENTA_TB1 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_CUENTA_TB1 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_CUENTA_TB1 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}