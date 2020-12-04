<?php

class Observasi extends CI_Controller
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
            'title' => 'Admin | Observasi'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['koleksi'] = $this->Koleksi_model->getAll();
        $data['ruang'] = $this->Ruang_koleksi_model->getAll();
        $data['observasi'] = $this->Observasi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/observasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_observasi()
    {
        $data = [
            'title' => 'Admin | Update Observasi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/observasi/update');
        $this->load->view('templates/footer');
    }

    public function updateObservasi()
    {

        $id_koleksi = $this->input->post('id_koleksi');
        $id_ruang_koleksi = $this->input->post('id_ruang_koleksi');
        $bahan_observasi_koleksi = $this->input->post('bahan_observasi_koleksi');
        $keadaan_observasi_koleksi = $this->input->post('keadaan_observasi_koleksi');
        $no_vitrin_observasi_koleksi = $this->input->post('no_vitrin_observasi_koleksi');
        $jumlah_koleksi = $this->input->post('jumlah_koleksi');
        $time_observasi = $this->input->post('time_observasi');
        $rekomendasi_observasi_koleksi = $this->input->post('rekomendasi_observasi_koleksi');
        $id_users = $this->input->post('id_users');
        $id = $this->input->post('id_observasi');

        $data = [
            'id_koleksi' => $id_koleksi,
            'id_ruang_koleksi' => $id_ruang_koleksi,
            'bahan_observasi_koleksi' => $bahan_observasi_koleksi,
            'keadaan_observasi_koleksi' => $keadaan_observasi_koleksi,
            'no_vitrin_observasi_koleksi' => $no_vitrin_observasi_koleksi,
            'jumlah_koleksi' => $jumlah_koleksi,
            'time_observasi' => $time_observasi,
            'rekomendasi_observasi_koleksi' => $rekomendasi_observasi_koleksi,
            'time_update_observasi' => date('Y-m-d H:i:s'),
            'id_users' => $id_users
        ];

        $insert = $this->Observasi_model->update($id, $data);

        if ($insert) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil di Update !</div>');
            redirect('observasi/observasi');
        }
    }

    public function postObservasi()
    {

        $id_koleksi = $this->input->post('id_koleksi');
        $id_ruang_koleksi = $this->input->post('id_ruang_koleksi');
        $bahan_observasi_koleksi = $this->input->post('bahan_observasi_koleksi');
        $keadaan_observasi_koleksi = $this->input->post('keadaan_observasi_koleksi');
        $no_vitrin_observasi_koleksi = $this->input->post('no_vitrin_observasi_koleksi');
        $jumlah_koleksi = $this->input->post('jumlah_koleksi');
        $time_observasi = $this->input->post('time_observasi');
        $rekomendasi_observasi_koleksi = $this->input->post('rekomendasi_observasi_koleksi');
        $id = $this->input->post('id_users');

        $data = [
            'id_koleksi' => $id_koleksi,
            'id_ruang_koleksi' => $id_ruang_koleksi,
            'bahan_observasi_koleksi' => $bahan_observasi_koleksi,
            'keadaan_observasi_koleksi' => $keadaan_observasi_koleksi,
            'no_vitrin_observasi_koleksi' => $no_vitrin_observasi_koleksi,
            'jumlah_koleksi' => $jumlah_koleksi,
            'time_observasi' => $time_observasi,
            'rekomendasi_observasi_koleksi' => $rekomendasi_observasi_koleksi,
            'time_create_observasi' => date('Y-m-d H:i:s'),
            'id_users' => $id
        ];

        $insert = $this->Observasi_model->tambah('tbl_observasi', $data);

        if ($insert) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');
            redirect('observasi/observasi');
        }
    }

    public function deleteObservasi($id)
    {
        $data['id_observasi'] = $this->Observasi_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('observasi/observasi');
    }

    // observasi

}
