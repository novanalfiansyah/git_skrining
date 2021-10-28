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
	
			if($data2['batuk']=="Ya"){
				$data2['batuk'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['batuk'] = '';
			}
	
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
	
			if($data2['kepala']=="Ya"){
				$data2['kepala'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['kepala'] = '';
			}		
	
			if($data2['llll']=="Ya"){
				$data2['llll'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['llll'] = '';
			}		
	
			if($data2['dmm']=="Ya"){
				$data2['dmm'] = '<img src = "'.base_url('assets/img/cek.png').'" width = "10">';
			}else{
				$data2['dmm'] = '';
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
					<td style="width: 46%; height: 72px; font-size:12px;" rowspan="4"><br><br><br>SKRINING AWAL PASIEN RAWAT JALAN</td>
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
					<table style="border-collapse: collapse; width: 100%;" border="1">
					<tbody>
					<tr style = " line-height:35px;">
					<td style="width: 25%; text-align: center;">Suhu Tubuh</td>
					<td style="width: 25%; text-align: center;">&lt; 37,5</td>
					<td style="width: 25%; text-align: center;">37,5 - 38</td>
					<td style="width: 25%; text-align: center;">&gt; 38</td>
					</tr>
					<tr>
					<td style="width: 25%; text-align: center; font-weight: bold; line-height:30px;height:35px;">Keputusan</td>
					<td bgcolor="green" style="width: 25%; text-align: center; line-height:15px;">
					Sesuai<br>
					Poliklinik Tujuan
					</td>
					<td bgcolor="yellow" style="width: 25%; text-align: center; background: yellow; line-height:35px;">
					Poliklinik
					Covid-19
					</td>
					<td bgcolor="red" style="width: 25%; text-align: center; background: red; line-height:35px;">IGD</td>
					</tr>
					</tbody>
					</table>
					<p>&nbsp;</p>
					<table style="border-collapse: collapse; width: 100%;" border="0">
					<tbody>
					<tr>
					<td style="width: 45%;">
				
					<table style="border-collapse: collapse; width: 85%; height: 144px;" border="1">
					<tbody>
					<tr style="height: 18px;">
					<td style="width: 21.6332%; height: 144px; font-weight: bold; text-align:center" rowspan="8">
					<br><br><br><br>K<br>
					l<br>
					i<br>
					n<br>
					i<br>
					s<br><br>
					</td>
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Demam &nbsp;&nbsp;&nbsp;</td>
					<td style = "width:10%;"> '. $data2['demam'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Batuk</td>
					<td style = "width:10%;"> '. $data2['batuk'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Pilek</td>
					<td style = "width:10%;"> '. $data2['pilek'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Sesak</td>
					<td style = "width:10%;"> '. $data2['sesak'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Sakit Tenggorokan</td>
					<td style = "width:10%;"> '. $data2['tenggorokan'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Sakit Kepala</td>
					<td style = "width:10%;"> '. $data2['kepala'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Letih, Lemas, Lesu, Linu</td>
					<td style = "width:10%;"> '. $data2['llll'].'</td>
					</tr>
					<tr style="height: 19px;">
					<td style="width: 78.3668%; line-height:20px; height: 19px;">Diare, Mual, Muntah</td>
					<td style = "width:10%;"> '. $data2['dmm'].'</td>
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
					<td bgcolor="'.$data2['rapid_tidak'].'" style="width:15%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['rapid_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['rapid_ya'].'"  style="width: 59.8%; height: 19px;">Tanggal : '.$data2['rapid_test'].'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Pemeriksaan PCR &lt; 7 hari</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['pcr_tidak'].'" style="width:15%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['pcr_ya'].'"  style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['pcr_ya'].'"  style="width: 59.8%; height: 19px;">Tanggal : '.$data2['pcr'].'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Kontak dengan riwayat kasus Covid-19</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['kontak_tidak'].'" style="width: 15%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['kontak_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['kontak_ya'].'" style="width: 59.8%; height: 19px;">Sebutkan : '.$data2['kontak'].'</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td style="width: 84.8331%; height: 19px;" colspan="3">Riwayat Perjalanan</td>
					</tr>
					<tr style="height: 19px; line-height:20px;">
					<td bgcolor="'.$data2['perjalanan_tidak'].'" style="width: 15%; height: 19px; text-align: center;">Tidak</td>
					<td bgcolor="'.$data2['perjalanan_ya'].'" style="width: 10%; height: 19px; text-align: center;">Ya</td>
					<td bgcolor="'.$data2['perjalanan_ya'].'" style="width: 59.8%; height: 19px;">Sebutkan : '.$data2['perjalanan'].'</td>
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
					<td style = "text-align:left;" style = "text-align:left;">pasien diantar ke klinik Skrining Covid-19</td>
					</tr>
					<tr style="">
					<td bgcolor="red"  style="width: 30%;  background: red;">IGD</td>
					<td>:</td>
					<td style = "text-align:left;">Pasien diantar segera ke IGD RSPAD Gatot Soebroto	</td>
					</tr>
					</tbody>
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
	
			$pdf->Output('SKRINING.pdf', 'D');
			

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
