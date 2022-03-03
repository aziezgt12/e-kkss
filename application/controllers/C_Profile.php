<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Model_Profile', 'Model_Pengurus'));
	}
	public function index()
	{
		$data = array(
			'title' => 'Ikatan Keluarga Sulawesi Selatan :: Profile', 
		);
		$this->load->view('web/profile', $data);
	}
	public function visi()
	{
		$profile = $this->Model_Profile->GetProfile()->row();

		$data = array(
			'title' => 'Ikatan Keluarga Sulawesi Selatan :: Visi - Misi', 
			'profile' => $profile  
		);

		$this->load->view('web/visi', $data);
	}
	public function pengurus()
	{

		$pengurus_dp 		= $this->Model_Pengurus->GetPengurusByJabatan('Dewan Penasehat');
		$pengurus_dpkr 		= $this->Model_Pengurus->GetPengurusByJabatan('Dewan Pakar');
		$pengurus_dpem 		= $this->Model_Pengurus->GetPengurusByJabatan('Dewan Pembina');
		$pengurus_dpd 		= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Ketua');
		$pengurus_dpdwk 	= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Wakil Ketua');
		$pengurus_dpds 	= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Sekretaris');
		$pengurus_dpdws 	= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Wakil Sekretaris');
		$pengurus_dpdb 	= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Bedahara');
		$pengurus_dpdwb 	= $this->Model_Pengurus->GetPengurusBybidangorjbt('Dewan Pengurus Daerah', 'Bedahara');
		$data = array(
			'title' 			=> 'Ikatan Keluarga Sulawesi Selatan :: Pengurus', 
			'pengurus_dp' 		=> $pengurus_dp,  
			'pengurus_dpkr' 	=> $pengurus_dpkr,  
			'pengurus_dpem' 	=> $pengurus_dpem,  
			'pengurus_dpd' 		=> $pengurus_dpd,  
			'pengurus_dpdwk' 	=> $pengurus_dpdwk,  
			'pengurus_dpds' 	=> $pengurus_dpds,  
			'pengurus_dpdws' 	=> $pengurus_dpdws,  
			'pengurus_dpdb' 	=> $pengurus_dpdb,  
			'pengurus_dpdwb' 	=> $pengurus_dpdwb,  
		);

		$this->load->view('web/pengurus', $data);
	}
	public function foto_kegiatan()
	{
		$data = array(
			'title' => 'Ikatan Keluarga Sulawesi Selatan :: Visi - Misi', 
		);

		$this->load->view('web/foto_kegiatan', $data);
	}
}
