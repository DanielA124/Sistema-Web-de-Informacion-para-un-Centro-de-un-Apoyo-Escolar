<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle_model extends CI_Model {

    public function listaDetalle() //select
   {
      $this->db->select('*'); //select*
      $this->db->from('detallepago'); //tabla]
      $this->db->join('pago', 'detallepago.idPago = pago.idPago');
      $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');
      $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
      $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->where('pago.estado', '1');
      $this->db->group_by('pago.idPago');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function listaDetalle2($idPago) //select
   {
      $this->db->select('*'); //select*
      $this->db->from('detallepago'); //tabla]
      $this->db->join('pago', 'detallepago.idPago = pago.idPago');
      $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');
      $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
      $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->where('pago.estado', '1');
      $this->db->where('pago.idPago', $idPago);
      $this->db->group_by('pago.idPago');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function totalPago() //select
   {
      $this->db->select('SUM(total) Suma'); //select*
      $this->db->from('pago'); //tabla]


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function registrar($data)
   {

      //Iniciamos la transacción.    
      $this->db->trans_begin();
      
      //Intenta insertar un pago.    
      $this->db->insert('pago', array(
         'total' => $data['total'],
         'fecha' => date("Y-m-d"),
         'idUsuario' =>  $_SESSION['idusuario'],
         'estado' => 1
      ));
      //Recuperamos el id del cliente registrado.    
      $pago_id = $this->db->insert_id();

      //Insertamos los servicios que desea adquirir del Inscrito.     

         $idInscripcion = $data['idInscripcion'];
         $mes = $data['mes'];
         $anio = $data['anio'];
         $monto = $data['monto'];
        $countM = 0;
        $IdMArray=array();
       while ($countM < count($idInscripcion)) {
         $this->db->insert('mensualidad', array(
            'idInscripcion' => $idInscripcion[$countM],
            'mes' => $mes[$countM],
            'anio' => $anio[$countM],
            'monto' => $monto[$countM]
         ));

         array_push($IdMArray, $this->db->insert_id());
         $countM ++;
       }

      //Insertamos los Datos del Pago y de la Mensualidad     
       foreach ($IdMArray as $mes) {
          $this->db->insert('detallepago', array(
            'idPago' => $pago_id,
            'idMensualidad' => $mes,
         ));
       }

      if ($this->db->trans_status() === FALSE) {
         //Hubo errores en la consulta, entonces se cancela la transacción.   
         $this->db->trans_rollback();
         return false;
      } else {
         //Todas las consultas se hicieron correctamente.  
         $this->db->trans_commit();
         $pago_id;
         return true;
      }
   }

   public function actualizar($idPago,$data)
   {
      $this->db->where('idPago', $idPago);
      $this->db->update('pago',  array(
         'idUsuario' => $_SESSION['idusuario'],
         'estado' => $data['estado'],
      ));

   }


   public function recuperarVenta($pago) //get
   {
      $this->db->select('*'); //select *
      $this->db->from('pago'); //tabla productos
      $this->db->where('pago.idPago', $pago); //condición where estado = 1
      
    $this->db->join('pago', 'detallepago.idPago = pago.idPago');
    $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');
    $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
    $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
    $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
     $this->db->where('pago.estado', '0');

      return $this->db->get(); //devolucion del resultado de la consulta

   }

   public function detalle($idPago) //get
   {
      $this->db->select('apoderado.nombres PNombre, apoderado.apellidoPaterno PPaterno, apoderado.apellidoMaterno PMaterno, apoderado.numReferencia, 
                        estudiante.nombres ENombre, estudiante.apellidoPaterno EPaterno, estudiante.apellidoMaterno EMaterno, inscripcion.horario,
                        mensualidad.mes, mensualidad.anio, mensualidad.monto, pago.total, pago.fecha, usuario.nombreUsuario'); //select *
      $this->db->from('pago'); //tabla productos    
      $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');   
      $this->db->join('detallepago', 'pago.idPago = detallepago.idPago');
      $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
      $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->join('apoderado', 'inscripcion.idApoderado = apoderado.idApoderado');
      $this->db->where('pago.estado', '1');
      $this->db->where('pago.idPago', $idPago);

      return $this->db->get(); //devolucion del resultado de la consulta

   }

   public function detallelista($idPago) //get
   {
      $this->db->select('*'); //select *
      $this->db->from('pago'); //tabla productos    
      $this->db->join('detallepago', 'pago.idPago = detallepago.idPago');
      $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
      $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->join('apoderado', 'inscripcion.idApoderado = apoderado.idApoderado');
      $this->db->where('pago.estado', '1');
      $this->db->where('pago.idPago', $idPago);

      return $this->db->get(); //devolucion del resultado de la consulta

   }
   
   
}
