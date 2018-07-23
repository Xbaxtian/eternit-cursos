<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->model("Clase_model","clase");
    }

    public function clasesPorCurso($crs_id,$lugar='',$usr_id=''){

        $query = $this->db->select('cls_id, cls_nombre, cls_duracion, cls_clase_requerida, c.nvl_id')
                        ->from('clase c')
                        ->join('nivel n','c.nvl_id = n.nvl_id')
                        ->where('crs_id',$crs_id)
                        ->get();
        $clases = $query->result_array();

        if(count($clases)>0){
            $this->load->model("Horario_model","horario");
            foreach ($clases as $key => $clase) {
                $clases[$key]['horarios'] = $this->horario->getHorarios($clase['cls_id'],$lugar);
            }
        }

        if($usr_id){
            $clases = $this->verificarCompletadas($usr_id, $clases);
            $clases = $this->verificarAnterior($clases);
        }

        return $clases;
    }

    private function verificarCompletadas($usr_id, $clases){
        foreach ($clases as $key => $clase) {
            $this->load->model("Matricula_model","matricula");
            $clases[$key]['completo'] = ($this->matricula->getMatriculasAsistidas($usr_id,$clase['cls_id']))? (1) : (0);
        }
        return $clases;
    }

    public function verificarAnterior($clases){
        foreach ($clases as $key => $clase) {
            if(isset($clase['cls_clase_requerida'])){
                $clases[$key]['completo_requerida']= (array_search(40489, array_column($clases, 'uid')))? (1) : (0);
            }
        }
        return $clases;
    }

    public function getClasePorId($cls_id,$usr_id=''){
        $query = $this->db->get_where('clase',array('cls_id'=>$cls_id));
        $clase = $query->result_array();
        $clase = $this->verificarCompletadas($usr_id, $clase);
        $clase = $this->verificarAnterior($clase);
        return $clase[0];
    }

}

?>
