<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurants_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //obtenemos las entradas de todos o un usuario, dependiendo
    // si le pasamos le id como argument o no
    public function restaurant_info($key)
    {
        $this->db->select('nombre,clave_restaurante,imagen,division');
        $this->db->from('restaurantes');
        $this->db->where("clave_restaurante",$key);

        $consulta = $this->db->get();
        $resultado = $consulta->result();

        return $resultado;
    }


}
/*
 * end of application/models/consultas_model.php
 */
