<?php
	if ( ! defined('BASEPATH')) exit('no se permite acceso directo al script');
	class Mdl_funciones extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
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

		function Tabla_S(){
      $query= "SELECT * FROM t_dat_servicios";
      $query= $this->db->query($query);
			if ($query->num_rows()>0) {
				return $query;
			}else{
				return 0;
			}
        }

    function Select($nombre,$select,$def ="123qwe"){
      echo '<option  value="" selected>Seleccione una Opción</option>';
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

		function Select2($nombre,$select){
      echo '<option  value="" selected>Todos los Ingenieros</option>';
        foreach ($select as $tipo) {
            if($tipo->Perfil == $nombre){
                    echo '<option value="'.$tipo->id_usuario.'" >'.$tipo->Usuario.'</option>';
                }
            }
        }

				function Select3($nombre,$select){
		      echo '<option  value="" selected>Todos los Ingenieros</option>';
		        foreach ($select as $tipo) {
		            if($tipo->Perfil == $nombre){
		                    echo '<option value="'.$tipo->Usuario.'" >'.$tipo->Usuario.'</option>';
		                }
		            }
		        }

				public function insertPrueba(){
        $data = array(
        'Usuario'=>$this->input->post('Usuario1'),
        'Contraseña'=>$this->input->post('Contraseña1'),
        'Perfil'=>$this->input->post('Perfil1'),
				'Correo'=>$this->input->post('Correo1'),
				'Estatus'=>$this->input->post('Estatus1')
         );
        $this->db->insert("t_dat_usuarios",$data);
				// echo "<script>alert('¡Se Agrego Correctamente!');</script>";
				// redirect('ModuloU','refresh');
				}

				//Funciones del DATA-TABLE
				var $table = 't_dat_usuarios';
    		var $column = array('Usuario','Perfil','Estatus'); //set column field database for order and search
    		var $order = array('id_usuario' => 'asc'); // default order

				private function _get_datatables_query(){

        $this->db->select('id_usuario, Usuario, Perfil, Estatus');
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $column[$i] = $item; // set column array variable to order processing
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

		function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_usuario',$id);
        $query = $this->db->get();

        return $query->row();
    }

		public function update($where, $data)
	{
			$this->db->update($this->table, $data, $where);
			return $this->db->affected_rows();
	}

	function Mostrar($tabla)
	{
		$query=$this->db->get($tabla);
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}


	//Inicio del data table servicios
function o_tabla(){
		if($this->session->userdata('perfil')=='Administrador'){
			$this->db->select('id_servicio, Fecha_elaboracion, Razon_social_cliente, Estatus_servicio, Ejecutivo_asignado');
			$datos = $this->db->order_by('Fecha_elaboracion desc')->from('t_dat_servicios')->get();
			return $datos->result();
		}else {
			if($this->session->userdata('perfil')=='Ingeniero'){
				$this->db->select('id_servicio, Fecha_elaboracion, Razon_social_cliente, Estatus_servicio, Ejecutivo_asignado');
				$this->db->where('Ejecutivo_asignado',$this->session->userdata('Nombre'));
				$this->db->where('Estatus_servicio != "Terminado"');
				$this->db->where('f_id_usuario',$this->session->userdata('ID'));
				$datos = $this->db->order_by('Fecha_elaboracion desc')->from('t_dat_servicios')->get();
				return $datos->result();
			}
		}
}
	//Fin del data table servicios


}
?>
