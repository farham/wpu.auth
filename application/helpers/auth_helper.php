<?php 

function is_logged_in(){
    
    $ci = get_instance();
   
    if(!$ci->session->userdata('email')){
        // session inject before loggin
        redirect('auth');
    }else{
        $role_id = $ci->session->userdata('role_id');
        $menu    = $ci->uri->segment('1');

        // Cek Menu dengan Nama menu dari Uri segment
        $queryMenu = $ci->db->get_where('user_menu', ['nama' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        // Cek Tabel Akses
        $userAccess = $ci->db->get_where('user_access_menu', ['menu_id' => $menu_id, 'role_id' => $role_id])->num_rows();
        if($userAccess < 1){
            redirect('auth/block');
        }
    }
}
?>