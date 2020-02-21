<?php

class Dashboard extends CI_Controller{

	public function index()
	{	
		$data['mobil'] = $this->rental_model->get_data('mobil')->result();
		$this->load->view('templates_costumer/header');
		$this->load->view('costumer/dashboard', $data);
		$this->load->view('templates_costumer/footer');
	}


	public function detail_mobil($id)
	{	
		$data['detail'] = $this->rental_model->ambil_id_mobil($id);
		$this->load->view('templates_costumer/header');
		$this->load->view('costumer/detail_mobil', $data);
		$this->load->view('templates_costumer/footer');
	}
}
?>

