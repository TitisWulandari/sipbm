<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
    }

    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $data = [
            'title' => 'Admin | Users'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['allusers'] = $this->Users_model->getAllUsers();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/users/index');
        $this->load->view('templates/footer');
    }
    public function registerFormUsers()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confrim_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('users/users');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $pass,
                'level' => $level,
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');
                redirect('users/users');
            }
        }
    }

    public function updateUsers()
    {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('users/users');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $id = $this->input->post('id_users');
            $level = $this->input->post('level');
            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'email' => $email,
                'level' => $level,
                'time_update_users' => date('Y-m-d H:i:s')
            ];
            $update = $this->Users_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('users/users');
            }
        }
    }

    public function updatePwdUsers()
    {
        $password = $this->input->post('password');
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $id = $this->input->post('id_users');

        // date_default_timezone_set("ASIA/JAKARTA");
        $data = [
            'password' => $pass,
            'time_update_users' => date('Y-m-d H:i:s')
        ];
        $update = $this->Users_model->update($id, $data);
        if ($update) {
            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
            redirect('users/users');
        }
    }

    public function deleteusers($id)
    {
        $data['id_users'] = $this->Users_model->delete($id);
        $data['id_users'] = $this->Users_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('users/users');
    }


    //end data users
    public function update_users()
    {
        $data = [
            'title' => 'Admin | Update User'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/users/update');
        $this->load->view('templates/footer');
    }
}
