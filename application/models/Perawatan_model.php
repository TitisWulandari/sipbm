<?php

class Perawatan_model extends CI_Model
{
    public function getAllPerawatan()
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`";

        return $this->db->query($query)->result_array();
    }
    public function getAllTugasPerawatan()
    {
        $this->db->select('*');
        $this->db->from('tbl_perawatan');
        $this->db->where('tbl_perawatan.id_users', $this->session->userdata('id_users'));
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_perawatan.id_koleksi');
        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_perawatan.id_users');


        $result = $this->db->get();

        return $result->result();
    }

    public function getAllBelumPerawatan()
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`
              WHERE `tbl_perawatan`.`validasi_perawatan` = 'belum'
              OR `tbl_perawatan`.`validasi_perawatan` = 'waiting'";


        return $this->db->query($query)->result_array();
    }

    public function insertDataPerawatan()
    {
        $data = [
            'id_users' => $this->input->post('id_users'),
            'id_koleksi' => $this->input->post('id_koleksi'),
            'time_perawatan' => $this->input->post('time_perawatan'),
            'kegiatan_perawatan' => $this->input->post('kegiatan_perawatan'),
            'penanggung_perawatan' => $this->input->post('penanggung_perawatan'),
            'validasi_perawatan' => 'belum',
            'time_create_perawatan' => date("Y-m-d H:i:s"),
            'time_update_perawatan' => date("Y-m-d H:i:s"),
        ];

        $this->db->insert('tbl_perawatan', $data);
    }

    public function getPerawatanById($id)
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`
              WHERE `tbl_perawatan`.`id_perawatan` = $id
              ";

        return $this->db->query($query)->row_array();
    }

    public function updateDataPerawatan($id)
    {
        $data = [
            'id_users' => $this->input->post('id_users'),
            'id_koleksi' => $this->input->post('id_koleksi'),
            'time_perawatan' => $this->input->post('time_perawatan'),
            'kegiatan_perawatan' => $this->input->post('kegiatan_perawatan'),
            'penanggung_perawatan' => $this->input->post('penanggung_perawatan'),
            
            'time_update_perawatan' => date("Y-m-d h:i:sa"),
        ];

        $this->db->where('id_perawatan', $this->input->post('id_perawatan'));
        $this->db->update('tbl_perawatan', $data);
    }

    public function getAllHistory()
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`
              WHERE `tbl_perawatan`.`validasi_perawatan` = 'sudah'
              ";

        return $this->db->query($query)->result_array();
    }

    public function getPerawatanByDate($keyword1, $keyword2)
    {
        $query = "SELECT `tbl_perawatan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_users`.`name`
                    FROM `tbl_perawatan`
              INNER JOIN `tbl_koleksi` ON `tbl_perawatan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
              INNER JOIN `tbl_users` ON `tbl_perawatan`.`id_users` = `tbl_users`.`id_users`";

        $this->db->where('time_perawatan >=', $keyword1);
        $this->db->where('time_perawatan <=', $keyword2);

        return $this->db->query($query)->result_array();
    }

    public function getbytgl($keyword1, $keyword2)
    {
        $this->db->select('*');
        $this->db->from('tbl_perawatan');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_perawatan.id_koleksi');
        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_perawatan.id_users');
        $this->db->where('time_perawatan >=', $keyword1);
        $this->db->where('time_perawatan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getPById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_perawatan');
        $this->db->where('id_perawatan', $id);

        $result = $this->db->get();

        return $result->row();
    }

    public function updateData($id, $data)
    {
        $this->db->where('id_perawatan', $id);
        $this->db->update('tbl_perawatan', $data);
    }
}
