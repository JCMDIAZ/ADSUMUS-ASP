<?php

class ValidarSesion{
	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function ValidarLogin(){
		if($this->ci->uri->segment(1) == 'Login' && $this->ci->session->userdata('usuario') == true){
			redirect(base_url('Inicio'));
		}else if($this->ci->session->userdata('usuario') == false && $this->ci->uri->segment(1) != 'Login'){
			redirect(base_url('Login'));
		}
	}

	public function TipoUsuario(){
		$usuario = $this->ci->session->userdata('Usuario');
	}
}
