<?php 

	class Data_mobil extends CI_Controller{
		public function index(){
			$data['mobil'] = $this->rental_model->get_data('mobil')->result();
			$data['type'] = $this->rental_model->get_data('type')->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_mobil', $data);
			$this->load->view('templates_admin/footer');
		}


		public function tambah_mobil()
		{

			$data['type'] = $this->rental_model->get_data('type')->result();
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_tambah_mobil', $data);
			$this->load->view('templates_admin/footer');

		}
		public function tambah_mobil_aksi()
		{

			$this->_rules();
			if($this->form_validation->run() == FALSE){
				$this->tambah_mobil();
			}else{
				$kode_type		=$this->input->post('kode_type');
				$merek			=$this->input->post('merek');
				$no_plat		=$this->input->post('no_plat');
				$warna			=$this->input->post('warna');
				$tahun			=$this->input->post('tahun');
				$status			=$this->input->post('status');
				$gambar			= $_FILES['gambar']['name'];
				if($gambar=''){}else{
					$config ['upload_path']  	='./Assets/Upload/';
					$config ['allowed_types']  	= 'jpg|jpeg|png';
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('gambar')){
						echo "Gambar Mobil Gagal DiUpload";
					}else{
						$gambar=$this->upload->data('file_name');
					}
				}

				$data = array(
					'kode_type'		=>	$kode_type,
					'merek'			=>	$merek,
					'no_plat'		=>	$no_plat,
					'warna'			=>	$warna,
					'tahun'			=>	$tahun,
					'status'		=>	$status,
					'gambar'		=>	$gambar


				);


				$this->rental_model->insert_data($data,'mobil');
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  					<strong>Selamat</strong> Data Mobil Berhasil Ditambahkan.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
				redirect('admin/data_mobil');
			}

		}

		public function update_mobil($id){
			$where = array('id_mobil' => $id);
			$data['mobil'] = $this->db->query("SELECT * FROM mobil mb, type tp WHERE mb.kode_type = tp.kode_type AND mb.id_mobil='$id'")->result();
			$data['type'] = $this->rental_model->get_data('type')->result();
				$this->load->view('templates_admin/header');
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/form_update_mobil', $data);
				$this->load->view('templates_admin/footer');
}

		public function update_mobil_aksi(){

			$this->_rules();
			if($this->form_validation->run() == FALSE)
			{
				$this->update_mobil();
			}else{	
				$id    			=$this->input->post('id_mobil');
				$kode_type		=$this->input->post('kode_type');
				$merek			=$this->input->post('merek');
				$no_plat		=$this->input->post('no_plat');
				$warna			=$this->input->post('warna');
				$tahun			=$this->input->post('tahun');
				$status			=$this->input->post('status');
				$gambar			= $_FILES['gambar']['name'];
				if($gambar){
					$config ['upload_path']  	='./Assets/Upload/';
					$config ['allowed_types']  	= 'jpg|jpeg|png';

					$this->load->library('upload', $config);
					if($this->upload->do_upload('gambar')){
						$gambar = $this->upload->data('file_name');
						$this->db->set('gambar', $gambar);
					}else{
						echo $this->upload->display_errors();
					}
				}

				$data = array(
					'kode_type'		=>	$kode_type,
					'merek'			=>	$merek,
					'no_plat'		=>	$no_plat,
					'warna'			=>	$warna,
					'tahun'			=>	$tahun,
					'status'		=>	$status,
				);
				$where = array (

					'id_mobil' => $id

				);
				$this->rental_model->update_data('mobil', $data, $where);
				$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  					<strong>Selamat</strong> Data Mobil Berhasil Diupdate.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
				redirect('admin/data_mobil');

			}

		}



		public function _rules()
		{

			$this->form_validation->set_rules('kode_type','Kode Type','required');
			$this->form_validation->set_rules('merek','merek','required');
			$this->form_validation->set_rules('no_plat','no_plat','required');
			$this->form_validation->set_rules('warna','warna','required');
			$this->form_validation->set_rules('tahun','tahun','required');
			$this->form_validation->set_rules('status','status','required');

		}
		public function detail_mobil($id)
		{
			$data['detail'] = $this->rental_model->ambil_id_mobil($id);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_mobil', $data);
			$this->load->view('templates_admin/footer');
			}

		public function delete_mobil($id){
			$where = array('id_mobil' => $id);
			$this->rental_model->delete_data($where,'mobil');
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  					Data Mobil Berhasil Dihapus.
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  					</button>
					</div>');
				redirect('admin/data_mobil');
		}

		}
	

 ?>