<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/menu_model', 'menu');
    }

    public function index(){
       	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
		$data['sub_menu'] = 'Header Menu';
		
		// Config Database
		$data['data_menu'] = $this->db->get('user_menu')->result_array();
	   
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
		$this->load->view('admin/menu/index', $data);
		$this->load->view('admin/templates/footer');
	}
	
	// Header Menu
	public function addMenuHeader(){
		//
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('urutan', 'Urutan', 'required|trim');

		if($this->form_validation->run()==FALSE){
			redirect('menu');
		}else{
			//insert Menu
			$post = $this->input->post();
			$arr_insert = array(
				'nama' => $post['nama'],
				'urutan' => $post['urutan'],
			);

			$this->db->insert('user_menu', $arr_insert);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Your Add New header Menu
										</div>');
			redirect('menu');
		}


	}

	public function MenuDelete($id){
		echo $id;
		if($id){
			$this->db->delete('user_menu', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Header Menu
										</div>');
			redirect('menu');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('menu');
		}
	}

	// Parent Menu

	public function parentMenu(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
		$data['sub_menu'] = 'Parent Menu';
		
		// Config Database
		$data['data_menu'] = $this->menu->getParentMenu();
		$data['arr_header'] = $this->db->get('user_menu')->result_array();
	   
		$this->form_validation->set_rules('menu_id', 'Menu Header', 'required');
		$this->form_validation->set_rules('title', 'Nama', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');
		$this->form_validation->set_rules('urutan', 'Icon', 'required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/topbar', $data);
			$this->load->view('admin/menu/parentmenu', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$post = $this->input->post();

			$this->db->insert('user_sub_menu', $post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Your Add New Parent Menu
										</div>');
			redirect('menu/parentMenu');
			
		}
		
	}

	public function parentMenuDelete($id){
		echo $id;
		if($id){
			// Cek DB
			$parent_menu = $this->menu->getParentMenubyId($id);
			//$sub_menu = $this->menu->getSubMenubyparentId($id);
			if($parent_menu['parent_id']==1){
				//Delete 2 Table
				$this->db->delete('user_sub_sub_menu', array('sub_menu_id' => $id));
				$this->db->delete('user_sub_menu', array('id' => $id));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
												Conratulation!, Delete Parent Menu
											</div>');
				redirect('menu/subMenu');
			}else{
				// Delete Single Table
				$this->db->delete('user_sub_menu', array('id' => $id));
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
												Conratulation!, Delete Parent Menu
											</div>');
				redirect('menu/subMenu');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('menu/subMenu');
		}
	}

	// Sub Menu
	public function subMenu(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
		$data['sub_menu'] = 'Sub Menu';

		// Config Database
		$data['data_menu'] = $this->menu->getSubMenu();
		$data['arr_parent'] = $this->menu->getOnlyParentMenu();
	   
		$this->form_validation->set_rules('sub_menu_id', 'Menu Parent', 'required');
		$this->form_validation->set_rules('title', 'Nama', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('urutan', 'Icon', 'required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/topbar', $data);
			$this->load->view('admin/menu/submenu', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$post = $this->input->post();

			$this->db->insert('user_sub_sub_menu', $post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Your Add New Sub Menu
										</div>');
			redirect('menu/subMenu');
			
		}
	}

	public function subMenuDelete($id){
		echo $id;
		if($id){
			$this->db->delete('user_sub_sub_menu', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Sub Menu
										</div>');
			redirect('menu/subMenu');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('menu/subMenu');
		}
	}

}