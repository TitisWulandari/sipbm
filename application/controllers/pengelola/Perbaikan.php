<?php

class Perbaikan extends CI_Controller
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
            'title' => 'Pengelola | Data Perbaikan',
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
            $this->load->view('pengelola/perbaikan/index', $data);
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
                'time_create_permintaan_perbaikan' => date("Y-m-d h:i:sa"),
                'time_update_permintaan_perbaikan' => date("Y-m-d h:i:sa")
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
                'time_update_permintaan_perbaikan' => date("Y-m-d h:i:sa")
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

    public function updateStatusW($id)
    {
        $client = $this->Perbaikan_model->getPById($id);
        $status_client = "";

        if ($client->status_permintaan_perbaikan == "closed") {
            $status_client = "waiting";
        } else {
            $status_client = "waiting";
        }

        $data = array(
            'id_permintaan_perbaikan'         => $id,
            'status_permintaan_perbaikan'     => $status_client
        );

        $this->Perbaikan_model->updateData($id, $data);

        redirect(site_url('pusat/perbaikan'));
    }
    public function updateStatusC($id)
    {
        $client = $this->Perbaikan_model->getPById($id);
        $status_client = "";

        if ($client->status_permintaan_perbaikan == "waiting") {
            $status_client = "finish";
        } else {
            $status_client = "finish";
        }

        $data = array(
            'id_permintaan_perbaikan'         => $id,
            'status_permintaan_perbaikan'     => $status_client
        );

        $this->Perbaikan_model->updateData($id, $data);

        redirect(site_url('pusat/perbaikan'));
    }

    // perbaikan
}
