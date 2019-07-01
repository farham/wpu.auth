<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
    }
	// MY PRofile
    public function index(){
       	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'My Profile';
		$data['sub_menu'] = '';
	   
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
		$this->load->view('admin/user/index', $data);
		$this->load->view('admin/templates/footer');
	}
	// Edit Profile
	public function editProfile(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile';
		$data['sub_menu'] = '';

		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/topbar', $data);
			$this->load->view('admin/user/edit_profile', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048'; // 2 MEga

				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('image')){
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH.'assets/img/profile/'.$old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image',$new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('created_date', date('Y-m-d H:i:s'));
			$this->db->set('name',$name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
														Conratulation!, Your Profile Has been Updated
													</div>');
						redirect('user');
		}
		
	}

	// ChangePassword
	public function changePass(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Change Password';
		$data['sub_menu'] = '';

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]|matches[repeat_password]');
		$this->form_validation->set_rules('repeat_password', 'Repeat Password', 'required|trim|min_length[6]|matches[new_password]');

		if($this->form_validation->run()==FALSE){
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/topbar', $data);
			$this->load->view('admin/user/change_password', $data);
			$this->load->view('admin/templates/footer');
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			//$repeat_password = $this->input->post('repeat_password');
			

			if(!password_verify($current_password, $data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
														Wrong, Password
													</div>');
				redirect('user/changePass');
			}else{
				if($current_password == $new_password){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
														Wrong, Password Cannot Same with Preveous
													</div>');
				redirect('user/changePass');
				}else{
					// Sudah Oke
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password',$password_hash);
					$this->db->where('email', $data['user']['email']);
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
													Conratulation!, Your Password Has been Updated
													</div>');
					redirect('user/changePass');
				}
			}
		}
	}

}