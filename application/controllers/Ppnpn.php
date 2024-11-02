<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ppnpn extends CI_Controller
{
    private $page;
    
    public function __construct()
    {
        parent::__construct();
        $this->page = "pppnpn";
        $this->load->model("PpnpnModel", "model");
        $this->load->model("DataTable", "dataTable");
        $this->load->library('form_validation');
        isLogin();
    }

    public function index() 
    {   
        $data = [
            'page' => $this->page,
            'title' => "list ppnpn",
            'data' => [],
            'js' => [],
        ];
        templateView("ppnpn/ppnpn", $data);
    }

    public function table() {
        $tables = "m_ppnpn";
        $search = array('nama','tempat', 'tgl_lahir', 'jabatan', 'unit_kerja');
        $where = ['unit_kerja' => NAMA_INSTANSI, 'status' => 1];
        $isWhere = null;
        header('Content-Type: application/json');
        echo $this->dataTable->get_tables_where($tables, $search, $where, $isWhere);
    }
    
}
