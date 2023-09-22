<?php 

		/**
		 * 
		 */
		class App extends CI_Controller
		{
			
			function __construct()
			{
				parent::__construct();
				if($this->session->username == null){

					redirect('login/');
				}
			}

			function index(){

				$this->load->view('template/header');
				$this->load->view('app/index');
				$this->load->view('template/footer');
			}

			function jabatan() {

				$data['kode'] = 'jbt-'.rand(0,1000);
				$data['jabatan'] = $this->db->get('tbl_jabatan')->result_array();
				$data['level'] = $this->db->get('tbl_level')->result_array();



				$this->load->view('template/header');
				$this->load->view('app/jabatan', $data);
				$this->load->view('template/footer');
			}

			function act_jabatan(){

				$data = [
					'kode'=> $this->input->post('kode'),
					'jabatan' => $this->input->post('jabatan'),
					'level' => $this->input->post('level'),
				];

				$this->db->insert('tbl_jabatan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
				redirect('app/jabatan');	
			}

			function hapus_jabatan(){

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_jabatan');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
				redirect('app/jabatan');	
			}

			function edit_jabatan(){


				$data = [
					'kode'=> $this->input->post('kode'),
					'jabatan' => $this->input->post('jabatan'),
					'level' => $this->input->post('level'),
				];

				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_jabatan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diedit", "success");');
				redirect('app/jabatan');	
			}

			function unit(){

				$data['kode'] = 'unit-'.rand(0,1000);
				$data['unit'] = $this->db->get('tbl_unit')->result_array();

				$this->load->view('template/header');
				$this->load->view('app/unit', $data);
				$this->load->view('template/footer');
			}

			function act_unit(){

				$data = [
					'kode'=> $this->input->post('kode'),
					'unit' => $this->input->post('unit'),
				];

				$this->db->insert('tbl_unit', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
				redirect('app/unit');	
			}

			function hapus_unit(){

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_unit');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
				redirect('app/unit');	
			}

			function edit_unit(){


				$data = [
					'kode'=> $this->input->post('kode'),
					'unit' => $this->input->post('unit'),
				];

				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_unit', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diedit", "success");');
				redirect('app/unit');	
			}

			function user(){

				$data['kode'] = 'user-'.rand(0, 1000);
				$data['user'] = $this->db->get('tbl_user')->result_array();
				$data['jabatan'] = $this->db->get('tbl_jabatan')->result_array();

				$this->load->view('template/header');
				$this->load->view('app/user', $data);
				$this->load->view('template/footer');
			}

			function act_user(){

				$data = [
					'kode' => $this->input->post('kode'),
					'nama' => $this->input->post('nama'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'jk' => $this->input->post('jk'),
					'email' => $this->input->post('email'),
					'nohp' => $this->input->post('nohp'),
					'jabatan' => $this->input->post('jabatan'),
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				];

				$this->db->insert('tbl_user', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
				redirect('app/user');	
			}



			function edit_user(){

				$data = [
					'kode' => $this->input->post('kode'),
					'nama' => $this->input->post('nama'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'jk' => $this->input->post('jk'),
					'email' => $this->input->post('email'),
					'nohp' => $this->input->post('nohp'),
					'jabatan' => $this->input->post('jabatan'),
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				];

				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_user', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diedit", "success");');
				redirect('app/user');	
			}

			function hapus_user(){

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_user');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
				redirect('app/user');	
			}

			function level(){

				$data['kode'] = 'user-'.rand(0, 1000);
				$data['level'] = $this->db->get('tbl_level')->result_array();
				$data['menu'] = $this->db->get('tbl_menu')->result_array();
				
				$this->load->view('template/header');
				$this->load->view('app/level', $data);
				$this->load->view('template/footer');

			}

			function act_level(){

				$data = [
					'kode'=> $this->input->post('kode'),
					'level' => $this->input->post('level'),

				];

				$menu = $this->input->post('menu[]');
				$a = count($menu);

				for ($i=0; $i < $a ; $i++) { 
					
					$data2 = [
						'level' => $this->input->post('level'),
						'id_menu' => $menu[$i],
					];

					$this->db->insert('tbl_hak_akses', $data2);
				}


				$this->db->insert('tbl_level', $data);

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
				redirect('app/level');
			}

			function edit_level(){


				$this->db->where('level', $this->input->post('level'));
				$this->db->delete('tbl_hak_akses');

				$menu = $this->input->post('menu[]');
				$a = count($menu);

				for ($i=0; $i < $a ; $i++) { 
					
					$data2 = [
						'level' => $this->input->post('level'),
						'id_menu' => $menu[$i],
					];

					$this->db->insert('tbl_hak_akses', $data2);
				}

				$data = [
					'kode'=> $this->input->post('kode'),
					'level' => $this->input->post('level'),
				];

				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_level', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diedit", "success");');
				redirect('app/level');

			}

			function hapus_level(){

				$this->db->where('level', $this->input->post('level'));
				$this->db->delete('tbl_hak_akses');

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_level');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
				redirect('app/level');         	
			}


			function anggota_simpanpinjam(){

				$data['kode'] = 'kode-'.rand(0, 1000);
				$data['anggota'] = $this->db->get('tbl_anggota_simpanpinjam')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/anggota', $data);
				$this->load->view('template/footer');
			}

			function add_anggota(){

				$data = [

					'nama' => $this->input->post('nama'),
					'kode' => $this->input->post('kode'),
					'jk' =>  $this->input->post('jk'),
					'tempat_lahir' =>  $this->input->post('tempat_lahir'),
					'tgl_lahir' =>  $this->input->post('tgl_lahir'),
					'no_ktp' =>  $this->input->post('no_ktp'),
					'no_hp' =>  $this->input->post('no_hp'),
					'alamat' =>  $this->input->post('alamat'),
				];

				$this->db->insert('tbl_anggota_simpanpinjam', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect('app/anggota_simpanpinjam');	
			}

			function edit_anggota(){

				$id = $this->input->post('id');
				$data = [

					'nama' => $this->input->post('nama'),
					'jk' =>  $this->input->post('jk'),
					'tempat_lahir' =>  $this->input->post('tempat_lahir'),
					'tgl_lahir' =>  $this->input->post('tgl_lahir'),
					'no_ktp' =>  $this->input->post('no_ktp'),
					'no_hp' =>  $this->input->post('no_hp'),
					'alamat' =>  $this->input->post('alamat'),
				];

				$this->db->where('id', $id);
				$this->db->update('tbl_anggota_simpanpinjam', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect('app/anggota_simpanpinjam');		
			}

			function hapus_anggota(){
				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_anggota_simpanpinjam');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect('app/anggota_simpanpinjam');	

			}

			function pengajuan_simpanan(){
				$data['kode'] = 'kode-'.rand(0, 10000);
				$data['anggota'] = $this->db->get('tbl_anggota_simpanpinjam')->result_array();
				$data['ajuan'] = $this->db->get_where('tbl_pengajuan_simpanan', ['status' => 1])->result_array();

				$this->load->view('template/header');
				$this->load->view('app/pengajuan_simpanan', $data);
				$this->load->view('template/footer');
			}

			function pengajuan_simpanan2(){

				$data['kode'] = 'kode-'.rand(0, 10000);
				$data['anggota'] = $this->db->get('tbl_anggota_simpanpinjam')->result_array();
				$data['ajuan'] = $this->db->get('tbl_pengajuan_simpanan')->result_array();

				$this->load->view('template/header');
				$this->load->view('app/pengajuan_simpanan2', $data);
				$this->load->view('template/footer');
			}

			function add_pengajuan_simpanan(){

				$data = [
					'kode' => $this->input->post('kode'),
					'id_anggota' => $this->input->post('anggota'),
					'status' => 1,
				];

				$this->db->insert('tbl_pengajuan_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect('app/pengajuan_simpanan2');	
			}

			function edit_pengajuan_simpanan(){

				$data = [
					'kode' => $this->input->post('kode'),
					'id_anggota' => $this->input->post('anggota')
				];

				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_pengajuan_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect('app/pengajuan_simpanan');	
			}

			function hapus_pengajuan_simpanan(){

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_pengajuan_simpanan');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect('app/pengajuan_simpanan2');	
			}

			function simpanan(){

				$data['simpanan'] = $this->db->get('tbl_simpanan')->result_array();

				$this->db->where('status', 1);
				$data['anggota'] = $this->db->get('tbl_pengajuan_simpanan')->result_array();
				$data['kode'] = 'kode-'.rand(0, 10000);
				$this->load->view('template/header');
				$this->load->view('app/simpanan', $data); 
				$this->load->view('template/footer');

			}

			function add_simpanan(){

				$id_anggota = $this->input->post('nama');
				$nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id_anggota])->row_array();

				$data = [
					'kode' => $this->input->post('kode'),
					'nama' => $nama['nama'],
					'id_anggota' => $this->input->post('nama'),
					'tgl' => $this->input->post('tgl'),
					'simpanan' => $this->input->post('simpanan'),
				];


				$this->db->insert('tbl_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect('app/simpanan');	
			}

			function hapus_simpanan(){

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_simpanan');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect('app/simpanan');
			}

			function edit_simpanan(){

				$id_anggota = $this->input->post('nama');
				$nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id_anggota])->row_array();


				$data = [

					'nama' => $nama['nama'],
					'id_anggota' => $this->input->post('nama'),
					'tgl' => $this->input->post('tgl'),
					'simpanan' => $this->input->post('simpanan'),
				];

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect('app/simpanan');
			}


			function tarik_simpanan(){

				$id_anggota = $this->input->post('id_anggota');
				$jml  = $this->input->post('jml');
				$pendapatan  = $this->input->post('pendapatan');
				$keterangan  = $this->input->post('keterangan');

				$data = [
					'nama_pendapatan' => $pendapatan,
					'keterangan' => $keterangan,
					'jml' => $jml,
					'tgl' => date('Y-m-d'),
				];

				$this->db->where('id_anggota', $id_anggota);
				$this->db->update('tbl_pengajuan_simpanan', ['status' => 0]);


				$pen = $this->db->get('tbl_total_pendapatan')->row_array();
				$data = [

					'total' => $pen['total'] + $jml,
				];

				$this->db->insert('tbl_pendapatan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Penarikan berhasil", "success");');
				redirect('app/pengajuan_simpanan');
			}


			function detail_simpanan(){

				$id_anggota = $this->input->get('id');
				$data['simpanan'] = $this->db->get_where('tbl_simpanan', ['id_anggota' => $id_anggota])->result_array();
				$data['kode'] = 'kode-'.rand(0, 10000);
				$data['nama'] = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id_anggota])->row_array();
				$this->load->view('template/header');
				$this->load->view('app/detail_simpanan', $data); 
				$this->load->view('template/footer');

			}

			function add_simpanan2(){

				$id_anggota = $this->input->post('nama');
				$nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id_anggota])->row_array();

				$data = [
					'kode' => $this->input->post('kode'),
					'nama' => $nama['nama'],
					'id_anggota' => $this->input->post('nama'),
					'tgl' => $this->input->post('tgl'),
					'simpanan' => $this->input->post('simpanan'),
				];


				$this->db->insert('tbl_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect("app/detail_simpanan?id=$id_anggota");	
			}


			function edit_simpanan2(){

				$id_anggota = $this->input->post('nama');
				$nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id_anggota])->row_array();


				$data = [

					'nama' => $nama['nama'],
					'id_anggota' => $this->input->post('nama'),
					'tgl' => $this->input->post('tgl'),
					'simpanan' => $this->input->post('simpanan'),
				];

				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_simpanan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect("app/detail_simpanan?id=$id_anggota");	
			}


			function setujui_anggota(){

				$id = $this->input->get('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_pengajuan_simpanan', ['status' => 1]);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di setujui", "success");');
				redirect("app/pengajuan_simpanan2");	
			}

			function setujui_anggota2(){

				$id = $this->input->get('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_pengajuan_pinjaman', ['status' => 1]);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di setujui", "success");');
				redirect("app/pengajuan_pinjaman");	
			}


			function pengajuan_pinjaman(){

				$data['ajuan'] = $this->db->get('tbl_pengajuan_pinjaman')->result_array();
				$data['anggota'] = $this->db->get('tbl_anggota_simpanpinjam')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/pengajuan_pinjaman', $data); 
				$this->load->view('template/footer');
			}

			function add_pengajuan_pinjaman(){

				$bulan =  $this->input->post('waktu_pinjaman');
				$tgl_hari_ini    =strtotime(date('Y-m-d'));
				$tgl_berakhir    =date('Y-m-d', strtotime("+".$bulan ."month", $tgl_hari_ini));

				$a =  ($this->input->post('bunga')/100) * $this->input->post('jml_pinjaman');
				$total_pembayaran = $this->input->post('jml_pinjaman') + $a;

				$data = [
					'id_anggota' => $this->input->post('anggota'),
					'jml_pinjaman' => $this->input->post('jml_pinjaman'),
					'waktu_pinjaman' => $this->input->post('waktu_pinjaman'),
					'tgl_mulai' => date('Y-m-d'),
					'tgl_berakhir' => $tgl_berakhir,
					'bunga' => $this->input->post('bunga'),
					'total_pembayaran' => $total_pembayaran,
					'sisa_pembayaran' => $total_pembayaran,
				];

				$this->db->insert('tbl_pengajuan_pinjaman', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect("app/pengajuan_pinjaman");
			}

			function hapus_pengajuan_pinjaman(){

				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_pengajuan_pinjaman');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect('app/pengajuan_pinjaman');	
			}

			function pembayaran(){

				$data['pembayaran'] = $this->db->get('tbl_pembayaran')->result_array();

				$this->db->where('status', 1);
				$data['anggota'] = $this->db->get('tbl_pengajuan_pinjaman')->result_array();
				$data['kode'] = 'kode-'.rand(0, 10000);
				$this->load->view('template/header');
				$this->load->view('app/pembayaran', $data);
				$this->load->view('template/footer');

			}

			function pendapatan(){

				$data['pendapatan'] = $this->db->get('tbl_pendapatan')->result_array();

				$this->db->select_sum('jml');
				$data['total'] = $this->db->get('tbl_pendapatan')->row_array();

				$data['saldo'] = $this->db->get('tbl_total_pendapatan')->row_array();

				$this->load->view('template/header');
				$this->load->view('app/pendapatan', $data);
				$this->load->view('template/footer');
			}





			function add_pendapatan(){


				$data = [

					'nama_pendapatan' => $this->input->post('nama_pendapatan'),
					'keterangan' => $this->input->post('keterangan'),
					'jml' => $this->input->post('jml'),
					'tgl' => $this->input->post('tgl'),

				];

				$this->db->insert('tbl_pendapatan', $data);


				$this->db->order_by('id', 'desc');
				$pen = $this->db->get('tbl_total_pendapatan')->row_array();

				if($pen == null){

					$data = [
						'total' =>  $this->input->post('jml'),
					];
					$this->db->insert('tbl_total_pendapatan', $data);
				}else{
					$data = [
						'total' => $pen['total']  +  $this->input->post('jml'),
					];

					$this->db->update('tbl_total_pendapatan', $data);
				}

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect("app/pendapatan");
			}



			function edit_pendapatan(){

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();

				$jml_sebelumnya = $this->input->post('jml2');
				$jml_edit = $this->input->post('jml');

				if ($jml_edit > $jml_sebelumnya) {

					$selisih = $jml_edit - $jml_sebelumnya;

					$data = [
						'total' => $pen['total'] + $selisih,
					];

					$this->db->update('tbl_total_pendapatan', $data);

				}else if($jml_edit < $jml_sebelumnya){

					$selisih = $jml_sebelumnya - $jml_edit;

					$data = [
						'total' => $pen['total'] - $selisih,
					];	

					$this->db->update('tbl_total_pendapatan', $data);
				}else{


				}

				$data = [

					'nama_pendapatan' => $this->input->post('nama_pendapatan'),
					'keterangan' => $this->input->post('keterangan'),
					'jml' => $this->input->post('jml'),
					'tgl' => $this->input->post('tgl'),

				];


				$this->db->where('id', $this->input->post("id"));
				$this->db->update('tbl_pendapatan', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect("app/pendapatan");
			}

			function hapus_pendapatan(){


				$this->db->where('id', $this->input->post("id"));
				$this->db->delete('tbl_pendapatan');

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();

				$data =  [
					'total' =>$pen['total'] - $this->input->post('jml'),
				];

				$this->db->update('tbl_total_pendapatan', $data);

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect("app/pendapatan");
			}


			function pengeluaran(){

				$data['saldo'] = $this->db->get('tbl_total_pendapatan')->row_array();
				$data['pengeluaran'] = $this->db->get('tbl_pengeluaran')->result_array();
				$this->db->select_sum('jml');

				$data['total'] = $this->db->get('tbl_pengeluaran')->row_array();

				$this->load->view('template/header');
				$this->load->view('app/pengeluaran', $data);
				$this->load->view('template/footer');
			}

			function add_pengeluaran(){



				$pen = $this->db->get('tbl_total_pendapatan')->row_array();
				if($pen['total'] <  $this->input->post('jml')){
					$this->session->set_flashdata('message', 'swal("Oops", "Saldo anda tidak cukup", "error");');
					redirect("app/pengeluaran");
				}else{
					$data2 =  [
						'total' =>$pen['total'] - $this->input->post('jml'),
					];

					$this->db->update('tbl_total_pendapatan', $data2);


					$data = [

						'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
						'keterangan' => $this->input->post('keterangan'),
						'jml' => $this->input->post('jml'),
						'tgl' => $this->input->post('tgl'),

					];
					$this->db->insert('tbl_pengeluaran', $data);
					$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
					redirect('app/pengeluaran');	
				}

			}

			function hapus_pengeluaran(){


				$this->db->where('id', $this->input->post("id"));
				$this->db->delete('tbl_pengeluaran');

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();

				$data =  [
					'total' =>$pen['total'] + $this->input->post('jml'),
				];

				$this->db->update('tbl_total_pendapatan', $data);

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect("app/pengeluaran");

			}

			function edit_pengeluaran(){

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();

				if($pen['total'] <  $this->input->post('jml')){
					$this->session->set_flashdata('message', 'swal("Oops", "Saldo anda tidak cukup", "error");');
					redirect("app/pengeluaran");
				}else{

					$jml_sebelumnya = $this->input->post('jml2');
					$jml_edit = $this->input->post('jml');

					if ($jml_edit > $jml_sebelumnya) {

						$selisih = $jml_edit - $jml_sebelumnya;

						$data = [
							'total' => $pen['total'] - $selisih,
						];

						$this->db->update('tbl_total_pendapatan', $data);

					}else if($jml_edit < $jml_sebelumnya){

						$selisih = $jml_sebelumnya + $jml_edit;

						$data = [
							'total' => $pen['total'] - $selisih,
						];	

						$this->db->update('tbl_total_pendapatan', $data);
					}else{


					}

				}

				$data = [

					'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
					'keterangan' => $this->input->post('keterangan'),
					'jml' => $this->input->post('jml'),
					'tgl' => $this->input->post('tgl'),

				];


				$this->db->where('id', $this->input->post("id"));
				$this->db->update('tbl_pengeluaran', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect("app/pengeluaran");
			}

			function add_pembayaran(){

				$id_anggota = $this->input->post('id_anggota');
				$pinjaman = $this->db->get_where('tbl_pengajuan_pinjaman', ['id_anggota' => $id_anggota])->row_array();
				$sisa = $pinjaman['sisa_pembayaran'] - $this->input->post('jml_pembayaran');


				$this->db->where('id_anggota',$id_anggota);
				$updatetotalbayar = $this->db->update('tbl_pengajuan_pinjaman', ['sisa_pembayaran' => $sisa]);

				$data = [
					'kode' => $this->input->post('kode'),
					'tgl' => $this->input->post('tgl'),
					'id_anggota' => $this->input->post('id_anggota'),
					'tgl' => $this->input->post('tgl'),
					'jml_pembayaran' => $this->input->post('jml_pembayaran'),
					'sisa_pembayaran' => $sisa,
				];

				if($sisa == 0){

					$this->db->where('id_anggota', $id_anggota);
					$this->db->update('tbl_pengajuan_pinjaman', ['status_pinjaman' => 'Lunas']);
				}

				$this->db->insert('tbl_pembayaran', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect('app/pembayaran');	
			}

			function detail_pembayaran(){
				$id = $this->input->get('id');
				$data['kode'] = 'kode-'.rand(0, 10000);

				$data['pembayaran'] = $this->db->get_where('tbl_pembayaran', ['id_anggota' => $id])->result_array();
				$data['nama'] = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $id])->row_array();
				$this->load->view('template/header');
				$this->load->view('app/detail_pembayaran', $data);
				$this->load->view('template/footer');

			}

			function add_pembayaran2(){

				$id_anggota = $this->input->post('id_anggota');
				$pinjaman = $this->db->get_where('tbl_pengajuan_pinjaman', ['id_anggota' => $id_anggota])->row_array();
				$sisa = $pinjaman['sisa_pembayaran'] - $this->input->post('jml_pembayaran');


				$this->db->where('id_anggota',$id_anggota);
				$updatetotalbayar = $this->db->update('tbl_pengajuan_pinjaman', ['sisa_pembayaran' => $sisa]);

				$data = [
					'kode' => $this->input->post('kode'),
					'tgl' => $this->input->post('tgl'),
					'id_anggota' => $this->input->post('id_anggota'),
					'tgl' => $this->input->post('tgl'),
					'jml_pembayaran' => $this->input->post('jml_pembayaran'),
					'sisa_pembayaran' => $sisa,
				];

				$this->db->insert('tbl_pembayaran', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect("app/detail_pembayaran?id=$id_anggota");	
			}

			function add_hasilpinjam(){

				$id_anggota = $this->input->post('id');
				$this->db->where('id_anggota', $id_anggota);
				$this->db->update('tbl_pengajuan_pinjaman', ['status_hasil' => 1]);

				$a = ($this->input->post('bunga')/100) * $this->input->post('jml_pinjaman');

				$data = [

					'nama_pendapatan' => 'pendapatan bunga simpan pinjam',
					'keterangan' => 'pendapatan bunga simpan pinjam',
					'jml' => $a,
					'tgl' => date('Y-m-d'),

				];

				$this->db->insert('tbl_pendapatan', $data);

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();
				$data = [

					'total' => $pen['total'] + $a,
				];

				$this->db->update('tbl_total_pendapatan', $data);

				$this->session->set_flashdata('message', 'swal("Yess", "Pendapatan berhasil di tambah", "success");');
				redirect("app/pengajuan_pinjaman");	
			}


			function produk(){

				$data['kode'] = 'kode-'.rand(0, 10000);

				$data['produk'] = $this->db->get('tbl_produk')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/produk', $data);
				$this->load->view('template/footer');
			}

			function add_produk(){

				$config['upload_path']          = './assets/produk';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['min_size']             = 9000000;
				$config['remove_spaces']        = false;
				$config['encrypt_name'] 		= true;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("gambar")){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Oops", "Ada kesalahan dalam upload gambar", "warning" );');
					redirect('app/produk');

				}else{
					$img = array('upload_data' => $this->upload->data());
					$new_name = $img['upload_data']['file_name'];

					$data = [
						'kode' => $this->input->post('kode'),
						'nama_produk' => $this->input->post('nama_produk'),
						'keterangan' => $this->input->post('keterangan'),
						'harga' => $this->input->post('harga'),
						'stok' => $this->input->post('stok'),
						'gambar' => $new_name,
					];

					$this->db->insert('tbl_produk', $data);
					$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
					redirect("app/produk");	

				}
			}

			function edit_produk(){
				$id = $this->input->post('id');

				$config['upload_path']          = './assets/produk';
				$config['allowed_types']        = 'jpg|png|jpeg';
				$config['min_size']             = 9000000;
				$config['remove_spaces']        = false;
				$config['encrypt_name'] 		= true;

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("gambar")){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Oops", "Ada kesalahan dalam upload gambar", "warning" );');
					redirect('app/produk');

				}else{
					$img = array('upload_data' => $this->upload->data());
					$new_name = $img['upload_data']['file_name'];

					$data = [

						'nama_produk' => $this->input->post('nama_produk'),
						'keterangan' => $this->input->post('keterangan'),
						'harga' => $this->input->post('harga'),
						'stok' => $this->input->post('stok'),
						'gambar' => $new_name,
					];
					$this->db->where('id', $id);
					$this->db->update('tbl_produk', $data);
					$this->session->set_flashdata('message', 'swal("Yess", "Pendapatan berhasil di ubah", "success");');
					redirect("app/produk");	

				}

			}

			function hapus_produk(){


				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->delete('tbl_produk');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect("app/produk");
			}


			function pembayaran_produk(){

				$data['produk'] = $this->db->get('tbl_pembayaran_produk')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/data_pembayaran_produk', $data);
				$this->load->view('template/footer');

			}

			function setujui_pembayaran(){

				$kode = $this->input->post('id');
				$this->db->where('kode', $kode);
				$this->db->update('tbl_pembayaran_produk', ['status' => 'setuju']); 

				$get = $this->db->get_where('tbl_pembayaran_produk', ['kode' => $kode])->row_array();
				$pendapatan = $get['total_pembayaran'];


				$data = [

					'nama_pendapatan' => 'pendapatan toko online',
					'keterangan' => 'pendapatan toko online',
					'jml' => $pendapatan,
					'tgl' => date("Y-m-d"),

				];

				$this->db->insert('tbl_pendapatan', $data);

				$pen = $this->db->get('tbl_total_pendapatan')->row_array();
				$data = [

					'total' => $pen['total'] + $pendapatan,
				];

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di setujui", "success");');
				redirect("app/pembayaran_produk");
			}


			function menu(){

				$data['menu'] = $this->db->get('tbl_menu')->result_array();
				$this->load->view('template/header');
				$this->load->view('app/menu', $data);
				$this->load->view('template/footer');
			}

			function add_menu(){

				$data = [
					'title' => $this->input->post('title'),
					'icon' => $this->input->post('icon'),
					'url' => $this->input->post('url'),
				];

				$this->db->insert('tbl_menu', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
				redirect("app/menu");
			}


			function edit_menu(){

				$data = [
					'title' => $this->input->post('title'),
					'icon' => $this->input->post('icon'),
					'url' => $this->input->post('url'),
				];


				$this->db->where('id', $this->input->post('id'));
				$this->db->update('tbl_menu', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
				redirect("app/menu");
			}


			function hapus_menu(){


				$this->db->where('id', $this->input->post('id'));
				$this->db->delete('tbl_menu');
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
				redirect("app/menu");
			}

		}
	?>