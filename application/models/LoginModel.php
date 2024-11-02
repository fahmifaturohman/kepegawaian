<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    private $db2;
    private $_table = "`tb_user`";
    private $_table2 = "`tbl_user`";
    public $username;
    public $password;


    public function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('db2', TRUE);
    }

    public function rules() {
        return [
            [
                'field' =>  'username',
                'label' => 'username',
                'rules' => 'required'
            ],
            [
                'field' =>  'password',
                'label' => 'password',
                'rules' => 'required'
            ],
            [
                'field' =>  'thang',
                'label' => 'thang',
                'rules' => 'required'
            ],
        ];
    }

    
    public function auth_esurat($data) {
        $this->db->from($this->_table);
        $this->db->select('`id`, `username`, `level`, `gambar`, gambar, nama, kdeselon, status');
        $this->db->where(['username'  => $data['username'], 'password' => md5($data['password']), 'deleted' => 0]);
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function auth_sistemcuti($data) {
        $password = hash('sha256', hash('md5', $data['password']));
        $this->db2->from($this->_table2.' a');
        $this->db2->select('a.`id`, a.username, a.`jabatan` level, a.`gambar`,  a.`nama`, a.`kdeselon`, a.`status`');
        $this->db2->join('tbl_user_role b', 'a.role_id = b.role_id','left');
        $this->db2->where(['a.username' => $data['username'], 'a.password' => $password, 'a.unit_kerja' => NAMA_INSTANSI]);
        $this->db2->limit(1);
        $query = $this->db2->get();
        return $query->row();
    }


    
}
