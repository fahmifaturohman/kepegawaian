<?php defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model
{

    public function countSpt($tipe ="") {
        $this->db->from('`spt`');
        if(isThang() != "") $this->db->where(['spt_tipe' => $tipe, 'YEAR(tgl)' => isThang(), 'deleted' => 0]);
        else $this->db->where(['spt_tipe' => $tipe,'deleted' => 0]);
        return $this->db->get()->num_rows();
    }

    public function countSptAll() {
        $this->db->from('`spt`');
        if(isThang() != "") $this->db->where(['YEAR(tgl)' => isThang(), 'deleted' => 0]);
        else $this->db->where(['deleted' => 0]);
        return $this->db->get()->num_rows();
    }

    public function getIzinKeluarKantor() {
        $this->db->from('view_izin_keluar_kantor');
        if(isThang() != "") $this->db->where('YEAR(created)', isThang());
        $this->db->where('deleted', 0);
        $this->db->order_by('id_izin', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function getSpt() {
        $this->db->from('view_spt');
        if(isThang() != "") $this->db->where('YEAR(tgl)', isThang());
        $this->db->where('deleted', 0);
        $this->db->order_by('id_spt', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

  





   

    

}
