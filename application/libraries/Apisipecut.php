<?php 
class Apisipecut
{
    private $key;
    private $get_pegawai;
    public function __construct()
    {
        $this->key = 'baseben-api-key: cf31b89f-638a-4c9d-82b8-0fb381557510';
        $this->get_pegawai = 'http://s2.pta-bandarlampung.net/sipperading/public/ws/main/get-pegawai';
    }
    
    public function apiPegawai($satker = "") {
        $url = $this->get_pegawai;
        $data = array('nama_satker' => $satker);

        $headers = array(
            'Content-Type: application/json',
            $this->key
        );
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return $response;
    }

}