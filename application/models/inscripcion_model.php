<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion_model extends CI_Model {


	public function listainscritos()
	{
        $this->db->select('inscripcion.idApoderado, per1.nombres Enombre, per1.apellidoPaterno EapPat, per1.apellidoMaterno EapMat, inscripcion.idEstudiante, per2.nombres Anombre, per2.apellidoPaterno AapPat, per2.apellidoMaterno AapMat, observaciones'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
        $this->db->join('persona per1', 'estudiante.idEstudiante=per1.idPersona');
        $this->db->join('apoderado', 'inscripcion.idApoderado=apoderado.idApoderado');
        $this->db->join('persona per2', 'apoderado.idApoderado=per2.idPersona');
        $this->db->where('per1.estado','1');
        $this->db->where('per2.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}
}
