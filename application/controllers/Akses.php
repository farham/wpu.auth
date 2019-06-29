<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

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
        is_logged_in(); // Helper
		$this->load->library('form_validation');
		$this->load->model('admin/akses_model', 'akses');
    }

    public function role(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Setting Akses';
        $data['sub_menu'] = 'Role';
        
        // Config Database
        $data['data_role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/akses/role', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            $this->db->insert('user_role', $post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Conratulation!, Your Add Role
                                        </div>');
            redirect('akses/role');    
        }
        
        
    }

    public function roleDelete($id){
        //echo $id;
		if($id){
			$this->db->delete('user_role', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Akses Role
										</div>');
			redirect('akses/role');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('akses/role');
		}
    }

    // Role Akses User
    public function aksesUserRole(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Setting Akses';
        $data['sub_menu'] = 'Role Akses User';
        
        // Config Database
        $data['data_role_menu'] = $this->akses->getRoleMenu();
        $data['arr_role'] = $this->akses->getRole();
        $data['arr_menu'] = $this->akses->getMenu();

        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu Header', 'required');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/akses/aksesuserrole', $data);
            $this->load->view('admin/templates/footer');
        }else{
            $post = $this->input->post();
            $this->db->insert('user_access_menu', $post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                            Conratulation!, Your Add Role Akses Menu
                                        </div>');
            redirect('akses/aksesUserRole');
        }
    }

    public function aksesRoleDelete($id){
        //echo $id;
		if($id){
			$this->db->delete('user_access_menu', array('id' => $id));
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Delete Akses Role Menu
										</div>');
			redirect('akses/aksesUserRole');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Warning! Data Not Found
										</div>');
			redirect('akses/aksesUserRole');
		}
    }


}