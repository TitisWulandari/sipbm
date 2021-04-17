<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        //$this->load->library('dompdf_gen');
    }

    // |------------------------------------------------------
    // | Dashboard
    // |------------------------------------------------------

    public function index()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'admin') {
                redirect('Admin');
            }
        }
		
		$data = [
            'title' => 'Pengelola | Data Pemeriksaan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'petugas' => $this->Petugas_model->getPetugas(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'perawatan' => $this->Perawatan_model->getAllBelumPerawatan()
        ];
        $data['pemeriksaan'] = $this->Pemeriksaan_model->getAllAdmin();

        // validations

        $this->form_validation->set_rules('time_perawatan', 'tanggal perawatan', 'required');
        $this->form_validation->set_rules('kegiatan_perawatan', 'kegiatan perawatan', 'required');
        $this->form_validation->set_rules('penanggung_perawatan', 'penanggung', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('pengelola/pemeriksaan/index');
            $this->load->view('templates/footer');
        } else {
            $this->Perawatan_model->insertDataPerawatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses, Data Pemeriksaan Berhasil Ditambahkan</div>');
            redirect('admin/perawatan');
        }

        // $data['petugas'] = $this->Petugas_model->getpetugas();
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar');
        // $this->load->view('templates/topbar');
        // $this->load->view('admin/perawatan/index');
        // $this->load->view('templates/footer');
    }
	
	public function updateStatusPemeriksaan($id)
    {
        $client = $this->Pemeriksaan_model->getPById($id);
        $status_pemeriksaan = "";

        if ($client->status_pemeriksaan == "1") {
            $status_pemeriksaan = "2";
        } else {
            $status_pemeriksaan = "2";
        }

        $data = array(
            'id_pemeriksaan'         => $id,
            'status_pemeriksaan'     => $status_pemeriksaan
        );

        $this->Pemeriksaan_model->updateData($id, $data);

        redirect(site_url('admin/pemeriksaan'));
    }
}