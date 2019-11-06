<?php

function is_login(){
    //memanggil library 
    $ci = get_instance();

    //cek login
    if (!$ci->session->userdata('username')) {
        //jika belum 
        redirect('auth');
    } else {
        $link = $ci->uri->segment(1,0);
        $role_id = $ci->session->userdata('role_id');

        $dataRole = $ci->db->get_where('roles', ['id' => $role_id, 'role' => $link]);

        if($dataRole->num_rows() < 1){
            redirect('auth/forbidden');
        }
    }
    
}