<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_CALENDARIO_TB6.php');
class ControladorMNG_CALENDARIO_TB6 extends ControladorBase
{
   function crear(MNG_CALENDARIO_TB6 $mng_calendario_tb6)
   {
      $sql = "INSERT INTO MNG_CALENDARIO_TB6 (idCalendario,fecha,descripcion,lugar,geoposicionamiento) VALUES (?,?,?,?,?);";
      $parametros = array($mng_calendario_tb6->idCalendario,$mng_calendario_tb6->fecha,$mng_calendario_tb6->descripcion,$mng_calendario_tb6->lugar,$mng_calendario_tb6->geoposicionamiento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_CALENDARIO_TB6 $mng_calendario_tb6)
   {
      $parametros = array($mng_calendario_tb6->idCalendario,$mng_calendario_tb6->fecha,$mng_calendario_tb6->descripcion,$mng_calendario_tb6->lugar,$mng_calendario_tb6->geoposicionamiento,$mng_calendario_tb6->id);
      $sql = "UPDATE MNG_CALENDARIO_TB6 SET idCalendario = ?,fecha = ?,descripcion = ?,lugar = ?,geoposicionamiento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_CALENDARIO_TB6 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_CALENDARIO_TB6;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_CALENDARIO_TB6 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_CALENDARIO_TB6 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_CALENDARIO_TB6;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_CALENDARIO_TB6 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_CALENDARIO_TB6 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_CALENDARIO_TB6 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_CALENDARIO_TB6 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}