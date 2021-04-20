<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    private $_table = 'user';

    public function login_check($where)
    {
        $query = $this->db->get_where($this->_table, $where)->row_array();
        return $query;
    }
}
