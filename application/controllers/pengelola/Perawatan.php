<?php

class Perawatan extends CI_Controller
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
            if ($this->CI->session->userdata['level'] == 'admin') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $data = [
            'title' => 'Pengelola | Data Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'petugas' => $this->Petugas_model->getPetugas(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'perawatan' => $this->Perawatan_model->getAllPerawatan()
        ];

        // validations
        $this->form_validation->set_rules('keadaan_koleksi_perawatan', 'keadaan koleksi perawatan', 'required');
        $this->form_validation->set_rules('no_vitrin_koleksi_perawatan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_perawatan', 'tanggal perawatan', 'required');
        $this->form_validation->set_rules('kegiatan_perawatan', 'kegiatan perawatan', 'required');
        $this->form_validation->set_rules('bahan_perawatan', 'bahan', 'required');
        $this->form_validation->set_rules('tambahan_perawatan', 'tambahan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('pengelola/perawatan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Perawatan_model->insertDataPerawatan();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perawatan Berhasil Ditambahkan</div>');
            redirect('admin/perawatan');
        }

        // $data['petugas'] = $this->Petugas_model->getpetugas();
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar');
        // $this->load->view('templates/topbar');
        // $this->load->view('admin/perawatan/index');
        // $this->load->view('templates/footer');
    }

    public function update_perawatan($id)
    {
        $data = [
            'title' => 'Admin | Update Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'petugas' => $this->Petugas_model->getPetugas(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'perawatan' => $this->db->get_where('tbl_perawatan', ['id_perawatan' => $id])->row_array()
        ];

        $this->form_validation->set_rules('keadaan_koleksi_perawatan', 'keadaan koleksi perawatan', 'required');
        $this->form_validation->set_rules('no_vitrin_koleksi_perawatan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_perawatan', 'tanggal perawatan', 'required');
        $this->form_validation->set_rules('kegiatan_perawatan', 'kegiatan perawatan', 'required');
        $this->form_validation->set_rules('bahan_perawatan', 'bahan', 'required');
        $this->form_validation->set_rules('tambahan_perawatan', 'tambahan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perawatan/update');
            $this->load->view('templates/footer');
        } else {
            $this->Perawatan_model->updateDataPerawatan($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perawatan Berhasil Diubah</div>');
            redirect('admin/perawatan');
        }
    }

    public function detail_perawatan($id)
    {
        $data = [
            'title' => 'Admin | Detail Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'perawatan' => $this->Perawatan_model->getPerawatanById($id),
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/perawatan/show', $data);
        $this->load->view('templates/footer');
    }

    public function deletePerawatan($id)
    {
        $this->db->delete('tbl_perawatan', ['id_perawatan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perawatan Berhasil Dihapus!</div>');
        redirect('admin/perawatan');
    }

    public function validasiPerawatan($id)
    {
        $this->db->where('id_perawatan', $this->input->post('id_perawatan'));
        $this->db->update('tbl_perawatan', ['validasi_perawatan' => 'sudah']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perawatan Berhasil Masuk Dihistori Perawatan!</div>');
        redirect('admin/detail_perawatan/' . $id);
    }

    // |------------------------------------------------------
    // | LAPORAN
    // |------------------------------------------------------
    // history perawatan
    public function history()
    {
        $data = [
            'title' => 'Admin | History Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'histories' => $this->Perawatan_model->getAllHistory()
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/history/index');
        $this->load->view('templates/footer');
    }

    public function laporan_observasi()
    {
        $data = [
            'title' => 'Admin | Laporan Observasi',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/observasi', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_observasi_pdf()
    {
        $this->load->library('dompdf_gen');

        $tgl_awal = $this->input->post('dari');
        $tgl_akhir = $this->input->post('sampai');
        $data['observasi'] = $this->Observasi_model->getbytgl($tgl_awal, $tgl_akhir);
        $this->load->view('admin/laporan/pdf/Observasi', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    }

    public function laporan_perbaikan()
    {
        $data = [
            'title' => 'Admin | Laporan Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/perbaikan');
        $this->load->view('templates/footer');
    }

    public function laporan_perbaikan_pdf()
    {
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');

        $data['improvements'] = $this->Perbaikan_model->getPerbaikanByDate($keyword1, $keyword2);
        $this->load->view('admin/laporan/pdf/Perbaikan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    }

    public function laporan_perawatan()
    {
        $data = [
            'title' => 'Admin | History Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/perawatan');
        $this->load->view('templates/footer');
    }

    // |------------------------------------------------------
    // | ADMIN PANEL
    // |------------------------------------------------------
    // profile
    public function profile()
    {
        $data = [
            'title' => 'Admin | Profile',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $old_image = $data['users']['gambar_users'];

        // validation
        $this->form_validation->set_rules('name', 'nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/profile/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'telepon_users' => $this->input->post('telepon_users'),
                'alamat_users' => $this->input->post('alamat_users'),
            ];

            $upload_image = $_FILES['gambar_users']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/users/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_users')) {
                    // $old_image = $data['improvement']['gambar_kerusakan_permintaan_perbaikan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/users/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_users', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('email', $this->input->post('email'));
            $this->db->update('tbl_users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
            redirect('admin/profile');
        }
    }
}
