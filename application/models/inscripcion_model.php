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

    public function agregarInscripcion($data)
    {
        $this->db->trans_begin();
        $this->db->insert('inscripcion',$data); //tabla

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function recuperarInscritos($idApoderado,$idEstudiante)
    {
        $this->db->select('*'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->where('idApoderado',$idApoderado);
        $this->db->where('idEstudiante',$idEstudiante);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarInscritos($idApoderado,$idEstudiante,$data)
    {
        $this->db->where('idApoderado',$idApoderado);
         $this->db->where('idEstudiante',$idEstudiante);
        $this->db->update('inscripcion',$data);
    }

    public function modificarPersona($idApoderado,$idEstudiante,$data)
    {
        $this->db->trans_begin();
        $this->db->where('idPersona',$idApoderado);
        $this->db->where('idPersona',$idEstudiante);
        $this->db->update('persona', $data);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function listaInscritosdeshabilitados()
    {
        $this->db->select('inscripcion.idApoderado, per1.nombres Enombre, per1.apellidoPaterno EapPat, per1.apellidoMaterno EapMat, inscripcion.idEstudiante, per2.nombres Anombre, per2.apellidoPaterno AapPat, per2.apellidoMaterno AapMat, observaciones'); //select *
        $this->db->from('inscripcion'); //tabla
        $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
        $this->db->join('persona per1', 'estudiante.idEstudiante=per1.idPersona');
        $this->db->join('apoderado', 'inscripcion.idApoderado=apoderado.idApoderado');
        $this->db->join('persona per2', 'apoderado.idApoderado=per2.idPersona');
        $this->db->where('per1.estado','0');
        $this->db->where('per2.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
