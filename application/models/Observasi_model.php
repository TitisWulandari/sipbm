<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Observasi_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_observasi');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_observasi.id_koleksi');
        $this->db->join('tbl_ruang_koleksi', 'tbl_ruang_koleksi.id_ruang_koleksi = tbl_observasi.id_ruang_koleksi');
        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_observasi.id_users');

        $result = $this->db->get();

        return $result->result();
    }

    public function getbytgl($tgl_awal,$tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('tbl_observasi');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_observasi.id_koleksi');
        $this->db->join('tbl_ruang_koleksi', 'tbl_ruang_koleksi.id_ruang_koleksi = tbl_observasi.id_ruang_koleksi');
        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_observasi.id_users');
        $this->db->where('time_observasi >=',$tgl_awal);
        $this->db->where('time_observasi <=',$tgl_akhir);

        $result = $this->db->get();

        return $result->result();
    }


    public function laporanObservasi()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        // $this->db->select('*');
        // $this->db->from('tbl_observasi');
        // $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_observasi.id_koleksi');
        // $this->db->join('tbl_ruang_koleksi', 'tbl_ruang_koleksi.id_ruang_koleksi = tbl_observasi.id_ruang_koleksi');
        // $this->db->join('tbl_users', 'tbl_users.id_users = tbl_observasi.id_users');
        // $this->db->where('tbl_observasi.time_observasi BETWEEN' . $sampai . 'AND' . $sampai);

        $query = "SELECT `tbl_observasi`.*, `tbl_koleksi`.`nama_koleksi`, `tbl_ruang_koleksi`.`nama_ruang_koleksi`, `tbl_users`.`name`
        FROM `tbl_observasi`
        INNER JOIN `tbl_koleksi` ON `tbl_observasi`.`id_koleksi` = `tbl_koleksi`.`id_koleksi`
        INNER JOIN `tbl_ruang_koleksi` ON `tbl_observasi`.`id_ruang_koleksi` = `tbl_ruang_koleksi`.`id_ruang_koleksi`
        INNER JOIN `tbl_users` ON `tbl_observasi`.`id_users` = `tbl_users`.`id_users`
        WHERE `time_observasi` BETWEEN $dari AND $sampai";
        
        return $this->db->query($query)->result_array();
    }


    public function listberita()
    {
        $this->db->select('*');
        $this->db->from('tbl_post');
        $this->db->order_by('id_post', 'DESC');
        $this->db->limit(1);


        $result = $this->db->get();

        return $result->result();
    }

    public function getBeritaById($id_post)
    {
        $this->db->select('tbl_post.*, tbl_pegawai.nama_pegawai');
        $this->db->from('tbl_post');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_post.id_pegawai');
        $this->db->where('id_post', $id_post);

        $result = $this->db->get();

        return $result->row();
    }

    public function getBeritaBySlug($slug_post)
    {
        $this->db->select('tbl_post.*, tbl_pegawai.nama_pegawai');
        $this->db->from('tbl_post');
        $this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_post.id_pegawai');
        $this->db->where('slug_post', $$slug_post);

        $result = $this->db->get();

        return $result->row();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_observasi', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
    public function tambah($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function update1($id, $data)
    {
        $this->db->where('id_koleksi', $id);
        $this->db->update('tbl_koleksi', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function update($id, $data)
    {
        $this->db->where('id_observasi', $id);
        $this->db->update('tbl_observasi', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function delete($id)
    {
        $this->db->where('id_observasi', $id);
        $this->db->delete('tbl_observasi');

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function tampilberita($id_post)
    {
        return $this->db->get_where('tbl_post', array('id_post' => $id_post));
    }
}
