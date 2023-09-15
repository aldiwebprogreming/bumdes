<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		// echo date('Y-m-d');
		// die();
		// $this->load->view('welcome_message');
		// $waktu = 2;
		// $tgl1    = date('Y-m-d'); // menentukan tanggal awal
		// $tgl2    = date('Y-m-d', strtotime('+'.$waktu. 'month', strtotime($tgl1))); // penjumlahan tanggal sebanyak 7 hari
		// echo $tgl2; // cetak tanggal
		ini_set('date.timezone', 'Asia/Jakarta');

		// $tgl1 = new DateTime("2023-08-23");
		// $tgl2 = new DateTime("2023-08-23");
		// $d = $tgl2->diff($tgl1)->days + 0;
		// echo $d." hari";

		// $kode = rand(2, 10);
		// echo $kode;

		$this->db->select('*');
		$this->db->from('tbl_booking');
		$this->db->join('tbl_jambooking_lapangan', 'tbl_jambooking_lapangan.jam_mulai = tbl_booking.jam_mulai');
		$query = $this->db->get()->result_array();

		var_dump($query);


	}
}
