<?php

class Pemeriksaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->cek_status();
        $this->CI = &get_instance();
        //$this->load->library('dompdf_gen');

    }

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
        $data1['users'] = $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array();
        $isi = $this->db->join('tbl_users', 'tbl_users.id_users =tbl_perawatan.id_users')->get_where('tbl_perawatan', ['tbl_perawatan.id_users' => $data1['users']['id_users']])->result_array();
        $isi = $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi =tbl_perawatan.id_koleksi')->get_where('tbl_perawatan', ['tbl_perawatan.id_users' => $data1['users']['id_users']])->result_array();
        $data = [
            'title' => 'Petugas | Perawatan',
            'users' => $this->db->get_where('tbl_users', ['email' => $this->session->userdata('email')])->row_array(),
            'petugas' => $this->Petugas_model->getPetugas(),
            'collections' => $this->db->get('tbl_koleksi')->result_array(),
            //'perawatan' => $this->Perawatan_model->getAllPerawatan()
            //'perawatan' => $this->Perawatan_model->getAllTugasPerawatan()
            'perawatan' => $isi
        ];
        $data['koleksi'] = $this->Koleksi_model->getAll();

        $data['observasi'] = $this->Observasi_model->getAll();
        $data['pemeriksaan'] = $this->Pemeriksaan_model->getAll();
        // $isi = $this->db->join('tbl_users', 'tbl_users.id_users =tbl_perawatan.id_users')->get_where('tbl_perawatan', ['tbl_perawatan.id_users' => $data['users']['id_users']])->result_array();
        //$data['perawatan'] = $isi;
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
            $this->load->view('petugas/pemeriksaan/index');
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

    public function UpdateGambarPemeriksaan()
    {
        $id = $this->input->post('id_pemeriksaan');


        //CONFIGURASI UPLOAD IMAGE
        $config['upload_path']         = './assets/upload/pemeriksaan';
        $config['allowed_types']     = 'jpg|png|svg|jpeg';
        $config['max_size']         = '12000';

        $this->load->library('upload', $config);

        //PROSES UPLOAD IMAGE
        if (!$this->upload->do_upload('gambar_kerusakan')) {
            $data['errors']     = $this->upload->display_errors();
            print_r($data);
        } else {
            //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
            $upload_data                = array('uploads' => $this->upload->data());
            // Image Editor
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/pemeriksaan/' . $upload_data['uploads']['file_name'];
            $config['new_image']         = './assets/upload/pemeriksaan/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['quality']             = "100%";
            $config['max_size'] = '100M';
            $config['maintain_ratio']     = FALSE;
            $config['width']             = 5028; // Pixel
            $config['height']             = 3364; // Pixel
            $config['x_axis']             = 0;
            $config['y_axis']             = 0;
            $config['thumb_marker']     = '';
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            //PROSES MASUK KEDATABASE
            //$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);
            //date_default_timezone_set("ASIA/JAKARTA");
            $data = array(
                // 'id_koleksi'    => $this->input->post('id_koleksi'),

                // 'kondisi_kerusakan'    => $this->input->post('kondisi_kerusakan'),
                'status_pemeriksaan'    => '1',
                'id_users'    => $this->session->userdata('id_users'),
                'time_pemeriksaan'    => date('Y-m-d H:i:s'),
                'gambar_kerusakan'        => $upload_data['uploads']['file_name']
            );

            $update = $this->Pemeriksaan_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Bukti kerusakan berhasil di update !</div>');

                redirect('petugas/pemeriksaan/Pemeriksaan');
            }
        }
    }

    public function updatePemeriksaan()

    {
        $id = $this->input->post('id_pemeriksaan');
        $id_koleksi = $this->input->post('id_koleksi');

        $kondisi_kerusakan = $this->input->post('kondisi_kerusakan');
        // $id_users = $this->input->post('id_users');


        $data = [
            'id_koleksi' => $id_koleksi,

            'kondisi_kerusakan' => $kondisi_kerusakan,

            'id_users' => $this->session->userdata('id_users'),
        ];
        $this->Pemeriksaan_model->update($id, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perawatan Berhasil Diubah</div>');
        redirect('petugas/pemeriksaan/pemeriksaan');
    }


    public function doTambahBerita()
    {

        $this->form_validation->set_rules(
            'kondisi_kerusakan',
            'kondisi kerusakan',
            'required',
            'required',
            array('required' => ' kondisi kerusakan Harus di Isi')
        );

        if ($this->form_validation->run() ===  FALSE) {
            $this->doTambahBerita();
        } else {
            //CONFIGURASI UPLOAD IMAGE
            $config['upload_path']         = './assets/upload/pemeriksaan';
            $config['allowed_types']     = 'jpg|png|svg|jpeg';
            $config['max_size']         = '12000';

            $this->load->library('upload', $config);

            //PROSES UPLOAD IMAGE
            if (!$this->upload->do_upload('gambar_kerusakan')) {
                $data['errors']     = $this->upload->display_errors();
                print_r($data);
            } else {
                //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/pemeriksaan/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/pemeriksaan/thumbs/';
                $config['create_thumb']     = TRUE;
                $config['quality']             = "100%";
                $config['max_size'] = '100M';
                $config['maintain_ratio']     = FALSE;
                $config['width']             = 5028; // Pixel
                $config['height']             = 3364; // Pixel
                $config['x_axis']             = 0;
                $config['y_axis']             = 0;
                $config['thumb_marker']     = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                //PROSES MASUK KEDATABASE
                //$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);
                //date_default_timezone_set("ASIA/JAKARTA");
                $data = array(
                    'id_koleksi'    => $this->input->post('id_koleksi'),

                    'kondisi_kerusakan'    => $this->input->post('kondisi_kerusakan'),
                    'status_pemeriksaan'    => '1',
                    'id_users'    => $this->session->userdata('id_users'),
                    'time_pemeriksaan'    => date('Y-m-d H:i:s'),
                    'gambar_kerusakan'        => $upload_data['uploads']['file_name']
                );

                $this->Pemeriksaan_model->insert($data);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');

                redirect(site_url('petugas/pemeriksaan/pemeriksaan'));
            }
        }
    }
    public function delete($id)
    {
        $data = [
            'improvement' => $this->Pemeriksaan_model->getPById($id),
        ];

        $old_image = $data["improvement"]["gambar_kerusakan"];
        if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/upload/pemeriksaan/' . $old_image);
        }

        $this->db->delete('tbl_pemeriksaan', ['id_pemeriksaan' => $id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('petugas/pemeriksaan/Pemeriksaan');
    }
}
