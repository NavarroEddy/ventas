<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Usuarios_model");
        $this->load->library('session');

    }  


	public function index()
	{
			// print_r(date('Y-m-d H:i:s'));
			// die();
		// $checar = $this->Usuarios_model->datosAjax();
		$this->load->view('header_view');
		$this->load->view('navbar_view');
		$this->load->view('menu_view');
		$this->load->view('usuarios_view');
		$this->load->view('footer_view');
	}

	public function insertar()
	{
		$usuario = array('nombre' => $this->input->post('nombre'),
						 'apaterno' => $this->input->post('apaterno'),
						 'amaterno' => $this->input->post('amaterno'),
						 'id_rol' => $this->input->post('rol'),
						 'correo' => $this->input->post('correo'),
						 'contraseña' => md5($this->input->post('contraseña')),
						 'id_usuario_registro' => 1,
						 'fecha_registro' => date('Y-m-d H:i:s'),	

		 				);
		// $nombre = $this->input->post('nombre');
		// $correo = $this->input->post('correo');
  //       $this->enviar($nombre, $correo);

		$data = $this->Usuarios_model->insertar($usuario);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
		
		
	}

	public function datosAjax()
	{
		$data = $this->Usuarios_model->datosAjax();
		    // print_r($data[0]['activo']);
		    // 	die();
		    for ($i=0; $i <count($data) ; $i++) { 
		    	
		    	if($data[$i]['activo'] == 1)
		    	{

		    		$data[$i]['activo'] = '<button class="badge badge-success" id="btn_activo" data-id="'.$data[$i]['id_usuario'].'">activo</button>'; 

		    	}else{

		    		$data[$i]['activo'] = '<button class="badge badge-danger" id="btn_inactivo" data-id="'.$data[$i]['id_usuario'].'">Inactivo</button>';

		    	}

		    		$data[$i]['acciones'] = '<div class="text-center">

		    								<button class="btn btn-primary btn-sm" data-id="'.$data[$i]['id_usuario'].'" id="editarus"><i class="fas fa-file-signature"></i></button>
		    								<button class="btn btn-danger btn-sm" data-id="'.$data[$i]['id_usuario'].'" id="eliminarus"><i class="fas fa-trash-alt"></i></button>

		    								</div>';


		    }
		$arr = array('data' => $data);
        echo json_encode($arr);
        return;
	}

	public function eliminarUsuario()
	{
		$id_usuario = $this->input->post('id');
		// print_r($id_usuario);
		// die();
		$data = $this->Usuarios_model->eliminarUsuario($id_usuario);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function recuperar()
	{
		$id_usuario = $this->input->post('id_usuario');
		$data = $this->Usuarios_model->recuperar($id_usuario);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function modificar()
	{

		// print_r($_POST['contraseñaEd']);
		// die();
		 if (isset($_POST) && !empty($_POST)) {
				
				$id_usuario = $this->input->post('id_usuario');			
				$nombre = $this->input->post('nombreEd');
				$apaterno = $this->input->post('apaternoEd');
				$amaterno = $this->input->post('amaternoEd');
				$id_rol = $this->input->post('rolEd');
				$correo = $this->input->post('correoEd');
				$id_usuario_registro = 1;
				$fecha_actualizacion = date('Y-m-d H:i:s');
				$contraseña = md5($this->input->post('contraseñaEd'));

				$data = $this->Usuarios_model->modificar($id_usuario, $nombre, $apaterno, $amaterno, $id_rol, $correo, $id_usuario_registro, $fecha_actualizacion, $contraseña);
				$arr          = array('success' => true, 'data' => $data);
		        echo json_encode($arr);
		        return;
		 			
			}
		
	}


	public function desactivarUsuario()
	{
		$id_usuario = $this->input->post('id_usuario');
		$data = $this->Usuarios_model->desactivarUsuario($id_usuario);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function activarUsuario()
	{
		$id_usuario = $this->input->post('id_usuario');
		$data = $this->Usuarios_model->activarUsuario($id_usuario);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function get_roles()
	{
		$data = $this->Usuarios_model->get_roles();
		$arr = array('data' => $data);
        echo json_encode($arr);
        return;
	}

	public function enviar($nombre, $correo)
    {
        $config = array(
            'protocol'    => 'smtp',
            'smtp_host'   => 'smtp.googlemail.com',
            'smtp_user'   => 'lalolai19@gmail.com', //Su Correo de Gmail Aqui
            'smtp_pass'   => 'Misticoazul10', // Su Password de Gmail aqui
            'smtp_port'   => '465',
            'smtp_crypto' => 'ssl',
            'mailtype'    => 'html',
            'wordwrap'    => true,
            'charset'     => 'utf-8',
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('lalolai19@gmail.com');
        $asunto = 'Sistema Punto de Venta';
        $this->email->subject($asunto);
        $mensaje = '<p>Hola '.$nombre.', has quedado regitrado correctamente en el Sistema Punto de Venta';

        $this->email->message($mensaje);

        $this->email->to($correo);

        $this->email->send();
        // if ($this->email->send()) {
        //     $this->session->set_flashdata('envio', 'Email enviado correctamente');
        // } else {
        //     $this->session->set_flashdata('envio', 'No se a enviado el email');
        // }

        // redirect("contacto_controller");
        
    }

    public function consultar()
	{
		$correo = json_decode($this->input->post('correo'));
		$data = $this->Usuarios_model->consultar($correo);
		print_r($data);
		die();
		$arr          = array('data' => $data);
        echo json_encode($arr);
        return;
	}


}