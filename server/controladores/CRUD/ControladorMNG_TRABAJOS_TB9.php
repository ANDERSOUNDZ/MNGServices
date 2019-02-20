<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_TRABAJOS_TB9.php');
class ControladorMNG_TRABAJOS_TB9 extends ControladorBase
{
   function crear(MNG_TRABAJOS_TB9 $mng_trabajos_tb9)
   {
      $sql = "INSERT INTO MNG_TRABAJOS_TB9 (idTrabajos,fecha,imagen,descripción) VALUES (?,?,?,?);";
      $parametros = array($mng_trabajos_tb9->idTrabajos,$mng_trabajos_tb9->fecha,$mng_trabajos_tb9->imagen,$mng_trabajos_tb9->descripción);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_TRABAJOS_TB9 $mng_trabajos_tb9)
   {
      $parametros = array($mng_trabajos_tb9->idTrabajos,$mng_trabajos_tb9->fecha,$mng_trabajos_tb9->imagen,$mng_trabajos_tb9->descripción,$mng_trabajos_tb9->id);
      $sql = "UPDATE MNG_TRABAJOS_TB9 SET idTrabajos = ?,fecha = ?,imagen = ?,descripción = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_TRABAJOS_TB9 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_TRABAJOS_TB9;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_TRABAJOS_TB9 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_TRABAJOS_TB9 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_TRABAJOS_TB9;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_TRABAJOS_TB9 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_TRABAJOS_TB9 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_TRABAJOS_TB9 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_TRABAJOS_TB9 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}