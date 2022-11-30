<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

       public function getMes() //select
      {
         $this->db->select('pagoMensualidad.idPagoMen, pagoMensualidad.total Sum, pagoMensualidad.pagado Monto,
                           estudiante.nombres Nombre'); //select*
         $this->db->join('inscripcion', 'pagoMensualidad.idInscripcion = inscripcion.idInscripcion');
         $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
         $this->db->from('pagoMensualidad'); //tabla
         $this->db->group_by('idPagoMen');

         $query = $this->db->get(); //devolucion del resultado de la consulta
         return $query->result();
      }

      public function detalleGeneral() //select
   {
        $this->db->select('idPagoMen, fecha, total, pagado, deuda,  mes, anio, pagomensualidad.estado, 
                            estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                            usuario.nombreUsuario'); //select *
        $this->db->join('usuario', 'pagoMensualidad.idUsuario = usuario.idUsuario');
        $this->db->join('inscripcion', 'pagoMensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->from('pagoMensualidad'); //tabla

        return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function totalGeneral() //select
   {
      $this->db->select('SUM(pagado) Suma'); //select*
      $this->db->from('pagoMensualidad'); //tabla

      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function buscarID($idPago) //select
   {
      
      $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                          estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                          usuario.nombreUsuario'); //select *
      $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
      $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->from('pagoMensualidad'); //tabla
      $this->db->where('pagoMensualidad.idPagoMen', $idPago);
      $this->db->group_by('pagoMensualidad.idPagoMen');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function detalleDeuda() //select
   {
      $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                            estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                            usuario.nombreUsuario'); //select *
      $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
      $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
      $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
      $this->db->from('pagoMensualidad'); //tabla
      $this->db->where('pagoMensualidad.estado', '0');
      $this->db->group_by('pagoMensualidad.idPagoMen');


      return $this->db->get(); //devolucion del resultado de la consulta
   }

   public function totalDeudas() //select
   {
      $this->db->select('SUM(saldo) Suma, pagoMensualidad.estado'); //select*
      $this->db->join('pagoMensualidad', 'saldo.idPagoMen = pagomensualidad.idPagoMen');
      $this->db->from('saldo'); //tabla
      $this->db->where('pagoMensualidad.estado', 0);


      return $this->db->get(); //devolucion del resultado de la consulta
   }
      
}
