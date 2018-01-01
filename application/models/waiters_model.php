<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Waiters_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //obtenemos las entradas de todos o un usuario, dependiendo
    // si le pasamos le id como argument o no
    public function users_entrys()
    {

      $this->db->select('alias, email, codigo_mesero_login');
      $this->db->from('meseros');

      $consulta = $this->db->get();
      $resultado = $consulta->result();

        return $resultado;
    }


}
/*
 * end of application/models/consultas_model.php
 */
