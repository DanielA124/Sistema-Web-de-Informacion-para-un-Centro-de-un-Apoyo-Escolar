<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagosMes_model extends CI_Model {


	public function listaInicial()
	{
        $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                            estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                            usuario.nombreUsuario'); //select *
        $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
        $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->from('pagoMensualidad'); //tabla

        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaPagos()
    {
        $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                            estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                            usuario.nombreUsuario'); //select *
        $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
        $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->from('pagoMensualidad'); //tabla
        $this->db->where('pagoMensualidad.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
        
    public function agregarPago($data)
    {
        $this->db->insert('pagoMensualidad',$data); //tabla

    }

    public function eliminarPago($idPagoMen)
    {
        $this->db->where('idPagoMen',$idPagoMen);
        $this->db->delete('pagoMensualidad');
    }

    public function recuperarPago($idPagoMen)
    {
        $this->db->select('*'); //select *
        $this->db->from('pagoMensualidad'); //tabla
        $this->db->where('idPagoMen',$idPagoMen);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPagos($idPagoMen,$data)
    {
        $this->db->where('idPagoMen',$idPagoMen);
        $this->db->update('pagoMensualidad',$data);
    }

    public function listaPagosDeudas()
    {
        $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                            estudiante.nombres,estudiante.apellidoPaterno,estudiante.apellidoMaterno, 
                            usuario.nombreUsuario'); //select *
        $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
        $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->from('pagoMensualidad'); //tabla
        $this->db->where('pagoMensualidad.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function reporteFactura($idPagoMen)
    {
        $this->db->select('idPagoMen, fecha, total, pagado, deuda, mes, anio, pagomensualidad.estado, 
                            estudiante.nombres ENombre,estudiante.apellidoPaterno EPaterno ,estudiante.apellidoMaterno EMaterno, 
                            apoderado.nombres PNombre, apoderado.apellidoPaterno PPaterno,apoderado.apellidoMaterno PMaterno, apoderado.numReferencia, inscripcion.horario, usuario.nombreUsuario'); //select *
        $this->db->join('usuario', 'pagomensualidad.idUsuario = usuario.idUsuario');
        $this->db->join('inscripcion', 'pagomensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('apoderado', 'inscripcion.idApoderado = apoderado.idApoderado');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->from('pagoMensualidad'); //tabla
        $this->db->where('pagoMensualidad.idPagoMen', $idPagoMen);


        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
