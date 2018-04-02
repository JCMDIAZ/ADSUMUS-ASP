<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_Principal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Mdl_funciones');
		$this->load->model('Mdl_Consultas');
		$this->load->database();
	}

	public function Index(){
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU');
		$this->load->view('sview_Footer');
	}

	//Modulo Usuarios
	public function ModuloU(){
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('contraseñaU','Contraseña','required');
		$this->form_validation->set_rules('contraseñaC','Contraseña','required');
		$this->form_validation->set_rules('perfil_usuario','Perfil de Usuario','required');

		$datos['Tipos'] = $this->Mdl_funciones->Tipos();
		$this->load->view('sview_Header');
		$this->load->view('sview_ModuloU',$datos);
		$this->load->view('sview_Footer');
	}

	public function Levantamiento(){
        $data['tipo_servicio'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Tipo_servicio');
        $data['ejecutivo'] = $this->Mdl_Consultas->Select('t_cat_catalogos','Perfil_Usuario');
        $this->load->view('sview_Header');
		$this->load->view('mview_LevServicio',$data);
		$this->load->view('sview_Footer');
    }

}
?>
