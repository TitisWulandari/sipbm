<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeriksaan');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_pemeriksaan.id_koleksi', 'left');

        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_pemeriksaan.id_users', 'left');
        $this->db->where('tbl_pemeriksaan.id_users', $this->session->userdata('id_users'));
        $this->db->order_by('id_pemeriksaan', 'DESC');

        $result = $this->db->get();

        return $result->result();
    }
    public function getAllAdmin()
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeriksaan');
        $this->db->join('tbl_koleksi', 'tbl_koleksi.id_koleksi = tbl_pemeriksaan.id_koleksi');

        $this->db->join('tbl_users', 'tbl_users.id_users = tbl_pemeriksaan.id_users');
        $this->db->order_by('id_pemeriksaan', 'DESC');

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
        $this->db->insert('tbl_pemeriksaan', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
    public function update1($id, $data)
    {
        $this->db->where('id_pemeriksaan', $id);
        $this->db->update('tbl_pemeriksaan', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function update($id, $data)
    {
        $this->db->where('id_pemeriksaan', $id);
        $this->db->update('tbl_pemeriksaan', $data);

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function delete($id)
    {
        $this->db->where('id_koleksi', $id);
        $this->db->delete('tbl_koleksi');

        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function tampilberita($id_post)
    {
        return $this->db->get_where('tbl_post', array('id_post' => $id_post));
    }
    public function getPById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pemeriksaan');
        $this->db->where('id_pemeriksaan', $id);

        $result = $this->db->get();

        return $result->row_array();
    }

    public function updateData($id, $data)
    {
        $this->db->where('id_pemeriksaan', $id);
        $this->db->update('tbl_pemeriksaan', $data);
    }
}
