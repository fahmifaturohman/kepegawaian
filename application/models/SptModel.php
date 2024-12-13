<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SptModel extends CI_Model
{
    public function rules() {
        //validasi server
    }

    public function view_spt_kegiatan() {
        $this->db->from('view_spt');
        $this->db->where(['spt_tipe' => 'spt kegiatan', 'deleted' => 0, 'YEAR(tgl)' => CURRENT_YEAR]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->result();
    }

    public function view_spt_plh() {
        $this->db->from('view_spt');
        $this->db->where(['spt_tipe' => 'spt plh', 'deleted' => 0, 'YEAR(tgl)' => CURRENT_YEAR]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->result();
    }

    public function view_spt_diklat() {
        $this->db->from('view_spt');
        $this->db->where(['spt_tipe' => 'spt diklat', 'deleted' => 0, 'YEAR(tgl)' => CURRENT_YEAR]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->result();
    }

     
    public function get_spt() {
        $this->db->from('view_spt');
        $this->db->where(['deleted' => 0, 'YEAR(tgl)' => CURRENT_YEAR]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->result();
    }

    public function get_spt_id($id = '') {
        return $this->db->get_where('view_ttd', ['id_spt' => $id, 'deleted' => 0])->row();
    }

    public function get_spt_detail($id = '') {
        $this->db->from('spt_detail');
        $this->db->select('id_spt_detail, id_spt, nama, nip, pangkat, jabatan');
        $this->db->where(['id_spt' => $id, 'deleted' => 0]);
        $this->db->order_by('id_spt_detail', 'DESC');
        return $this->db->get()->result();
    }

    public function getSptKegiatan($id = "") {
        $this->db->from('view_spt_kegiatan');
        $this->db->where(['id_spt' => $id, 'deleted' => 0]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->row();
    }

    public function getSptPlh($id = "") {
        $this->db->from('view_spt_plh');
        $this->db->where(['id_spt' => $id, 'deleted' => 0]);
        return $this->db->get()->row();
    }

    public function getSptDiklat($id = "") {
        $this->db->from('view_spt_diklat');
        $this->db->where(['id_spt' => $id, 'deleted' => 0]);
        $this->db->order_by('id_spt', 'DESC');
        return $this->db->get()->row();
    }
    public function getSptDiklatDetail($id = '') {
        return $this->db->get_where('spt_diklat_detail', ['id_spt_diklat' => $id, 'deleted' => 0])->result();
    }

    public function getSppdRow($id) {
        return $this->db->get_where('spt_sppd', ['id_spt' => $id])->row();
    }

    public function get_spt_dasar_menimbang($id) {
        $this->db->from('spt_dasar_menimbang');
        $this->db->where(['id_spt' => $id]);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_spt_dasar_hukum($id) {
        $this->db->from('spt_dasar_hukum');
        $this->db->where(['id_spt' => $id]);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }


    public function insertSpt($param) {
        $this->db->insert('spt', $param);
        return $this->db->insert_id();
    }

    public function insertSptDetail($param) {
        $this->db->insert('spt_detail',$param);
        return true;
    }

    public function insertSptKegiatan($param) {
        $this->db->insert('spt_kegiatan',$param);
        return true;
    }

    public function insertSptPlh($param) {
        $this->db->insert('spt_plh', $param);
        return true;
    }
    
    public function insertSptDiklat($param) {
        $this->db->insert('spt_diklat', $param);
        return $this->db->insert_id();
    }
    public function insertSptDiklatDetail($param) {
        $this->db->insert('spt_diklat_detail', $param);
        return true;
    }

    public function insertSppd($param) {
        $this->db->insert('spt_sppd', $param);
        return true;
    }

    public function insertSptMenimbang($param) {
        $this->db->insert('spt_dasar_menimbang', $param);
        return true;
    }

    public function insertSptHukum($param) {
        $this->db->insert('spt_dasar_hukum', $param);
        return true;
    }


    public function updateSpt($id, $param) {
        $this->db->where('id_spt', $id);
        $this->db->update('spt', $param);
        return $this->db->affected_rows();
    }
    public function updateSptDetail($id, $param) {
        $this->db->where('id_spt_detail', $id);
        $this->db->update('spt_detail', $param);
        return $this->db->affected_rows();
    }
    public function updateSptKegiatan($id, $param) {
        $this->db->where('id_spt_kegiatan', $id);
        $this->db->update('spt_kegiatan', $param);
        return $this->db->affected_rows();
    }
    public function updateSptDiklat($id, $param) {
        $this->db->where('id_spt_diklat', $id);
        $this->db->update('spt_diklat', $param);
        return $this->db->affected_rows();
    }
    public function updateSptDiklatDetail($id, $param) {
        $this->db->where('id_spt_diklat_detail', $id);
        $this->db->update('spt_diklat_detail', $param);
        return $this->db->affected_rows();
    }
    public function updateSptPlh($id, $param) {
        $this->db->where('id_spt_plh', $id);
        $this->db->update('spt_plh', $param);
        return $this->db->affected_rows();
    }

    public function updateSppd($id, $param) {
        $this->db->where('id_spt', $id);
        $this->db->update('spt_sppd', $param);
        return $this->db->affected_rows();
    }
    
    public function updateDasarMenimbang($id, $param) {
        $this->db->where('id', $id);
        $this->db->update('spt_dasar_menimbang', $param);
        return $this->db->affected_rows();
    }
    public function updateDasarHukum($id, $param) {
        $this->db->where('id', $id);
        $this->db->update('spt_dasar_hukum', $param);
        return $this->db->affected_rows();
    }

   

    public function delete_spt() {
        $post = $this->input->post();
        $this->db->set('deleted', 1);
        $this->db->where('id_spt', $post['id']);
        $this->db->update('spt');
        return $this->db->affected_rows();
    }

    public function delete_sppd($id) {
        $this->db->set('deleted', 1);
        $this->db->where('id_spt', $id);
        $this->db->update('spt_sppd');
        return $this->db->affected_rows();
    }

    public function deletePermanentSptDetail($id) {
        $this->db->where('id_spt_detail', $id);
        $this->db->delete('spt_detail');
        return $this->db->affected_rows();
    }
    public function deletePermanentSptDiklatDetail($id) {
        $this->db->where('id_spt_diklat_detail', $id);
        $this->db->delete('spt_diklat_detail');
        return $this->db->affected_rows();
    }

    public function deletePermanentSppd($id) {
        $this->db->where('id_spt', $id);
        $this->db->delete('spt_sppd');
        return $this->db->affected_rows();
    }

    public function deletePermanentMenimbang($id) {
        $this->db->where('id', $id);
        $this->db->delete('spt_dasar_menimbang');
        return $this->db->affected_rows();
    }

    public function deletePermanentHukum($id) {
        $this->db->where('id', $id);
        $this->db->delete('spt_dasar_hukum');
        return $this->db->affected_rows();
    }
 


    //custom
    public function get_ppk() {
        return $this->db->get_where('`view_struktur', ['bagian' => 'ppk', 'deleted' => 0])->row();
    }

    public function get_ketua() {
        return $this->db->get_where('`view_struktur', ['bagian' => 'ketua', 'deleted' => 0])->row();
    }



   

    

}
