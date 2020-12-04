<?php

class Petugas extends CI_Controller
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
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('Admin');
            }
        }
        $data = [
            'title' => 'Pusat | Data Petugas'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['petugas'] = $this->Petugas_model->getpetugas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pusat/petugas/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_petugas()
    {
        $data = [
            'title' => 'Admin | Update Petugas'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/petugas/update');
        $this->load->view('templates/footer');
    }

    public function registerPetugas()
    {

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');

        if ($this->form_validation->run() == FALSE) {

            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {

            $name = $this->input->post('name');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');

            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'level' => 'petugas_perawatan',
                'time_create_users' => date('Y-m-d H:i:s')
            ];

            $insert = $this->Auth_model->register("tbl_users", $data);
            //$insert = $this->db->insert('tbl_users', $data);

            if ($insert) {

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data petugas berhasil ditambahkan !</div>');
                redirect('petugas/petugas');
            }
        }
    }

    public function updatePetugas()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_users', 'alamat', 'required');
        $this->form_validation->set_rules('telepon_users', 'telepon', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin/users');
        } else {
            $name = $this->input->post('name');
            $alamat_users = $this->input->post('alamat_users');
            $telepon_users = $this->input->post('telepon_users');
            $id = $this->input->post('id_users');

            date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'name' => $name,
                'alamat_users' => $alamat_users,
                'telepon_users' => $telepon_users,
                'time_update_users' => date('Y-m-d H:i:s')
            ];
            $update = $this->Users_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('petugas/petugas');
            }
        }
    }

    public function deletePetugas($id)
    {
        $data['id_users'] = $this->Users_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('petugas/petugas');
    }
}
