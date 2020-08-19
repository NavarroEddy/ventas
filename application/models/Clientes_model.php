<?php

class Clientes_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

        $this->load->database();

    }

    public function insertar($cliente)
    {
       return($this->db->insert('clientes', $cliente));
    }

    public function datosAjax()
    {
    	$datos = $this->db
            ->select("*")
            ->from("clientes ")
            ->order_by('nombre', 'ASC')
            ->get()
            ->result_array();

            
            return $datos;
            
        

                   
    }

    public function eliminarCliente($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
        return;
    }

    public function recuperar($id_cliente)
    {

        $this->db->from('clientes');
        $this->db->where('id_cliente', $id_cliente);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function modificar($id_cliente, $nombre, $apaterno, $amaterno, $telefono, $correo, $direccion)
    {
        // print_r($nombre);
        // die();

            $this->db->where('id_cliente', $id_cliente);
            $this->db->set('nombre', $nombre);
            $this->db->set('apaterno', $apaterno);
            $this->db->set('amaterno', $amaterno);
            $this->db->set('telefono', $telefono);
            $this->db->set('correo', $correo);
            $this->db->set('direccion', $direccion);
            $this->db->update('clientes');
            return;

         
    }


    public function desactivarUsuario($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->set('activo', '0');
        $this->db->update('clientes');
        return;
    }


    public function activarUsuario($id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->set('activo', '1');
        $this->db->update('clientes');
        return;
    }

    
}
