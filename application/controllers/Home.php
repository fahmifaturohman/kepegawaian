<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	private $page;

	public function __construct()
	{
		parent::__construct();
		$this->page = "home";
		$this->load->model("HomeModel", "model");
		isLogin();
	}

    public function index() 
	{
		$kegiatan = $this->model->countSpt("spt kegiatan");
		$plh = $this->model->countSpt("spt plh");
		$diklat = $this->model->countSpt("spt diklat");
		$spt =  $this->model->countSptAll();
		$data = [
			'page' => $this->page,
			'data' => [
				'spt_kegiatan' => $kegiatan,
				'spt_kegiatan_persen' => round(($kegiatan == 0) ? '0':($kegiatan/$spt)*100),
				'spt_plh' => $plh,
				'spt_plh_persen' => round(($plh == 0) ? '0':($plh/$spt)*100),
				'spt_diklat' => $diklat,
				'spt_diklat_persen' => round(($diklat == 0) ? '0':($diklat/$spt)*100),
				'spt' => $spt,
				'izin' => $this->model->getIzinKeluarKantor(),
				'dataspt' => $this->model->getSpt(),
			]
		];
		$data1 = [
			'page' => "custom home",
			'title' => "Pegawai",
			'data' =>[],
			'js' => ['pegawai'],
		];
		templateView("home/home", $data);
			
			
		}


}