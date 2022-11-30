<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_model extends CI_Model {


	public function listainscritos()
	{
        $this->db->select('inscripcion.idInscripcion, inscripcion.idApoderado, apoderado.nombres ANombre, apoderado.apellidoPaterno AApP, apoderado.apellidoMaterno AApM, 
                            inscripcion.idEstudiante, estudiante.nombres ENombre, estudiante.apellidoPaterno EApP, estudiante.apellidoMaterno EApM,
                            inscripcion.observaciones, horario'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
        $this->db->join('apoderado', 'inscripcion.idApoderado=apoderado.idApoderado');
        $this->db->where('inscripcion.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarInscripcion($data)
    {
        $this->db->insert('inscripcion',$data); //tabla
    }

    public function recuperarInscritos($idInscripcion)
    {
        $this->db->select('*'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->where('idInscripcion',$idInscripcion);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarInscritos($idInscripcion,$data)
    {
        $this->db->where('idInscripcion',$idInscripcion);
        $this->db->update('inscripcion',$data);
    }

    public function listaInscritosdeshabilitados()
    {
         $this->db->select('inscripcion.idInscripcion, inscripcion.idApoderado, apoderado.nombres ANombre, apoderado.apellidoPaterno AApP, apoderado.apellidoMaterno AApM, 
                            inscripcion.idEstudiante, estudiante.nombres ENombre, estudiante.apellidoPaterno EApP, estudiante.apellidoMaterno EApM,
                            inscripcion.observaciones, horario'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
        $this->db->join('apoderado', 'inscripcion.idApoderado=apoderado.idApoderado');
        $this->db->where('inscripcion.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function PDF($idInscripcion)
    {
        $this->db->select('apoderado.nombres ANombre, apoderado.apellidoPaterno AApP, apoderado.apellidoMaterno AApM, apoderado.direccion, apoderado.edad 
                            AEdad, 
                            apoderado.sexo ASexo, apoderado.numReferencia, apoderado.estadoCivil,
                            estudiante.nombres ENombre, estudiante.apellidoPaterno EApP, estudiante.apellidoMaterno EApM, estudiante.edad EEdad, 
                            estudiante.sexo ESexo, estudiante.colegio, estudiante.grado,
                            inscripcion.observaciones, inscripcion.horario'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
        $this->db->join('apoderado', 'inscripcion.idApoderado=apoderado.idApoderado');
        $this->db->where('inscripcion.estado','1');
        $this->db->where('inscripcion.idInscripcion', $idInscripcion);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
