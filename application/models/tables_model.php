<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tables_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //obtenemos las entradas de todos o un usuario, dependiendo
    // si le pasamos le id como argument o no
    public function table_info($keyrestaurant,$keysucursal,$keytable)
    {
      $this->db->select('identificador_wave,identificador_mesero,atendidas,excedidas,calificacionestrellas,porcentaje,tiempoespera');
      $this->db->from('dispositivos');
      $array = array('identificador_restaurante' => $keyrestaurant,
                     'identificador_sucursal' => $keysucursal,
                     'identificador_wave' => $keytable);

      $this->db->where($array);

        $consulta = $this->db->get();
        $resultado = $consulta->result();

      return $resultado;
    }


}
/*
 * end of application/models/consultas_model.php
 */
