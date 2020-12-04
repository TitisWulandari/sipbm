<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_koleksi_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_ruang_koleksi');

        $result = $this->db->get();

        return $result->result();
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
        $this->db->insert('tbl_koleksi', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function editBerita($id_post, $data)
    {
        $this->db->where('id_post', $id_post);
        $this->db->update('tbl_post', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function deleteBerita($id_post)
    {
        $this->db->where('id_post', $id_post);
        $this->db->delete('tbl_post');

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
