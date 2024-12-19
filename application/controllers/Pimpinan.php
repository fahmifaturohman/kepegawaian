<?php

use phpDocumentor\Reflection\Types\Parent_;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{
    private $page;
    
    public function __construct()
    {
        parent::__construct();
        $this->page = "pimpinan";
        $this->load->model("PimpinanModel", "model");
        $this->load->model("PegawaiModel", "pegawai");
        $this->load->model("PpnpnModel", "ppnpn");
        isLogin();
    }

    public function index() 
    {
        $this->authorization->user_admin();
        $data = [
            'page' => $this->page,
            'title' => "Pimpinan",
            'data' => $this->model->getAll(),
            'js' => ['pimpinan'],
        ];
        templateView("pimpinan/pimpinan", $data);
    }

    public function add() {
        $this->authorization->user_admin();

        if ($this->input->server('REQUEST_METHOD') == "POST") { 
            $validation = $this->form_validation;
            $validation->set_rules($this->model->rules());
           
            if ($validation->run()) {
                $post = $this->input->post();
                $parent = ($post['parent'] == 0) ? NULL:$post['parent'];
                $namaPegawai = $post['id_pegawai']; 
                $rowPegawai = $this->model->getByNamePegawai($namaPegawai);
                
                if($rowPegawai) {
                    $id_pegawai = $rowPegawai->id;               
                    $row = $this->model->save($id_pegawai, $parent);
                    
                    if($row) {
                        $res['success'] = true;
                        $res['msg'] = "berhasil menambahkan data";
                    }
                    else {
                        $res['success'] = false;
                        $res['msg'] = "gagal menambahkan data";
                    }
                }
                else {
                    $res['success'] = false;
                    $res['msg'] = "Pegawai belum terdaftar, silahkan tambah pegawai terlebih dahulu";
                }
                echo json_encode($res); 
            }
            
        } 
        else {
            $data = [
                'page' => $this->page,
                'title' => "Pimpinan",
                'parent' => $this->model->getParent(),
                'js' => ['pimpinan'],
            ];
            templateView("pimpinan/add", $data);
        }
    }

    public function edit($id = null) {
        $this->authorization->user_admin();
        if($this->input->server('REQUEST_METHOD') == "POST") {
            $validation = $this->form_validation;
            $validation->set_rules($this->model->rules());
            
            if ($validation->run()) {
                $post = $this->input->post();
                $parent = ($post['parent'] == 0) ? NULL:$post['parent'];
                $namaPegawai = $post['id_pegawai']; 
                $rowPegawai = $this->model->getByNamePegawai($namaPegawai);
                
                
                if($rowPegawai) {
                    $param = [
                        'bagian' => $post['bagian'],
                        'parent' => $post['parent'],
                        'id_pegawai' => $rowPegawai->id, 
                        'note' => $post['note'],
                    ];
                    $id_struktur = $post['id'];
                    $row = $this->model->updateData($id_struktur, $param);    
                    //$row = $this->model->update($id_pegawai, $parent);
                    if($row) {
                        $res['success'] = true;
                        $res['msg'] = "berhasil mengubah data";
                    }
                    else {
                        $res['success'] = false;
                        $res['msg'] = "gagal mengubah data";
                    }
                }
                else {
                    $res['success'] = false;
                    $res['msg'] = "Pegawai belum terdaftar, silahkan tambah pegawai terlebih dahulu";
                }
                echo json_encode($res); 
            }
        }
        else {
            $res = $this->model->getById($id);
            $data = [
                'page' => $this->page,
                'title' => "Pimpinan",
                'js' => ['pimpinan'],
                'data' => $res,
                'parent' => $this->model->getParent(),
            ];
            //echo json_encode($data);
            templateView("pimpinan/edit", $data);
        }
    }

    public function delete() {
        $this->authorization->user_admin();

        if($this->input->server('REQUEST_METHOD') == "POST") {
            $row = $this->model->delete();
            if($row > 0) {
                $res['success'] = true;
                $res['msg'] = "berhasil menghapus data";
            }
            else {
                $res['success'] = false;
                $res['msg'] = "gagal menghapus data";
            }
            echo json_encode($res);
        }
        else {
            redirect('errorpage');  
        }
    }

    public function permanentdelete($id = null) {
        $this->authorization->user_admin();

        $row = $this->model->hardDelete($id);
        if($row > 0) {
            $res['success'] = true;
            $res['msg'] = "hapus permanen berhasil";
        }
        else {
            $res['success'] = false;
            $res['msg'] = "hapus permanen gagal";
        }
        echo json_encode($res);
    }





    /* CUSTOM METHOD */
    public function caripegawai($name = null) {
        $name = urldecode($name);
        $row = $this->model->getLikeName($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari pegawai";
            $res['data'] = $row;
            $res['type'] = "pegawai";
        }
        else {
            $row = $this->ppnpn->getLikeNameAll($name);
            if($row) {
                $res['success'] = true;
                $res['message'] = "cari ppnpn";
                $res['data'] = $row;
                $res['type'] = "ppnpn";
            } else {
                $res['success'] = false;
                $res['message'] = "cari pegawai dan pppn";
                $res['data'] = [];
                $res['type'] = "ppnpn";
            }
        }
        echo json_encode($res);
    }
    public function caripegawairow() {
        $post = $this->input->post();
        $name = $post['nama'];
        $row = $this->model->getName($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari pegawai name";
            $res['data'] = $row;
            $res['type'] = "pegawai";
        }
        else {
            $row = $this->ppnpn->getName($name);
            $res['success'] = false;
            $res['message'] = "cari pegawai PPNPN";
            $res['data'] = $row;
            $res['type'] = "ppnpn";
        }
        echo json_encode($res);    
    }

    #cari pegawai seluruh PA
    public function caripegawaiAll($name = null) {
        $name = urldecode($name);
        $row = $this->model->getLikeNameAll($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari pegawai all";
            $res['data'] = $row;
            $res['type'] = "pegawai";
        }
        else {
            $row = $this->ppnpn->getLikeNameAll($name);
            if($row) {
                $res['success'] = true;
                $res['message'] = "cari ppnpn all";
                $res['data'] = $row;
                $res['type'] = "ppnpn";
            } else {
                $res['success'] = false;
                $res['message'] = "cari pegawai dan pppn all";
                $res['data'] = [];
                $res['type'] = "ppnpn";
            }
        }
        echo json_encode($res);
    }
    #after clik typehead
    public function caripegawairowAll() {
        $post = $this->input->post();
        $name = $post['nama'];
        $row = $this->model->getNameAll($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari pegawai";
            $res['data'] = $row;
            $res['type'] = "pegawai";
        }
        else {
            $row = $this->ppnpn->getNameAll($name);
            if($row) {
                $res['success'] = true;
                $res['message'] = "cari ppnpn";
                $res['data'] = $row;
                $res['type'] = "ppnpn";
            }
            else {
                $res['success'] = false;
                $res['message'] = "cari pegawai & ppnpn";
                $res['data'] = [];
                $res['type'] = "ppnpn";
            }
        }
        echo json_encode($res);    
    }

    

    public function caripegawaidanjabatan($name = null) {
        $name = urldecode($name);
        $row = $this->model->getLikeNameJabatan($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari pegawai dan jabatan";
            $res['data'] = $row;
        }
        else {
            $res['success'] = false;
            $res['message'] = "cari pegawai dan jabatan";
            $res['data'] = [];
        }
        echo json_encode($res);
    }

    public function cariJabatan($name = null) {
        $name = urldecode($name);
        $row = $this->model->getJabatan($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari jabatan";
            $res['data'] = $row;
        }
        else {
            $res['success'] = false;
            $res['message'] = "cari jabatan";
            $res['data'] = [];
        }
        echo json_encode($res);
    }

    public function cariJabatanRow() {
        $name = $this->input->post()['bagian'];
        $row = $this->model->getJabatanRow($name);
        if($row) {
            $res['success'] = true;
            $res['message'] = "cari jabatan row";
            $res['data'] = $row;
        }
        else {
            $res['success'] = false;
            $res['message'] = "cari jabatan row";
            $res['data'] = [];
        }
        echo json_encode($res);
    }

    #validasi bagian
    public function cekbagian($name = null) {
        $name = urldecode($name);
        $row = $this->model->getByName($name);
        if($row) {
            $res['success'] = true;
            $res['msg'] = "nama bagian sudah ada";
            $res['data'] = $row;
        }
        else {
            $res['success'] = false;
            $res['msg'] = "nama bagian belum ada";
            $res['data'] = [];
        }
        $res['name'] = $name;
        echo json_encode($res);
    }
  
    public function addnote() {
        $this->authorization->user_admin();

        if($this->input->server('REQUEST_METHOD') == "POST") {
            $row = $this->model->addNote();
            if($row > 0) {
                $res['success'] = true;
                $res['msg'] = "catatan berhasil ditambahkan";
            }
            else {
                $res['success'] = false;
                $res['msg'] = "catatan gagal ditambahkan";
            }
            echo json_encode($res);
        }
        else {
            redirect('errorpage');
        }
    }

    public function addpegawai() {
        $this->authorization->user_admin();

        if($this->input->server('REQUEST_METHOD') == "POST") {            
            $post = $this->input->post();
            $namaPegawai = $post['id_pegawai']; 
            $rowPegawai = $this->model->getByNamePegawai($namaPegawai);
            
            if($rowPegawai) {
                $id_pegawai = $rowPegawai->id;               
                $row = $this->model->addPegawai($id_pegawai);
                
                if($row) {
                    $res['success'] = true;
                    $res['msg'] = "berhasil mengubah data";
                }
                else {
                    $res['success'] = false;
                    $res['msg'] = "gagal mengubah data";
                }
            }
            else {
                $res['success'] = false;
                $res['msg'] = "Pegawai belum terdaftar, silahkan tambah pegawai terlebih dahulu";
            }
            echo json_encode($res);    
        }
        else {
            redirect('errorpage');
        }
    }






    
}
