<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getHorarios($cls_id, $lugar=''){
        $query = $this->db->select("h.hrr_ciudad, h.hrr_estado, h.hrr_fecha, h.hrr_hora, h.hrr_id, c.ctr_centro, c.ctr_id, c.ctr_ubicacion")
                            ->from('horario h')
                            ->join('centro c', 'h.ctr_id = c.ctr_id', 'inner')
                            ->where('h.cls_id',$cls_id)
                            ->like('c.ctr_ubicacion',$lugar)
                            ->get();
        $horariosClase = $query->result_array();
        return $horariosClase;
    }

}

?>
