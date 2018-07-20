<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function listarCursos(){
        $query = $this->db->get('curso');
        return $query->result_array();
    }

    public function getCurso($crs_id,$orden='',$lugar=''){
        $curso = array("detalle"=>'',"clases"=>'');

        $curso['detalle'] = $this->getDetalle($crs_id);
        $curso['clases'] = $this->getClases($crs_id,$orden,$lugar);

        return $curso;
    }

    private function getDetalle($crs_id){
        $query = $this->db->get_where('curso',array('crs_id'=>$crs_id));
        return $query->result_array();
    }

    private function getClases($crs_id,$orden,$lugar=''){
        $this->load->model("Clase_model","clase");
        $clases = $this->clase->clasesPorCurso($crs_id,$lugar);
        /*switch ($orden) {
            case 'nivel':
                $clases = $this->ordenarPorNivel($clases);
                break;

            case 'calendario':
                $clases = $this->ordenarPorCalendario($clases);
                break;

            default:
                $clases = $this->ordenarPorNivel($clases);
                break;
        }*/
        return $clases;
    }

    private function ordenarPorNivel($clases){

    }
    private function ordenarPorCalendario($clases){

    }

}

?>
