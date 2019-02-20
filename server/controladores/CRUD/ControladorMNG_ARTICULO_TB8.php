<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_ARTICULO_TB8.php');
class ControladorMNG_ARTICULO_TB8 extends ControladorBase
{
   function crear(MNG_ARTICULO_TB8 $mng_articulo_tb8)
   {
      $sql = "INSERT INTO MNG_ARTICULO_TB8 (idArticulo,descripcion,precio,imagen,idUsuario) VALUES (?,?,?,?,?);";
      $parametros = array($mng_articulo_tb8->idArticulo,$mng_articulo_tb8->descripcion,$mng_articulo_tb8->precio,$mng_articulo_tb8->imagen,$mng_articulo_tb8->idUsuario);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_ARTICULO_TB8 $mng_articulo_tb8)
   {
      $parametros = array($mng_articulo_tb8->idArticulo,$mng_articulo_tb8->descripcion,$mng_articulo_tb8->precio,$mng_articulo_tb8->imagen,$mng_articulo_tb8->idUsuario,$mng_articulo_tb8->id);
      $sql = "UPDATE MNG_ARTICULO_TB8 SET idArticulo = ?,descripcion = ?,precio = ?,imagen = ?,idUsuario = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_ARTICULO_TB8 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_ARTICULO_TB8;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_ARTICULO_TB8 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_ARTICULO_TB8 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_ARTICULO_TB8;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_ARTICULO_TB8 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_ARTICULO_TB8 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_ARTICULO_TB8 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_ARTICULO_TB8 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}