<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

       public function getMes() //select
      {
         $this->db->select('pago.idPago, total Sum, monto Monto'); //select*
         $this->db->from('mensualidad'); //tabla
         $this->db->join('detallepago', 'mensualidad.idMensualidad=detallepago.idMensualidad');
         $this->db->join('pago', 'detallepago.idPago=detallepago.idPago');
         $this->db->group_by('idPago');

         $query = $this->db->get(); //devolucion del resultado de la consulta
         return $query->result();
      }

      public function detalleGeneral() //select
   {
      $this->db->select('pago.idPago,usuario.nombreUsuario,estudiante.nombres, estudiante.apellidoPaterno, estudiante.apellidoMaterno,
                         mensualidad.mes, mensualidad.anio, pago.total,pago.fecha'); //select*
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

   public function totalGeneral() //select
   {
      $this->db->select('SUM(total) Suma'); //select*
      $this->db->from('pago'); //tabla]
      $this->db->where('pago.estado', '1');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function buscarID($idPago) //select
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

   public function detalleDeuda() //select
   {
      $this->db->select('*'); //select*
      $this->db->from('detallepago'); //tabla]
      $this->db->join('pago', 'detallepago.idPago = pago.idPago');
      $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');
      $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
      $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->where('pago.estado', '0');
      $this->db->group_by('pago.idPago');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function totalDeudas() //select
   {
      $this->db->select('SUM(total) Suma'); //select*
      $this->db->from('pago'); //tabla]
      $this->db->where('pago.estado', '0');


      return $this->db->get(); //devolucion del resultado de la consulta
   }
      
}
