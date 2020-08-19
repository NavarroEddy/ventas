<?php

class Usuarios_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

        $this->load->database();

    }

    public function insertar($usuario)
    {
       return($this->db->insert('usuarios', $usuario));
    }

    public function datosAjax()
    {
    	$datos = $this->db
            ->select("u.id_usuario,
                                u.nombre,
                                u.apaterno,
                                u.amaterno,
                                cr.roles,
                                u.activo,
                                u.correo")
            ->from("usuarios u")
            ->join('cat_roles cr','u.id_rol = cr.id_rol')
            // ->where("u.activo", '1')
            ->order_by('nombre', 'ASC')
            ->get()
            ->result_array();

            
            return $datos;
            
        

                   
    }

    public function eliminarUsuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->delete('usuarios');
        return;
    }

    public function recuperar($id_usuario)
    {

        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }

    }

    public function modificar($id_usuario, $nombre, $apaterno, $amaterno, $id_rol, $correo, $id_usuario_registro, $fecha_actualizacion, $contraseña)
    {
        // print_r($nombre);
        // die();

        if($contraseña != ''){

            $this->db->where('id_usuario', $id_usuario);
            $this->db->set('nombre', $nombre);
            $this->db->set('apaterno', $apaterno);
            $this->db->set('amaterno', $amaterno);
            $this->db->set('id_rol', $id_rol);
            $this->db->set('correo', $correo);
            $this->db->set('id_usuario_registro', $id_usuario_registro);
            $this->db->set('fecha_actualizacion', $fecha_actualizacion);
            $this->db->set('contraseña', $contraseña);
            $this->db->update('usuarios');
            return;

          } else {

            $this->db->where('id_usuario', $id_usuario);
            $this->db->set('nombre', $nombre);
            $this->db->set('apaterno', $apaterno);
            $this->db->set('amaterno', $amaterno);
            $this->db->set('id_rol', $id_rol);
            $this->db->set('correo', $correo);
            $this->db->set('id_usuario_registro', $id_usuario_registro);
            $this->db->set('fecha_actualizacion', $fecha_actualizacion);
            $this->db->update('usuarios');    
            return;

          } 
    }


    public function desactivarUsuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->set('activo', '0');
        $this->db->update('usuarios');
        return;
    }


    public function activarUsuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->set('activo', '1');
        $this->db->update('usuarios');
        return;
    }


    public function get_roles()
    {
        $datos = $this->db->select("*")
            ->from("cat_roles")
            ->where("activo", '1')
            ->order_by('roles', 'ASC')
            ->get()
            ->result_array();

            
            return $datos;
            
        

                   
    }

    public function consultar($correo)
    {
        $this->db->select('correo');
        $this->db->from('usuarios');
        $this->db->where('correo', $correo);
        $this->db->where('activo', '1');
        $query = $this->db->get();

        $row_query1 = $query->num_rows();

        return $row_query1;

    }

    
}
