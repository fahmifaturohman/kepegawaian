<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiSigerModel extends CI_Model
{
    private $db3;
    private $_table = "`users`";
    public $id_user;
    public $nama;
    public $username;
    public $no_telepon;
    public $status;

    public function __construct()
    {
        parent::__construct();
        $this->db3 = $this->load->database('db3', TRUE);
        isLogin();
    }

    public function rules() {
        return [
            [
                'field' =>  'nama',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' =>  'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' =>  'no_telepon',
                'label' => 'no_telepon',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll($satker) {
        $this->db3->from($this->_table);
        $this->db3->select('*');
        if($satker != "") $this->db3->where('nama_satker', $satker);
        $this->db3->where_not_in('jabatan', 'PPNPN');
        $query = $this->db3->get(); 
        return $query->result();
    }

    public function getById($id) {
       return $this->db3->get_where($this->_table, ['id' => $id, 'status' => 0])->row();
    }

    #search pegawai
    public function getLikeName($name) {
        $this->db3->from($this->_table);
        $this->db3->like('nama', $name);
        $this->db3->where(['status' => 1, 'unit_kerja' => NAMA_INSTANSI]);
        $this->db3->limit(3);
        $query = $this->db3->get();
        return $query->result(); 
    }
    public function getName($name) {
        $this->db3->from($this->_table);
        $this->db3->where(['nama'=>$name, 'status' => 1, 'unit_kerja' => NAMA_INSTANSI]);
        $this->db3->limit(3);
        $query = $this->db3->get();
        return $query->row(); 
    }
    
    #cari semua pegawai sewilayah pta
    public function getLikeNameAll($name) {
        $this->db3->from($this->_table);
        $this->db3->like('nama', $name);
        $this->db3->where(['status' => 1]);
        $this->db3->limit(5);
        $query = $this->db3->get();
        return $query->result(); 
    }
    public function getNameAll($name) {
        $this->db3->from($this->_table);
        $this->db3->where(['nama'=>$name, 'status' => 1]);
        $this->db3->limit(3);
        $query = $this->db3->get();
        return $query->row(); 
    }
    
    public function getLikeNameJabatan($name) {
        $sql = "SELECT a.* FROM  sistemcuti.`tbl_user` a WHERE (a.nama LIKE  '%".$name."%' OR a.jabatan LIKE '%".$name."%') AND ( a.status = 1 AND a.unit_kerja =  '".NAMA_INSTANSI."') LIMIT 5";
        $query = $this->db->query($sql); 
        return $query->result();
    }

    #validasi pegawai 
    public function getByName($name) {
        return $this->db3->get_where($this->_table, ['nama' => $name, 'status' => 1])->row();
    }

    public function updateStatus($post) {
        $this->db3->set('status', $post['status']);
        $this->db3->where('id', $post['id']);
        $this->db3->update($this->_table);
        return $this->db3->affected_rows();
    }




    #PPNPN
    public function getAllPpnpn() {
        $this->db3->from($this->_table);
        $this->db3->select('id id_user, nama, username, tempat_lahir, tgl_lahir, tgl_jadi_pegawai, pangkat, golongan, jabatan, no_telepon, unit_kerja, role_id, status');
        $this->db3->where(['status' => 1, 'unit_kerja' => NAMA_INSTANSI, 'jabatan' => 'PPNPN']);
        $query = $this->db3->get(); 
        return $query->result();
    }

    public function getByIdPpnpn($id) {
       return $this->db3->get_where($this->_table, ['id' => $id, 'status' => 0, 'jabatan' => 'PPNPN'])->row();
    }



}
