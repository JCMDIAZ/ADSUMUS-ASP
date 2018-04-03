<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');
	class Mdl_funciones extends CI_Model{
		function __construct(){
			parent::__construct();
		}

    function Tipos(){
            $query= "SELECT * FROM t_cat_catalogos";
            $query= $this->db->query($query);
			if ($query->num_rows()>0) {
				return $query;
			}else{
				return 0;
			}
        }
        function Select($nombre,$select,$def ="123qwe"){
          echo '<option  value="" disabled selected>Selecciona una Opción</option>';
            foreach ($select->result() as $tipo) {

                if($tipo->Campo == $nombre){
                    if($tipo->Descripcion == $def){
                        echo '<option value="'.$tipo->Descripcion.'" selected >'.$tipo->Descripcion.'</option>';
                    }else{
                        echo '<option value="'.$tipo->Descripcion.'" >'.$tipo->Descripcion.'</option>';
                    }

                }
            }
        }

				public function insertPrueba(){

     //Aquí capturas los datos recibidos
        $data = array(
        'Usuario'=>$this->input->post('Usuario'),
        'Contraseña'=>$this->input->post('Contraseña'),
        'Perfil'=>$this->input->post('Perfil'),
				'Correo'=>$this->input->post('Correo'),
				'Fecha_alta'=>$this->input->post('Fecha_alta'),
				'Estatus'=>$this->input->post('Estatus'),
         );

        $this->db->insert("t_dat_usuarios",$data);
				echo "<script>alert('¡Se Agrego Correctamente!');</script>";
				redirect('Inicio', 'refresh');
        }
}
?>
