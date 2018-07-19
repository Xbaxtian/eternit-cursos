<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index(){
		$dataView = array("view"=>'home/formulario',"data"=>array());
		$this->load->view('layout',$dataView);
	}
}
