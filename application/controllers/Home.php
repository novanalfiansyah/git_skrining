<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_home');
		$this->load->library('Pdf');
	}

	public function index()
	{		
        $data['poli'] = $this->M_home->poli();

		$this->load->view('home', $data);
	}

	
	public function simpan(){
		$data = $this->input->get();
		
		if($data['rapid_test']=="Ya"){
			if(!empty($data['tgl_rapid'])){
				$data['rapid_test'] = "Ya, ".$data['tgl_rapid'];
			}
		}
		
		if($data['pcr']=="Ya"){
			if(!empty($data['tgl_pcr'])){
				$data['pcr'] = "Ya, ".$data['tgl_pcr'];
			}
		}
		
		if($data['kontak']=="Ya"){
			if(!empty($data['sebutkan_kontak'])){
				$data['kontak'] = "Ya, ".$data['sebutkan_kontak'];
			}
		}

		if($data['perjalanan']=="Ya"){
			if(!empty($data['sebutkan_perjalanan'])){
				$data['perjalanan'] = "Ya, ".$data['sebutkan_perjalanan'];
			}
		}
		// print_r($data);
        $data['simpan'] = $this->M_home->simpan($data);
		if($data['simpan'] > 0){
		
		$data2 = $this->input->get();
			$data2['laki-laki'] = "";
			$data2['perempuan'] = "";
	
	
			if($data2['rapid_test']=="Ya"){
				$data2['rapid_tidak'] = "white";
				$data2['rapid_ya'] = "green";
			}else{
				$data2['rapid_tidak'] = "green";
				$data2['rapid_ya'] = "white";
			}			
	
			if($data2['pcr']=="Ya"){
				$data2['pcr_tidak'] = "white";
				$data2['pcr_ya'] = "green";
			}else{
				$data2['pcr_tidak'] = "green";
				$data2['pcr_ya'] = "white";
			}	
			
			if($data2['kontak']=="Ya"){
				$data2['kontak_tidak'] = "white";
				$data2['kontak_ya'] = "green";
			}else{
				$data2['kontak_tidak'] = "green";
				$data2['kontak_ya'] = "white";
			}			
	
			if($data2['perjalanan']=="Ya"){
				$data2['perjalanan_tidak'] = "white";
				$data2['perjalanan_ya'] = "green";
			}else{
				$data2['perjalanan_tidak'] = "green";
				$data2['perjalanan_ya'] = "white";
			}					
	
	
			if($data2['jk']=="Laki-laki"){
				$data2['laki-laki'] = '<img src = "'.base_url('assets/img/checkbox.png').'" width = "10">';
				$data2['perempuan'] = "";
			}elseif($data2['jk']=="Perempuan"){
				$data2['perempuan'] = '<img src = "'.base_url('assets/img/checkbox.png').'" width = "10">';
				$data2['laki-laki'] = "";
			}
	
	
			if($data2['demam']=="Ya"){
				$data2['demam'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['demam'] = '';
			}
	
			// if($data2['batuk']=="Ya"){
			// 	$data2['batuk'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			// }else{
			// 	$data2['batuk'] = '';
			// }
	
			if($data2['pilek']=="Ya"){
				$data2['pilek'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['pilek'] = '';
			}
	
			if($data2['sesak']=="Ya"){
				$data2['sesak'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['sesak'] = '';
			}
			
			if($data2['tenggorokan']=="Ya"){
				$data2['tenggorokan'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['tenggorokan'] = '';
			}		
	
			// if($data2['kepala']=="Ya"){
			// 	$data2['kepala'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			// }else{
			// 	$data2['kepala'] = '';
			// }		
	
			// if($data2['llll']=="Ya"){
			// 	$data2['llll'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			// }else{
			// 	$data2['llll'] = '';
			// }		
	
			// if($data2['dmm']=="Ya"){
			// 	$data2['dmm'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			// }else{
			// 	$data2['dmm'] = '';
			// }
			
			if($data2['anosmia']=="Ya"){
				$data2['anosmia'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['anosmia'] = '';
			}			
	
			if($data2['rapid_test']=="Ya"){
				$data2['rapid_test'] = date('d-m-Y', strtotime($data2['tgl_rapid']));
			}else{
				$data2['rapid_test'] = '';
			}				
	
			if($data2['pcr']=="Ya"){
				$data2['pcr'] = date('d-m-Y', strtotime($data2['tgl_pcr']));
			}else{
				$data2['pcr'] = '';
			}	
			
			if(!empty($data2['tgl_lahir'])){
				$data2['tgl_lahir'] = date('d-m-Y', strtotime($data2['tgl_lahir']));
			}else{
				$data2['tgl_lahir'] = "";
			}


			if($data2['kontak']=="Ya"){
				$data2['kontak'] = $data2['sebutkan_kontak'];
			}else{
				$data2['kontak'] = '';
			}			
			
			if($data2['perjalanan']=="Ya"){
				$data2['perjalanan'] = $data2['sebutkan_perjalanan'];
			}else{
				$data2['perjalanan'] = '';
			}			

			$warna_kesimpulan = "green";
			$hasil_rapid = "";
			$hasil_pcr = "";
			// KESIMPULAN
			if($data['anosmia']=="Ya" || $data['demam']=="Ya" || $data['pilek']=="Ya" || $data['sesak']=="Ya" || $data['tenggorokan']=="Ya"){
				$warna_kesimpulan = "yellow";
			}
			if($this->input->get("rapid_test") == "Ya" && $data2['hasil_rapid']=="Positif"){
				$warna_kesimpulan = "yellow";
				$hasil_rapid = ' | <span style = "background:red">'.$data2['hasil_rapid'].'</span>';
			}else{
				$hasil_rapid = ' | '.$data2['hasil_rapid'];

			}
			if($this->input->get("kontak") == "Ya"){
				$warna_kesimpulan = "yellow";
			}
			if($this->input->get("pcr") == "Ya" && $data2['hasil_pcr']=="Positif"){
				$warna_kesimpulan = "blue";
				$hasil_pcr = ' | '.$data2['hasil_pcr'];
			}else{
				$hasil_pcr = ' | '.$data2['hasil_pcr'];
			}

			// if($this->input->get("pcr") == "Ya" && $data2['hasil_pcr']=="Positif"){
			// 	$warna_kesimpulan = "#0030ff";
			// }elseif($this->input->get("rapid") == "Ya" && $data2['hasil_rapid']=="Positif"){
			// 	$warna_kesimpulan = "#fff707";
			// }
			// END KESIMPULAN

			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$pdf->setPrintFooter(false);
			$pdf->setPrintHeader(false);
			$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
			$pdf->SetTitle('SKRINING - '.date('d-m-Y'));
			$pdf->AddPage('P', 'A4');
			$pdf->SetFont ('helvetica', '', 11 , '', 'default', true );
			
			$table = '<style>
						*{
							font-family: Arial, Helvetica, sans-serif;        
						}
					</style>
					<table style="border-collapse: collapse; width: 100%; margin-left: auto; margin-right: auto; height: 35px; " border="0">
					<tbody>
					<tr style="height: 35px;">
					<td style="height: 35px; font-weight: bold; line-height:16px;">
					MARKAS BESAR TNI ANGKATAN DARAT<br>
					<label style = "text-decoration: underline;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RSPAD GATOT SOEBROTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					</td>
					</tr>
					</tbody>
					</table>
					<br>
					<br>
					<br>
					<table style="border-collapse: collapse; width: 100%; height: 72px;line-height:15px;" border="1">
					<tbody>
					<tr style="height: 18px; font-weight: bold;">
					<td style="width: 46%; height: 72px; font-size:12px;line-height:25px;" rowspan="4"><br><br>SKRINING AWAL PASIEN RAWAT JALAN</td>
					<td style="width: 9.95629%; height: 18px;">Nama</td>
					<td style="width: 2%; height: 18px;">:</td>
					<td style="width: 43%; height: 18px;" colspan="2">&nbsp;'.strtoupper($data2['nama']).'</td>
					</tr>
					<tr style="height: 18px;">
					<td style="width: 9.95629%; height: 18px;">No. RM</td>
					<td style="width: 2%; height: 18px;">:</td>
					<td style="width: 43%; height: 18px;" colspan="2">&nbsp;'.strtoupper($data2['norm']).'</td>
					</tr>
					<tr style="height: 18px;">
					<td style="width: 9.95629%; height: 18px;">Tgl Lahir</td>
					<td style="width: 2%; height: 18px;">:</td>
					<td style="width: 15%; height: 18px;">&nbsp;'.$data['tgl_lahir'].'</td>
					<td style="width: 28%; height: 18px;">
					<table style="border-collapse: collapse; width: 100%;" border="0">
					<tbody>
					<tr>
					<td style="width: 100%;">'.$data2['laki-laki'].' Laki-laki &nbsp;&nbsp;&nbsp; '.$data2['perempuan'].' Perempuan</td>
				
					</tr>
					</tbody>
					</table>
					</td>
					</tr>
					<tr style="height: 18px;">
					<td style="width: 9.95629%; height: 18px;">NIK</td>
					<td style="width: 2%; height: 18px;">:</td>
					<td style="width: 43%; height: 18px;" colspan="2">&nbsp;'.strtoupper($data2['nik']).'</td>
					</tr>
					</tbody>
					</table>
					<br>
					<br>
					<table style = "line-height:20px;">
						<tr>
							<td>
								Poliklinik Tujuan : '.strtoupper($data2['poli']).'
								<br>Kunjungan, Tanggal : '.strtoupper(date('d-m-Y')).'									
							</td>
						</tr>
					</table>
					<br>
					<br>
					
					<table style="border-collapse: collapse; width: 100%;" border="0">
					<tbody>
					<tr>
					<td style="width: 45%;">
				
					<table style="border-collapse: collapse; width: 85%; height: 1225px;" border="1">
					<tbody>
					<tr style="height: 18px;">
					<td style="width: 21.6332%; height: 144px; font-weight: bold; text-align:center" rowspan="5">
					<br><br><br>K<br>
					l<br>
					i<br>
					n<br>
					i<br>
					s
					</td>
					<td style="width: 78.3668%; line-height:15px; height: 28px;">Mengalami penurunan penciuman</td>
					<td style = "width:10%;"> '. $data2['anosmia'].'</td>
					</tr>
					<tr style="height: 28px;">
					<td style="width: 78.3668%; line-height:25px; height: 28px;">Demam</td>
					<td style = "width:10%;"> '. $data2['demam'].'</td>
					</tr>
					<tr style="height: 28px;">
					<td style="width: 78.3668%; line-height:25px; height: 28px;">Pilek</td>
					<td style = "width:10%;"> '. $data2['pilek'].'</td>
					</tr>
					<tr style="height: 28px;">
					<td style="width: 78.3668%; line-height:25px; height: 28px;">Sesak</td>
					<td style = "width:10%;"> '. $data2['sesak'].'</td>
					</tr>
					<tr style="height: 28px;">
					<td style="width: 78.3668%; line-height:25px; height: 28px;">Sakit Tenggorokan</td>
					<td style = "width:10%;"> '. $data2['tenggorokan'].'</td>
					</tr>
					</tbody>
					</table>
					</td>
					<td style="width: 55%;">
					<table style="border-collapse: collapse; width: 100%; height: 144px;" border="1">
					<tbody>
					<tr style="height: 20px;">
					<td style="width: 15.1669%; height: 144px; font-weight: bold; text-align:center" rowspan="8">
					<br><br>P<br>
					e<br>
					n<br>
					u<br>
					n<br>
					j<br>
					a<br>
					n<br>
					g<br>
					</td>
					<td style="width: 84.8331%; height: 19px; line-height:20px;" colspan="3">Pemeriksaan Rapid Tes &lt; 3 hari</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['rapid_tidak'].'" style="width:12%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['rapid_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['rapid_ya'].'"  style="width: 62.8%; height: 19px;">Tanggal : '.$data2['rapid_test'].$hasil_rapid.'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Pemeriksaan PCR &lt; 7 hari</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['pcr_tidak'].'" style="width:12%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['pcr_ya'].'"  style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['pcr_ya'].'"  style="width: 62.8%; height: 19px;">Tanggal : '.$data2['pcr'].$hasil_pcr.'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Kontak dengan riwayat kasus Covid-19</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['kontak_tidak'].'" style="width: 12%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['kontak_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['kontak_ya'].'" style="width: 62.8%; height: 19px;">Sebutkan : '.$data2['kontak'].'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Riwayat Perjalanan</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['perjalanan_tidak'].'" style="width: 12%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['perjalanan_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['perjalanan_ya'].'" style="width: 62.8%; height: 19px;">Sebutkan : '.$data2['perjalanan'].'</td>
					</tr>
					</tbody>
					</table>
					</td>
					</tr>
					</tbody>
					</table>
					<br>
					<br>
					<br>
					<table style="border-collapse: collapse; width: 100%;line-height:30px;" border="1">
					<tbody>
					<tr>
					<td style="width: 25%; text-align:center">Wilayah tempat tinggal</td>
					<td style="width: 75%;">: '.$data2['wilayah'].'</td>
					</tr>
					</tbody>
					</table>
					<br>
					<br>
				
					<table style="border-collapse: collapse; width: 100%; height:20px; line-height:20px;text-align:center" border="0">
					<tbody>
					<tr style="">
					<td bgcolor="green" style="width: 30%;  background: green;">Sesuai&nbsp; Poliklinik Tujuan</td>
					<td style="width: 2%; ">:</td>
					<td style="width: 65.211%;text-align:left;">Pasien dapat melanjutkan pelayanan ke poliklinik yang dituju</td>
					</tr>
					<tr style="">
					<td bgcolor="yellow"  style="width: 30%;  background: yellow;">Poliklinik Skrining Covid-19</td>
					<td>:</td>
					<td style = "text-align:left;" style = "text-align:left;">Pasien diantar ke klinik Skrining Covid-19</td>
					</tr>
					<tr style="">
					<td bgcolor="red"  style="width: 30%;  background: red;">IGD</td>
					<td>:</td>
					<td style = "text-align:left;">Pasien diantar segera ke IGD RSPAD Gatot Soebroto	</td>
					</tr>
					<tr style="">
					<td bgcolor="blue"  style="width: 30%;  background: blue;">ISMAN</td>
					<td>:</td>
					<td style = "text-align:left;">Isolasi Mandiri	</td>
					</tr>
					</tbody>
					</table>
					<br>
					<br>
					<b>KESIMPULAN :</b>
					<br>
					<table style = "height:20px; width:150px;">
						<tr bgcolor="'.$warna_kesimpulan.'">
							<td align = "center" style = "line-height:30px;"> </td>
						</tr>
					</table>
					<br>
					<br>
					<table style="border-collapse: collapse; width: 100%;" border="0">
					<tbody>
					<tr>
					<td style="width: 50%;">&nbsp;</td>
					<td style="width: 50%;">
					<p style="text-align: center;">Perawat yang melakukan skrining</p>
					<p style="text-align: center;">&nbsp;</p>
					<p style="text-align: center;">&nbsp;</p>
					<p style="text-align: center;">( ..................................... )</p>
					</td>
					</tr>
					</tbody>
					</table>';
			$pdf->writeHTML($table);		
	
			$pdf->Output('SKRINING-'.date('d-m-Y_h:i:s').'.pdf', 'I');
			

		}

		echo json_encode($data['simpan']);
	}	
	
	public function validasi(){

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		// $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$data 	= $this->input->post();

		if ($this->form_validation->run() == TRUE) {
		}else{
			$array = array(
				'error'   => true,
				'nama_error' => form_error('nama')
				// ,
				// 'email_error' => form_error('email'),
				// 'subject_error' => form_error('subject'),
				// 'message_error' => form_error('message')
			   );
		}
		echo json_encode($array);
	}
}
