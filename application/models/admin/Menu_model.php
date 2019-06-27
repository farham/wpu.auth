<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {


    public function getParentMenu(){
        $this->db->select('a.*, b.nama as header_menu');
        $this->db->from('user_sub_menu a');
        $this->db->join('user_menu b','a.menu_id=b.id');
        $this->db->order_by('a.menu_id, a.urutan', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getOnlyParentMenu(){
        $this->db->select('a.*');
        $this->db->from('user_sub_menu a');
        $this->db->where('a.is_parent','1');
        $this->db->order_by('a.menu_id, a.urutan', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getParentMenubyId($id){
        $this->db->select('a.*');
        $this->db->from('user_sub_menu a');
        $this->db->where('a.id',$id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function getSubMenu(){
        $this->db->select('a.*, b.title as parent_menu');
        $this->db->from('user_sub_sub_menu a');
        $this->db->join('user_sub_menu b','a.sub_menu_id=b.id');
        $this->db->order_by('a.sub_menu_id, a.urutan', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    
}