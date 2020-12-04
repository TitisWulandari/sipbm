<?php

class Perbaikan_model extends CI_Model
{
    public function getAllImprovement()
    {
        $query = "SELECT `tbl_permintaan_perbaikan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_ruang_koleksi`.`nama_ruang_koleksi`
        FROM `tbl_permintaan_perbaikan`
        INNER JOIN `tbl_koleksi` ON `tbl_permintaan_perbaikan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
        INNER JOIN `tbl_ruang_koleksi` ON `tbl_permintaan_perbaikan`.`id_ruang_koleksi` = `tbl_ruang_koleksi`.`id_ruang_koleksi`";

        return $this->db->query($query)->result_array();
    }

    public function getImprovementById($id)
    {
        return $this->db->get_where('tbl_permintaan_perbaikan', ['id_permintaan_perbaikan' => $id])->row_array();
    }

    public function getPerbaikanByDate($keyword1, $keyword2)
    {
        $query = "SELECT `tbl_permintaan_perbaikan`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_ruang_koleksi`.`nama_ruang_koleksi`
        FROM `tbl_permintaan_perbaikan`
        INNER JOIN `tbl_koleksi` ON `tbl_permintaan_perbaikan`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
        INNER JOIN `tbl_ruang_koleksi` ON `tbl_permintaan_perbaikan`.`id_ruang_koleksi` = `tbl_ruang_koleksi`.`id_ruang_koleksi`";

        $this->db->where('time_permintaan_perbaikan >=', $keyword1);
        $this->db->where('time_permintaan_perbaikan <=', $keyword2);

        return $this->db->query($query)->result_array();
    }
    public function getbytgl($keyword1, $keyword2)
    {
        $this->db->select('*');
        $this->db->from('tbl_permintaan_perbaikan');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_permintaan_perbaikan.id_koleksi');
        $this->db->join('tbl_ruang_koleksi', 'tbl_ruang_koleksi.id_ruang_koleksi = tbl_permintaan_perbaikan.id_ruang_koleksi');
        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_permintaan_perbaikan.id_users');
        $this->db->where('time_permintaan_perbaikan >=', $keyword1);
        $this->db->where('time_permintaan_perbaikan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getPById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_permintaan_perbaikan');
        $this->db->where('id_permintaan_perbaikan', $id);

        $result = $this->db->get();

        return $result->row();
    }
    public function updateData($id, $data)
    {
        $this->db->where('id_permintaan_perbaikan', $id);
        $this->db->update('tbl_permintaan_perbaikan', $data);
    }
}
