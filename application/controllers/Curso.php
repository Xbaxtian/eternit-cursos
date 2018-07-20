<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model("Curso_model","curso");
        header('Content-Type: application/json');
    }

    public function listarcursos(){
        $lista = $this->curso->listarCursos();
        $lista = json_encode($lista);
        $lista = $this->quitarPrefijos($lista);
        echo $lista;
    }

    public function detallecurso(){
        $crs_id = $this->input->get('id');

        $lista = $this->curso->getCurso($crs_id);
        $lista = json_encode($lista);
        $lista = $this->quitarPrefijos($lista);
        echo $lista;
    }

    public function registrarmatricula(){

    }

    private function quitarPrefijos($json){
        $prefijos = array("crs_","cls_");
        return str_replace($prefijos,"",$json);
    }

}



?>
