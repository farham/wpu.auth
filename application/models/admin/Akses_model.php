<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses_model extends CI_Model {


    public function getRoleMenu(){
        $this->db->select('a.*, b.nama as header_menu, c.role as role');
        $this->db->from('user_access_menu a');
        $this->db->join('user_menu b','a.menu_id=b.id', 'left');
        $this->db->join('user_role c','a.role_id=c.id', 'left');
        $this->db->order_by('a.role_id, a.menu_id', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getRole(){
        $this->db->select('a.*');
        $this->db->from('user_role a');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getMenu(){
        $this->db->select('a.*');
        $this->db->from('user_menu a');
        $this->db->order_by('a.id, a.urutan', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getUser(){
        $this->db->select('a.*, b.role as nama_role');
        $this->db->from('user a');
        $this->db->join('user_role b','a.role_id=b.id', 'left');
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
}