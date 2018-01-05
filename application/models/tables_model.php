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
    public function table_info($keyrestaurant,$keysucursal,$keytable,$keydatestart,$keydatefinish)
    {

      $this->db->select('sum(estatus0previus1) / count(*) as atendidas,
                         sum(estatus0previus2) / count(*) as retardos,
                         sum(estatus0previus3) / count(*) as excedidas,
                         sum(t_tiempoespera) / count(*) as tiempoespera,
                         identificador_mesero,
                         SUBSTR(identificador_dispositivo ,11 , 12 ) as numero,
                         meseros.alias,meseros.imagenbase as avatar');

      $this->db->from('servicios_dispositivo_acumulado_por_dia');

      $this->db->join('meseros', 'servicios_dispositivo_acumulado_por_dia.identificador_mesero =  meseros.identificador_alfanumerico');

      $array = array('identificador_restaurante' => $keyrestaurant,
                     'identificador_sucursal' => $keysucursal,
                     'identificador_dispositivo' => $keytable,
                     'fecha >=' => $keydatestart,
                     'fecha <=' => $keydatefinish);

      $this->db->where($array);

       $this->db->group_by('identificador_mesero');

      $consulta = $this->db->get();
      $resultado = $consulta->result();

      return $resultado;
    }


}
/*
 * end of application/models/consultas_model.php
 */
