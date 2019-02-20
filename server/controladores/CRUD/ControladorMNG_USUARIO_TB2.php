<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MNG_USUARIO_TB2.php');
class ControladorMNG_USUARIO_TB2 extends ControladorBase
{
   function crear(MNG_USUARIO_TB2 $mng_usuario_tb2)
   {
      $sql = "INSERT INTO MNG_USUARIO_TB2 (idUsuario,nombre,apellido,fechaDeNacimento,crew,nickname,imagen,idBooking,idBadge,idTrabajos,idCuenta) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
      $parametros = array($mng_usuario_tb2->idUsuario,$mng_usuario_tb2->nombre,$mng_usuario_tb2->apellido,$mng_usuario_tb2->fechaDeNacimento,$mng_usuario_tb2->crew,$mng_usuario_tb2->nickname,$mng_usuario_tb2->imagen,$mng_usuario_tb2->idBooking,$mng_usuario_tb2->idBadge,$mng_usuario_tb2->idTrabajos,$mng_usuario_tb2->idCuenta);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MNG_USUARIO_TB2 $mng_usuario_tb2)
   {
      $parametros = array($mng_usuario_tb2->idUsuario,$mng_usuario_tb2->nombre,$mng_usuario_tb2->apellido,$mng_usuario_tb2->fechaDeNacimento,$mng_usuario_tb2->crew,$mng_usuario_tb2->nickname,$mng_usuario_tb2->imagen,$mng_usuario_tb2->idBooking,$mng_usuario_tb2->idBadge,$mng_usuario_tb2->idTrabajos,$mng_usuario_tb2->idCuenta,$mng_usuario_tb2->id);
      $sql = "UPDATE MNG_USUARIO_TB2 SET idUsuario = ?,nombre = ?,apellido = ?,fechaDeNacimento = ?,crew = ?,nickname = ?,imagen = ?,idBooking = ?,idBadge = ?,idTrabajos = ?,idCuenta = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MNG_USUARIO_TB2 WHERE id = ?;";
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
         $sql = "SELECT * FROM MNG_USUARIO_TB2;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MNG_USUARIO_TB2 WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MNG_USUARIO_TB2 LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MNG_USUARIO_TB2;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MNG_USUARIO_TB2 WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MNG_USUARIO_TB2 WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MNG_USUARIO_TB2 WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MNG_USUARIO_TB2 WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}