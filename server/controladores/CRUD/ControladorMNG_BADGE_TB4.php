<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_BADGE_TB4.php');
class ControladorMNG_BADGE_TB4 extends ControladorBase
{
   function crear(MNG_BADGE_TB4 $mng_badge_tb4)
   {
      $sql = "INSERT INTO MNG_BADGE_TB4 (idBadge,disponibilidad) VALUES (?,?);";
      $parametros = array($mng_badge_tb4->idBadge,$mng_badge_tb4->disponibilidad);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_BADGE_TB4 $mng_badge_tb4)
   {
      $parametros = array($mng_badge_tb4->idBadge,$mng_badge_tb4->disponibilidad,$mng_badge_tb4->id);
      $sql = "UPDATE MNG_BADGE_TB4 SET idBadge = ?,disponibilidad = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_BADGE_TB4 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_BADGE_TB4;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_BADGE_TB4 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_BADGE_TB4 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_BADGE_TB4;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_BADGE_TB4 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_BADGE_TB4 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_BADGE_TB4 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_BADGE_TB4 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}