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
        $data = [
            'title' => 'Beranda Museum',
            'abouts' => $this->db->get('tbl_about_museum')->result_array()
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard/index');
        $this->load->view('templates/footer');
    }

    public function update_about($id)
    {
        $data = [
            'title' => 'Admin | Dashboard',
            'about' => $this->db->get('tbl_about_museum', ['id_about_museum' => $id])->row_array(),
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];

        $old_image = $data['about']['gambar_museum'];

        $this->form_validation->set_rules('nama_museum', 'nama museum', 'required');
        $this->form_validation->set_rules('deskripsi_museum', 'deskripsi museum', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/dashboard/update_about');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_museum' => $this->input->post('nama_museum'),
                'deskripsi_museum' => $this->input->post('deskripsi_museum'),
            ];

            $upload_image = $_FILES['gambar_museum']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/abouts/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_museum')) {
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/abouts/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_museum', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('id_about_museum', $this->input->post('id_about_museum'));
            $this->db->update('tbl_about_museum', $data);

            redirect('admin');
        }
    }

    // |------------------------------------------------------
    // | Data Master
    // |------------------------------------------------------
    //end data us// |------------------------------------------------------
    // | Kegiatan
    // |------------------------------------------------------
    // perbaikan
    public function perbaikan()
    {
        $data = [
            'title' => 'Admin | Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'collection_rooms' => $this->db->get('tbl_ruang_koleksi')->result_array(),
            'improvements' => $this->Perbaikan_model->getAllImprovement(),
        ];

        $this->form_validation->set_rules('bahan_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('keadaan_koleksi_permintaan_perbaikan', 'Keadaan koleksi', 'required');
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_permintaan_perbaikan', 'tanggal permintaan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perbaikan/index');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_koleksi' => $this->input->post('id_koleksi', true),
                'id_ruang_koleksi' => $this->input->post('id_ruang_koleksi', true),
                'id_users' => $data["users"]["id_users"],
                'bahan_permintaan_perbaikan' => $this->input->post('bahan_permintaan_perbaikan', true),
                'keadaan_koleksi_permintaan_perbaikan' => $this->input->post('keadaan_koleksi_permintaan_perbaikan', true),
                'no_vitrin_permintaan_perbaikan' => $this->input->post('no_vitrin_permintaan_perbaikan', true),
                'time_permintaan_perbaikan' => $this->input->post('time_permintaan_perbaikan', true),
                'validasi_permintaan_perbaikan' => 'belum',
                'status_permintaan_perbaikan' => 'closed',
                'time_create_permintaan_perbaikan' => date("Y-m-d H:i:s"),
                'time_update_permintaan_perbaikan' => date("Y-m-d H:i:s")
            ];

            $upload_image = $_FILES['gambar_kerusakan_permintaan_perbaikan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/perbaikan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kerusakan_permintaan_perbaikan')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kerusakan_permintaan_perbaikan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Ditambahkan</div>');
            $this->db->insert('tbl_permintaan_perbaikan', $data);
            redirect('admin/perbaikan');
        }
    }

    public function update_perbaikan($id)
    {
        $data = [
            'title' => 'Admin | Update Perbaikan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'collection_rooms' => $this->db->get('tbl_ruang_koleksi')->result_array(),
            'improvement' => $this->Perbaikan_model->getImprovementById($id),
        ];

        $old_image = $data["improvement"]["gambar_kerusakan_permintaan_perbaikan"];

        // form validations
        $this->form_validation->set_rules('bahan_permintaan_perbaikan', 'Bahan Permintaan Perbaikan', 'required');
        $this->form_validation->set_rules('keadaan_koleksi_permintaan_perbaikan', 'Keadaan koleksi', 'required');
        $this->form_validation->set_rules('no_vitrin_permintaan_perbaikan', 'no vitrin', 'required');
        $this->form_validation->set_rules('time_permintaan_perbaikan', 'tanggal permintaan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/perbaikan/update');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_koleksi' => $this->input->post('id_koleksi', true),
                'id_ruang_koleksi' => $this->input->post('id_ruang_koleksi', true),
                'id_users' => $data["users"]["id_users"],
                'bahan_permintaan_perbaikan' => $this->input->post('bahan_permintaan_perbaikan', true),
                'keadaan_koleksi_permintaan_perbaikan' => $this->input->post('keadaan_koleksi_permintaan_perbaikan', true),
                'no_vitrin_permintaan_perbaikan' => $this->input->post('no_vitrin_permintaan_perbaikan', true),
                'time_permintaan_perbaikan' => $this->input->post('time_permintaan_perbaikan', true),
                'validasi_permintaan_perbaikan' => 'belum',
                'status_permintaan_perbaikan' => 'closed',
                'time_update_permintaan_perbaikan' => date("Y-m-d H:i:s")
            ];

            $upload_image = $_FILES['gambar_kerusakan_permintaan_perbaikan']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/perbaikan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_kerusakan_permintaan_perbaikan')) {
                    // $old_image = $data['improvement']['gambar_kerusakan_permintaan_perbaikan'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/perbaikan/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_kerusakan_permintaan_perbaikan', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Diubah</div>');
            // $this->db->insert('tbl_permintaan_perbaikan', $data);
            $this->db->where('id_permintaan_perbaikan', $this->input->post('id_permintaan_perbaikan'));
            $this->db->update('tbl_permintaan_perbaikan', $data);
            redirect('admin/perbaikan');
        }
    }

    public function deletePerbaikan($id)
    {
        $data = [
            'improvement' => $this->Perbaikan_model->getImprovementById($id),
        ];

        $old_image = $data["improvement"]["gambar_kerusakan_permintaan_perbaikan"];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/perbaikan/' . $old_image);
        }

        $this->db->delete('tbl_permintaan_perbaikan', ['id_permintaan_perbaikan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perbaikan Berhasil Dihapus!</div>');
        redirect('admin/perbaikan');
    }

    // perbaikan
    public function perawatan()
    {
        $data = [
            'title' => 'Admin | Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'petugas' => $this->Petugas_model->getPetugas(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            'perawatan' => $this->Perawatan_model->getAllBelumPerawatan()
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
            $this->load->view('admin/perawatan/index');
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
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $data = [
            'title' => 'Admin | History Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'histories' => $this->Perawatan_model->getAllHistory()
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['historyperawatan'] = $this->Perawatan_model->getAllHistory();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/history/index', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_observasi()
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
            'title' => 'Admin | Laporan Observasi',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['observasi'] = $this->Observasi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/observasi', $data);
        $this->load->view('templates/footer');
    }

    public function laporan_observasi_pdf()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $this->load->library('dompdf_gen');

        $tgl_awal = $this->input->post('dari');
        $tgl_akhir = $this->input->post('sampai');
        $data = [
            'awal' =>  $tgl_awal,
            'akhir' => $tgl_akhir,
            'logo' => '<img src="assets/img/museum-logo.png" width="80" alt="" class="mr-3">'
        ];
        $data['observasi'] = $this->Observasi_model->getbytgl($tgl_awal, $tgl_akhir);
        $this->load->view('admin/laporan/pdf/Observasi', $data);
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $html .=  '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">';
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    }

    public function laporan_perbaikan()
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
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'logo' => '<img src="assets/img/Logo.png" width="30" alt="" class="mr-3">',
            'gambar' => 'assets/img/perbaikan/'
        ];

        $data['improvements'] = $this->Perbaikan_model->getbytgl($keyword1, $keyword2);
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
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $data = [
            'title' => 'Admin | Laporan Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'perawatan' => $this->Perawatan_model->getAllBelumPerawatan()
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/laporan/perawatan');
        $this->load->view('templates/footer');
    }

    public function laporan_perawatan_pdf()
    {
        if ($this->CI->router->fetch_class() != "login") {
            // session check logic here...change this accordingly
            if ($this->CI->session->userdata['level'] == 'pengelola') {
                redirect('Admin');
            } elseif ($this->CI->session->userdata['level'] == 'pihak_pusat') {
                redirect('Admin');
            }
        }
        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');

        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'logo' => '<img src="assets/img/museum-logo.png" width="80" alt="" class="mr-3">'
        ];

        $data['perawatan'] = $this->Perawatan_model->getbytgl($keyword1, $keyword2);
        $this->load->view('admin/laporan/pdf/Perawatan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_observasi.pdf", ['Attachment' => 0]);
    }

    // |------------------------------------------------------
    // | ADMIN PANEL
    // |------------------------------------------------------
    // profile
    public function profile()
    {
        $data = [
            'title' => 'Profile',
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
