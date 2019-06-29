<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	}
	public function index(){
		if($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if($this->form_validation->run()==FALSE){
			$data['title'] = "WPU Login Page";
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/auth/v_login');
			$this->load->view('admin/templates/auth_footer');
		}else{
			//echo "Berhasil Login";
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password =  $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user){
			if($user['is_active']==1){
				// cek Password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);
					if($user['role_id']==1){
						redirect('admin');
					}else{
						redirect('user');
					}
					
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Error!Password Wrong
										</div>');
					redirect('auth');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Error!This Email has Not Been Activated
										</div>');
				redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
											Error!There is no Email Registered
										</div>');
			redirect('auth');
		}
	}

	public function registration(){
		if($this->session->userdata('email')){
			redirect('user');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
											'is_unique' => 'Is Already Registered'		
										]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
											'matches' => 'Password doesnot match',
											'min_length' => 'Password To Short'] );
		$this->form_validation->set_rules('password2', 'Password Repeat', 'required|trim|matches[password1]');

		if($this->form_validation->run()==FALSE){
			$data['title'] = "WPU Registration";
	
			$this->load->view('admin/templates/auth_header', $data);
			$this->load->view('admin/auth/v_registration');
		}else{
			
			$post = $this->input->post();
			$arr_insert = array(
				'name' => $post['name'],
				'email' => $post['email'],
				'password' => password_hash($post['password1'], PASSWORD_DEFAULT),
				'image' => 'default.jpg',
				'is_active' => 1,
				'role_id' => 2,
				'created_date' => date('Y-m-d hh:ii:ss')
			);

			$this->db->insert('user', $arr_insert);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											Conratulation!, Your Accont Created. Please Login
										</div>');
			redirect('auth');
		}

		

	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
											You have been LogOut
										</div>');
		redirect('auth');
	}

	public function block(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Access Block';
		$data['sub_menu'] = '';

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
		$this->load->view('admin/auth/blocked', $data);
		$this->load->view('admin/templates/footer');
	}


}
