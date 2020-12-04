<?php

class Koleksi extends CI_Controller
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
            'title' => 'Pengelola | Data Koleksi'
        ];
        $data['users'] = $this->db->get_where('tbl_users', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->Jenis_koleksi_model->getAll();
        $data['koleksi'] = $this->Koleksi_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pengelola/koleksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_koleksi()
    {
        $data = [
            'title' => 'Admin | Koleksi'
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/koleksi/update');
        $this->load->view('templates/footer');
    }
    public function doTambahBerita()
    {
        $this->form_validation->set_rules(
            'nama_koleksi',
            'nama koleksi',
            'required',
            array('required' => 'Nama Koleksi Harus di Isi')
        );

        $this->form_validation->set_rules(
            'panjang_koleksi',
            'Panjang Koleksi',
            'required',
            'required',
            array('required' => 'Panjang Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'lebar_koleksi',
            'Lebar Koleksi',
            'required',
            'required',
            array('required' => 'Lebar Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'berat_koleksi',
            'Berat Koleksi',
            'required',
            'required',
            array('required' => 'Berat Koleksi Harus di Isi')
        );
        $this->form_validation->set_rules(
            'tahun_koleksi',
            'Tahun Koleksi',
            'required',
            'required',
            array('required' => 'Tahun Koleksi Harus di Isi')
        );

        if ($this->form_validation->run() ===  FALSE) {
            $this->doTambahBerita();
        } else {
            //CONFIGURASI UPLOAD IMAGE
            $config['upload_path']         = './assets/upload/post';
            $config['allowed_types']     = 'jpg|png|svg|jpeg';
            $config['max_size']         = '12000';

            $this->load->library('upload', $config);

            //PROSES UPLOAD IMAGE
            if (!$this->upload->do_upload('gambar_koleksi')) {
                $data['errors']     = $this->upload->display_errors();
                print_r($data);
            } else {
                //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/upload/post/' . $upload_data['uploads']['file_name'];
                $config['new_image']         = './assets/upload/post/thumbs/';
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
                    'nama_koleksi'         => $this->input->post('nama_koleksi'),
                    //'slug_post'        => $slug,
                    'id_jenis_koleksi'    => $this->input->post('id_jenis_koleksi'),
                    'panjang_koleksi'        => $this->input->post('panjang_koleksi'),
                    'lebar_koleksi'        => $this->input->post('lebar_koleksi'),
                    'berat_koleksi'        => $this->input->post('berat_koleksi'),
                    'tahun_koleksi'        => $this->input->post('tahun_koleksi'),
                    'time_create_koleksi'    => date('Y-m-d H:i:s'),
                    'gambar_koleksi'        => $upload_data['uploads']['file_name'],
                    'id_users'        => $this->input->post('id_users')
                );

                $this->Koleksi_model->insert($data);

                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data user berhasil ditambahkan !</div>');

                redirect(site_url('koleksi/koleksi'));
            }
        }
    }

    public function UpdateGambarKoleksi()
    {
        $id = $this->input->post('id_koleksi');


        //CONFIGURASI UPLOAD IMAGE
        $config['upload_path']         = './assets/upload/post';
        $config['allowed_types']     = 'jpg|png|svg|jpeg';
        $config['max_size']         = '12000';

        $this->load->library('upload', $config);

        //PROSES UPLOAD IMAGE
        if (!$this->upload->do_upload('gambar_koleksi')) {
            $data['errors']     = $this->upload->display_errors();
            print_r($data);
        } else {
            //PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
            $upload_data                = array('uploads' => $this->upload->data());
            // Image Editor
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/post/' . $upload_data['uploads']['file_name'];
            $config['new_image']         = './assets/upload/post/thumbs/';
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
                'time_update_koleksi'    => date('Y-m-d H:i:s'),
                'gambar_koleksi'        => $upload_data['uploads']['file_name'],
                'id_users'        => $this->input->post('id_users')
            );

            $update = $this->Koleksi_model->update($id, $data);

            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');

                redirect('koleksi/Koleksi');
            }
        }
    }

    public function updateKoleksi()

    {
        $nama_koleksi = $this->input->post('nama_koleksi');
        $id_jenis_koleksi = $this->input->post('id_jenis_koleksi');
        $panjang_koleksi = $this->input->post('panjang_koleksi');
        $lebar_koleksi = $this->input->post('lebar_koleksi');
        $berat_koleksi = $this->input->post('berat_koleksi');
        $tahun_koleksi = $this->input->post('tahun_koleksi');
        $id_users = $this->input->post('id_users');

        $id = $this->input->post('id_koleksi');

        $data = [
            'nama_koleksi' => $nama_koleksi,
            'id_jenis_koleksi' => $id_jenis_koleksi,
            'panjang_koleksi' => $panjang_koleksi,
            'lebar_koleksi' => $lebar_koleksi,
            'berat_koleksi' => $berat_koleksi,
            'tahun_koleksi' => $tahun_koleksi,
            'id_users' => $id_users,
            'time_update_koleksi' => date('Y-m-d H:i:s')
        ];

        $update = $this->Koleksi_model->update1($id, $data);

        if ($update) {

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
            redirect('koleksi/koleksi');
        }
    }

    public function updatekoleksssi()
    {
        $this->form_validation->set_rules('nama_koleksi', 'nama koleksi', 'required');
        $this->form_validation->set_rules('id_jenis_koleksi', 'jenis koleksi', 'required');
        $this->form_validation->set_rules('panjang_koleksi', 'panjang koleksi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('Admin');
        } else {
            $nama_koleksi = $this->input->post('nama_koleksi');
            $id_jenis_koleksi = $this->input->post('id_jenis_koleksi');
            $id = $this->input->post('id_koleksi');
            $panjang_koleksi = $this->input->post('panjang_koleksi');
            $lebar_koleksi = $this->input->post('lebar_koleksi');
            $berat_koleksi = $this->input->post('berat_koleksi');
            $tahun_koleksi = $this->input->post('tahun_koleksi');
            $id_users = $this->input->post('id_users');
            //date_default_timezone_set("ASIA/JAKARTA");
            $data = [
                'nama_koleksi' => $nama_koleksi,
                'id_jenis_koleksi' => $id_jenis_koleksi,
                'panjang_koleksi' => $panjang_koleksi,
                'lebar_koleksi' => $lebar_koleksi,
                'berat_koleksi' => $berat_koleksi,
                'tahun_koleksi' => $tahun_koleksi,
                //'time_update_koleksi' => date('Y-m-d H:i:s'),
                'id_users' => $id_users
            ];
            $update = $this->Koleksi_model->update($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di update !</div>');
                redirect('Admin/koleksi');
            }
        }
    }

    public function deletekoleksi($id)
    {
        $data['id_koleksi'] = $this->Koleksi_model->delete($id);
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert">Sukses, Data berhasil di Hapus!</div>');
        redirect('koleksi/koleksi');
    }

    //end Koleksi
}
