<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_COMMERCE_TB7.php');
class ControladorMNG_COMMERCE_TB7 extends ControladorBase
{
   function crear(MNG_COMMERCE_TB7 $mng_commerce_tb7)
   {
      $sql = "INSERT INTO MNG_COMMERCE_TB7 (idCommerce,idArticulo) VALUES (?,?);";
      $parametros = array($mng_commerce_tb7->idCommerce,$mng_commerce_tb7->idArticulo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_COMMERCE_TB7 $mng_commerce_tb7)
   {
      $parametros = array($mng_commerce_tb7->idCommerce,$mng_commerce_tb7->idArticulo,$mng_commerce_tb7->id);
      $sql = "UPDATE MNG_COMMERCE_TB7 SET idCommerce = ?,idArticulo = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_COMMERCE_TB7 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_COMMERCE_TB7;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_COMMERCE_TB7 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_COMMERCE_TB7 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_COMMERCE_TB7;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_COMMERCE_TB7 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_COMMERCE_TB7 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_COMMERCE_TB7 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_COMMERCE_TB7 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}