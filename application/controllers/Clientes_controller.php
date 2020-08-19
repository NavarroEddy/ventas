<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_controller extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        
        $this->load->model("Clientes_model");
        // $this->load->library('session');

    }  


	public function index()
	{
			// print_r(date('Y-m-d H:i:s'));
			// die();
		// $checar = $this->Usuarios_model->datosAjax();
		$this->load->view('header_view');
		$this->load->view('navbar_view');
		$this->load->view('menu_view');
		$this->load->view('clientes_view');
		$this->load->view('footer_view');
	}

	public function insertar()
	{
		$cliente = array('nombre' => $this->input->post('nombre'),
						 'apaterno' => $this->input->post('apaterno'),
						 'amaterno' => $this->input->post('amaterno'),
						 'telefono' => $this->input->post('telefono'),
						 'correo' => $this->input->post('correo'),
						 'direccion' => $this->input->post('direccion'),
						 'fecha_registro' => date('Y-m-d H:i:s'),	

		 				);
		// $nombre = $this->input->post('nombre');
		// $correo = $this->input->post('correo');
  //       $this->enviar($nombre, $correo);

		$data = $this->Clientes_model->insertar($cliente);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
		
		
	}

	public function datosAjax()
	{
		$data = $this->Clientes_model->datosAjax();
		    // print_r($data[0]['activo']);
		    // 	die();
		    for ($i=0; $i <count($data) ; $i++) { 
		    	
		    	if($data[$i]['activo'] == 1)
		    	{

		    		$data[$i]['activo'] = '<button class="badge badge-success" id="btn_activo" data-id="'.$data[$i]['id_cliente'].'">activo</button>'; 

		    	}else{

		    		$data[$i]['activo'] = '<button class="badge badge-danger" id="btn_inactivo" data-id="'.$data[$i]['id_cliente'].'">Inactivo</button>';

		    	}

		    	if($data[$i]['puntos'] == 0)
		    	{

		    		$data[$i]['puntos'] = '<p>Aun no cuenta con puntos</p>'; 

		    	}else{

		    		$data[$i]['puntos'];

		    	}

		    	if($data[$i]['limite_credito'] == 0)
		    	{

		    		$data[$i]['limite_credito'] = '<p>Aun no se ha asigando algun limite de credito</p>'; 

		    	}else{

		    		$data[$i]['limite_credito'];

		    	}

		    		$data[$i]['acciones'] = '<div class="text-center">

		    								<button class="btn btn-warning btn-sm" data-id="'.$data[$i]['id_cliente'].'" id="infocl"><i class="fas fa-info-circle"></i></button>
		    								<button class="btn btn-primary btn-sm" data-id="'.$data[$i]['id_cliente'].'" id="editarcl"><i class="fas fa-file-signature"></i></button>
		    								<button class="btn btn-danger btn-sm" data-id="'.$data[$i]['id_cliente'].'" id="eliminarcl"><i class="fas fa-trash-alt"></i></button>

		    								</div>';


		    }
		$arr = array('data' => $data);
        echo json_encode($arr);
        return;
	}

	public function eliminarCliente()
	{
		$id_cliente = $this->input->post('id');
		// print_r($id_usuario);
		// die();
		$data = $this->Clientes_model->eliminarCliente($id_cliente);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function recuperar()
	{
		$id_cliente = $this->input->post('id_cliente');
		$data = $this->Clientes_model->recuperar($id_cliente);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function modificar()
	{

		// print_r($_POST['contraseñaEd']);
		// die();
		 if (isset($_POST) && !empty($_POST)) {
				
				$id_cliente = $this->input->post('id_cliente');			
				$nombre = $this->input->post('nombreEd');
				$apaterno = $this->input->post('apaternoEd');
				$amaterno = $this->input->post('amaternoEd');
				$telefono = $this->input->post('telefonoEd');
				$correo = $this->input->post('correoEd');
				$direccion = $this->input->post('direccionEd');

				$data = $this->Clientes_model->modificar($id_cliente, $nombre, $apaterno, $amaterno, $telefono, $correo, $direccion);
				$arr          = array('success' => true, 'data' => $data);
		        echo json_encode($arr);
		        return;
		 			
			}
		
	}


	public function desactivarUsuario()
	{
		$id_cliente = $this->input->post('id_cliente');
		$data = $this->Clientes_model->desactivarUsuario($id_cliente);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}


	public function activarUsuario()
	{
		$id_cliente = $this->input->post('id_cliente');
		$data = $this->Clientes_model->activarUsuario($id_cliente);
		$arr          = array('success' => true, 'data' => $data);
        echo json_encode($arr);
        return;
	}

	// public function enviar($nombre, $correo)
 //    {
 //        $config = array(
 //            'protocol'    => 'smtp',
 //            'smtp_host'   => 'smtp.googlemail.com',
 //            'smtp_user'   => 'lalolai19@gmail.com', //Su Correo de Gmail Aqui
 //            'smtp_pass'   => 'Misticoazul10', // Su Password de Gmail aqui
 //            'smtp_port'   => '465',
 //            'smtp_crypto' => 'ssl',
 //            'mailtype'    => 'html',
 //            'wordwrap'    => true,
 //            'charset'     => 'utf-8',
 //        );
 //        $this->load->library('email', $config);
 //        $this->email->set_newline("\r\n");
 //        $this->email->from('lalolai19@gmail.com');
 //        $asunto = 'Sistema Punto de Venta';
 //        $this->email->subject($asunto);
 //        $mensaje = '<p>Hola '.$nombre.', has quedado regitrado correctamente en el Sistema Punto de Venta';

 //        $this->email->message($mensaje);

 //        $this->email->to($correo);

 //        $this->email->send();
 //        // if ($this->email->send()) {
 //        //     $this->session->set_flashdata('envio', 'Email enviado correctamente');
 //        // } else {
 //        //     $this->session->set_flashdata('envio', 'No se a enviado el email');
 //        // }

 //        // redirect("contacto_controller");
        
 //    }


}