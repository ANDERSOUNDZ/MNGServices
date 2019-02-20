<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_EVENTOS_TB3.php');
class ControladorMNG_EVENTOS_TB3 extends ControladorBase
{
   function crear(MNG_EVENTOS_TB3 $mng_eventos_tb3)
   {
      $sql = "INSERT INTO MNG_EVENTOS_TB3 (idEventos,tipoEvento,descripcion,idCalendario,idBooking) VALUES (?,?,?,?,?);";
      $parametros = array($mng_eventos_tb3->idEventos,$mng_eventos_tb3->tipoEvento,$mng_eventos_tb3->descripcion,$mng_eventos_tb3->idCalendario,$mng_eventos_tb3->idBooking);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_EVENTOS_TB3 $mng_eventos_tb3)
   {
      $parametros = array($mng_eventos_tb3->idEventos,$mng_eventos_tb3->tipoEvento,$mng_eventos_tb3->descripcion,$mng_eventos_tb3->idCalendario,$mng_eventos_tb3->idBooking,$mng_eventos_tb3->id);
      $sql = "UPDATE MNG_EVENTOS_TB3 SET idEventos = ?,tipoEvento = ?,descripcion = ?,idCalendario = ?,idBooking = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_EVENTOS_TB3 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_EVENTOS_TB3;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_EVENTOS_TB3 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_EVENTOS_TB3 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_EVENTOS_TB3;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_EVENTOS_TB3 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_EVENTOS_TB3 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_EVENTOS_TB3 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_EVENTOS_TB3 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}