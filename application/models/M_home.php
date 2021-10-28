<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {
    public function poli() {
		$sql = "SELECT * FROM mst_poli where active = '1' ORDER BY name asc";
		$data = $this->db->query($sql);

		return $data->result_array();
	} 

	public function simpan($data){
		$db2 = $this->load->database('db2', TRUE);
		$now = date("Y-m-d h:i:s");
		$sql = "INSERT INTO skrining(id,poli,norm,nama,nik,tgl_lahir,jenis_kelamin,anosmia,demam,pilek,sesak,tenggorokan,rapid_tes,pcr,kontak,perjalanan,wilayah,datecreated) VALUES('','".$data['poli']."', '".$data['norm']."','".$data['nama']."','".$data['nik']."','".$data['tgl_lahir']."','".$data['jk']."','".$data['anosmia']."','".$data['demam']."','".$data['pilek']."','".$data['sesak']."','".$data['tenggorokan']."','".$data['rapid_test']."','".$data['pcr']."','".$data['kontak']."','".$data['perjalanan']."','".$data['wilayah']."','".$now."')";

        $data2 = $db2->query($sql);
		// print_r($data2);exit;
        return $db2->affected_rows();		
	}
}
