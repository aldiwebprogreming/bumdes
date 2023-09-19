<?php 

	 /**
	  * 
	  */
	 class User extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent:: __construct();
	 	}

	 	function index(){

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/index');
	 		$this->load->view('template_user/footer');	 	
	 	}

	 	function anggota(){

	 		$data['alert']  = $this->input->get('data');

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/anggota', $data);
	 		$this->load->view('template_user/footer');	 	
	 	}

	 	function login(){

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/login');
	 		$this->load->view('template_user/footer');	 	
	 	}

	 	function act_login(){

	 		$nama = $this->input->post('nama');
	 		$no_ktp = $this->input->post('no_ktp');

	 		$ceknama = $this->db->get_where('tbl_anggota_simpanpinjam', ['nama' => $nama])->row_array();
	 		if($ceknama){
	 			$noktp =  $this->db->get_where('tbl_anggota_simpanpinjam', ['no_ktp' => $no_ktp])->row_array();
	 			if($no_ktp){

	 				$data = [
	 					'nama' => $nama,
	 					'no_ktp' => $no_ktp,
	 					'id_anggota' => $ceknama['id'],
	 				];

	 				$this->session->set_userdata($data);
	 				$this->session->set_flashdata('message', 'swal("Yess", "Anda berhasil login", "success");');
	 				redirect('user/anggota?data=sukses');
	 			}else{

	 				$this->session->set_flashdata('message', 'swal("Ops", "Akun anda salah", "error");');
	 				redirect("user/login");	
	 			}
	 		}else{

	 			$this->session->set_flashdata('message', 'swal("Ops", "Akun anda salah", "error");');
	 			redirect("user/login");	
	 		}
	 	}

	 	function add_anggota(){

	 		$data = [
	 			'kode' => 'kode-'.rand(0, 10000),
	 			'nama' => $this->input->post('nama'),
	 			'jk' => $this->input->post('jk'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'tgl_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'no_hp' => $this->input->post('no_hp'),
	 			'no_ktp' => $this->input->post('no_ktp'),
	 		];

	 		$this->db->insert('tbl_anggota_simpanpinjam', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Anda berhasil mendaftar sebagai anggota", "success");');
	 		redirect("user/login");	
	 	}

	 	function simpanpinjam(){

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/simpanpinjam');
	 		$this->load->view('template_user/footer');
	 	}

	 	function simpanan(){

	 		$data['pengajuan'] = $this->db->get_where('tbl_pengajuan_simpanan', ['id_anggota' => $this->session->id_anggota])->row_array();

	 		$this->db->select_sum('simpanan');
	 		$data['simpanan'] = $this->db->get_where('tbl_simpanan', ['id_anggota' => $this->session->id_anggota])->row_array();

	 		$data['list'] = $this->db->get_where('tbl_simpanan', ['id_anggota' => $this->session->id_anggota])->result_array();

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/simpanan', $data);
	 		$this->load->view('template_user/footer');
	 	}


	 	function pengajuan_simpanan(){

	 		$this->db->where('id_anggota', $this->input->post('id_anggota'));
	 		$cek = $this->db->get('tbl_pengajuan_simpanan')->row_array();

	 		if ($cek == true) {
	 			$this->session->set_flashdata('message', 'swal("Oops", "Pengajuan sudah di lakukan", "error");');
	 			redirect('user/simpanan');	

	 		}else{

	 			$data = [
	 				'kode' => 'kode-'.rand(0, 10000),
	 				'id_anggota' => $this->input->post('id_anggota'),
	 				'status' => 0,
	 			];

	 			$this->db->insert('tbl_pengajuan_simpanan', $data);
	 			$this->session->set_flashdata('message', 'swal("Yess", "Pengajuan berhasil", "success");');
	 			redirect('user/simpanan');	
	 		}

	 	}

	 	function pinjaman(){

	 		$data['pengajuan'] = $this->db->get_where('tbl_pengajuan_pinjaman', ['id_anggota' => $this->session->id_anggota])->row_array();


	 		$data['list'] = $this->db->get_where('tbl_pembayaran', ['id_anggota' => $this->session->id_anggota])->result_array();


	 		$this->load->view('template_user/header');
	 		$this->load->view('user/pinjaman', $data);
	 		$this->load->view('template_user/footer');
	 	}

	 	function add_pengajuan_pinjaman(){

	 		$bulan =  $this->input->post('waktu_pinjaman');
	 		$tgl_hari_ini    =strtotime(date('Y-m-d'));
	 		$tgl_berakhir    =date('Y-m-d', strtotime("+".$bulan ."month", $tgl_hari_ini));

	 		$a =  ($this->input->post('bunga')/100) * $this->input->post('jml_pinjaman');
	 		$total_pembayaran = $this->input->post('jml_pinjaman') + $a;

	 		$data = [
	 			'id_anggota' => $this->session->id_anggota,
	 			'jml_pinjaman' => $this->input->post('jml_pinjaman'),
	 			'waktu_pinjaman' => $this->input->post('waktu_pinjaman'),
	 			'tgl_mulai' => date('Y-m-d'),
	 			'tgl_berakhir' => $tgl_berakhir,
	 			'bunga' => $this->input->post('bunga'),
	 			'total_pembayaran' => $total_pembayaran,
	 			'sisa_pembayaran' => $total_pembayaran,
	 		];

	 		$this->db->insert('tbl_pengajuan_pinjaman', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Pinjaman berhasil di ajukan", "success");');
	 		redirect("user/pinjaman");
	 	}


	 	function toko(){
	 		$data['produk'] = $this->db->get('tbl_produk')->result_array();
	 		$this->load->view('template_user/header');
	 		$this->load->view('user/toko', $data);
	 		$this->load->view('template_user/footer');
	 	}

	 	function cart(){
	 		$this->load->library('cart');

	 		$data = [

	 			'id' => $this->input->post('id'),
	 			'qty' => $this->input->post('qty'),
	 			'price' => $this->input->post('harga'),
	 			'name' => $this->input->post('nama'),
	 		];	

	 		$cart = $this->cart->insert($data);
	 		redirect('user/toko');
	 	}


	 	function remove_cart(){
	 		$id = $this->input->get('id');
	 		$this->cart->remove($id);
	 		redirect('user/toko');
	 	}

	 	function checkout(){

	 		$data['alert'] = $this->input->get('data');
	 		$this->load->view('template_user/header');
	 		$this->load->view('user/checkout', $data);
	 		$this->load->view('template_user/footer');

	 	}


	 	function act_checkout(){

	 		$config['upload_path']          = './assets/bukti';
	 		$config['allowed_types']        = 'jpg|png|jpeg';
	 		$config['min_size']             = 9000000;
	 		$config['remove_spaces']        = false;
	 		$config['encrypt_name'] 		= true;

	 		$this->load->library('upload', $config);
	 		if (!$this->upload->do_upload("gambar")){
	 			$error = array('error' => $this->upload->display_errors());
	 			$this->session->set_flashdata('message', 'swal("Oops", "Ada kesalahan dalam upload gambar", "warning" );');
	 			redirect('user/checkout');

	 		}else{
	 			$img = array('upload_data' => $this->upload->data());
	 			$new_name = $img['upload_data']['file_name'];


	 			$kode = 'kode-'.rand(0, 1000);
	 			foreach ($this->cart->contents() as $items) {

	 				$data = [
	 					'kode' => $kode,
	 					'nama' => $this->input->post('nama'),
	 					'noktp' => $this->input->post('noktp'),
	 					'norek' => $this->input->post('norek'),
	 					'nama' => $this->input->post('nama'),
	 					'alamat_pengantaran' => $this->input->post('alamat'),
	 					'total_pembayaran' => $this->input->post('total'),
	 					'produk' => $items['name'],
	 					'qty' => $items['qty'],
	 					'total_harga' => $items['price'] * $items['qty'],
	 					'harga' => $items['price'],
	 					'status' => 'menunggu',
	 					'bukti' => $new_name,

	 				];

	 				$this->db->insert('tbl_pembayaran_produk', $data);
	 				$this->cart->remove($items['rowid']);
	 			}


	 			$this->session->set_flashdata('message', 'swal("Yess", "checkout anda berhasil", "success");');
	 			redirect("user/checkout?data=sukses");

	 		}
	 	}

	 	function data_pesanan(){

	 		$data['produk'] = $this->db->get_where('tbl_pembayaran_produk', ['noktp' => $this->session->no_ktp])->result_array();

	 		$this->load->view('template_user/header');
	 		$this->load->view('user/data_pesanan', $data);
	 		$this->load->view('template_user/footer');

	 	}


	 }
	?>