<html>
 <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>SKRINING AWAL PASIEN RAWAT JALAN</title>
  <link rel="shortcut icon" href="http://localhost/e-tiket_gizi_maintenance/assets/img/favicon.png"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
  <meta name="csrf" id="ci_csrf_token" content="" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/radio.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

 </head>
 <body class="hold-transition login-page">
  <!-- MultiStep Form -->
  <div class="container-fluid" id="grad1">
   <div class="row justify-content-center mt-0">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
     <!-- <div class="card px-0 pt-4 pb-0 mt-3 mb-3"> -->
     <!-- <div class="px-0 pt-4 pb-0 mt-3 mb-3"> -->
     <div class="px-0 pb-0 mt-3 mb-3">
		 <img src = "<?php echo base_url("assets/img/bersyukur.png");?>" width = "100">
		 <p>
      <h2><strong>SKRINING AWAL PASIEN RAWAT JALAN<br>RSPAD Gatot Soebroto</strong></h2>
	  <h6>Mohon lengkapi informasi diri Anda.</h6>
	  <br>
	  <!-- <div class="col-12"><label class="pay">Terima Kasih telah senantiasa mempercayakan pengobatan Anda kepada RSPAD Gatot Soebroto. Demi meningkatkan kualitas pelayanan dan kepuasan Pasien, kami mohon untuk dapat meluangkan waktu Anda mengisi formulir tingkat kepuasan Pasien dan Keluarga.  <br>SALAM BERSYUKUR</label></div> -->
	  <!-- <div class="col-12" style = "color:red; text-align:left;"><b>*</b> Wajib diisi</div> -->
      <div class="row">
       <div class="col-md-12 mx-0">
        <form id="msform" methode = "POST" enctype="multipart/form-data" action = "<?php echo base_url('Home/simpan');?>">
		
         <!-- progressbar -->
         <!-- <ul id="progressbar">
          <li class="active" id="account"><strong>Identitas</strong></li>
          <li id="personal"><strong>Form Deklarasi Kesehatan</strong></li>
          <li id="personal"><strong>Form Deklarasi Kesehatan</strong></li>
          <li id="personal"><strong>Wilayah</strong></li>
          <li id="personal"><strong>Selesai</strong></li>
         </ul> -->
         <!-- fieldsets -->

        <fieldset>

		<div class="form-card">

			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<label class="pay pertanyaan">POLIKLINIK TUJUAN <b class = "require">*</b></label>
					<select class="list-dt form-control" id="poli" name="poli" style = "width:100%">
						<option></option>
						<?php
						foreach($poli as $value){
							echo "<option value = '".$value['name']."'>".$value['name']."</option>";
						}
						?>
					</select>	
					<span id="poli-error" class="error invalid-feedback"></span>									
				</div>
			</div>
				<br>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-4 col-lg-4">
					<label class="pay pertanyaan">NO. RM <b class = "require">*</b></label>
					<input type = "number" name = "norm" class="form-control" id = "norm">
				</div>				
				<div class="col-12 col-sm-12 col-md-8 col-lg-8 form-group">
					<label class="pay pertanyaan">NAMA <b class = "require">*</b></label>
					<input type = "text" name = "nama" class="form-control" id = "nama">
				</div>	
				
				<div class="col-12 col-sm-12 col-md-7 col-lg-7">
					<label class="pay pertanyaan">NIK <b class = "require">*</b></label>
					<input type = "number" name = "nik" class="form-control" id = "nik">
				</div>											

				<div class="col-12 col-sm-12 col-md-5 col-lg-5">
					<label class="pay pertanyaan">TANGGAL LAHIR <b class = "require">*</b></label>
					<input type = "date" name = "tgl_lahir" class="form-control" id = "tgl_lahir">
				</div>									
			</div>

			<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">JENIS KELAMIN <b class = "require">*</b></label>
					</div>
					<!-- <div class="col-3" style = "margin-left:10px;"> -->
					<div class="col-12 col-sm-12 col-md-8 col-lg-8" style = "margin-left:20px;">
						<label class="container">Laki-laki
						<input type="radio" checked="checked" name="jk" value = "Laki-laki" id = "l" class="form-control jk">
						<span class="checkmark"></span>
						</label>
					</div>
					
					<!-- <div class="col-2" style = "margin-left:20px;"> -->
						<div class="col-12 col-sm-12 col-md-8 col-lg-8" style = "margin-left:20px;">

						<label class="container">Perempuan
						<input type="radio" name="jk" value = "Perempuan" id = "p" class="form-control jk">
						<span class="checkmark"></span>
						</label>
					</div>
				</div>			
		</div>
		<input type="button" name="next" class="next action-button" value="Selanjutnya"/>
        </fieldset>
        
        <fieldset>
        	<div class="form-card">
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Mengalami Penurunan Penciuman</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="anosmia" value = "Ya" id = "anosmia_ya" class="form-control">
						<span class="checkmark"></span>
					</div>
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="anosmia" value = "Tidak" id = "anosmia_tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>
				</div>				
				<br>

				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Demam atau riwayat demam</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="demam" value = "Ya" id = "demam_ya" class="form-control">
						<span class="checkmark"></span>
					</div>
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="demam" value = "Tidak" id = "demam_tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>
				</div>				
				<br>
				<!-- <div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Batuk atau riwayat batuk</label>
					</div>

					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="batuk" value = "Ya" id = "batuk_ya" class="form-control">
						<span class="checkmark"></span>
					</div>				
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="batuk" value = "Tidak" id = "batuk_tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>

				</div>	
				<br>		 -->
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Pilek</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="pilek" value = "Ya" id = "pilek_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="pilek" value = "Tidak" id = "pilek_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		
				</div>					
				<br>			
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Sesak</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="sesak" value = "Ya" id = "sesak_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="sesak" value = "Tidak" id = "sesak_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		
				</div>	
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Sakit Tenggorokan</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="tenggorokan" value = "Ya" id = "tenggorokan_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="tenggorokan" value = "Tidak" id = "tenggorokan_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		
				</div>	
				<!-- <br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Sakit Kepala</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="kepala" value = "Ya" id = "kepala_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="kepala" value = "Tidak" id = "kepala_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		

				</div>	
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Letih, Lemas, Lesu, Linu</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="llll" value = "Ya" id = "llll_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="llll" value = "Tidak" id = "llll_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		

				</div>	
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Diare, Mual, Muntah</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Ya
						<input type="radio" name="dmm" value = "Ya" id = "dmm_ya" class="form-control">
						<span class="checkmark"></span>
					</div>		
					
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Tidak
						<input type="radio" name="dmm" value = "Tidak" id = "dmm_Tidak" checked class="form-control">
						<span class="checkmark"></span>
					</div>		

				</div>	 -->
			</div>
			<input type="button" name="previous" class="previous action-button-previous" value="Sebelumnya" />
          	<input type="button" name="next" class="next action-button" value="Selanjutnya"/>
        </fieldset>

		<fieldset>
        	<div class="form-card">
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Pemeriksaan Rapid Tes < 3 hari</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Tidak
						<input type="radio" name="rapid_test" class = "pilih-alergi rapid" value = "Tidak" id = "rapid_tidak" checked>
						<span class="checkmark"></span>
					</div>
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Ya
						<input type="radio" name="rapid_test" class = "pilih-alergi rapid" value = "Ya" id = "rapid_ya">
						<span class="checkmark"></span>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="row rapid" id = "rapid" style="display: none; margin-top:20px;">
							<label class="pay">Tanggal :</label>
							<input type = "date" name = "tgl_rapid" id = "tgl_rapid" class="form-control">
						</div>
						<div class="row rapid_hasil" id = "rapid_hasil" style="display: none; margin-top:20px;">
							<label class="pay">Hasil :</label>
							<select name = "hasil_rapid" id = "hasil_rapid" class="form-control">
								<option></option>
								<option value = "Positif">Positif</option>
								<option value = "Negatif">Negatif</option>
							</select>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan ">Pemeriksaan PCR < 7 hari</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Tidak
						<input type="radio" name="pcr" class = "pilih_pcr" value = "Tidak" id = "pcr_tidak" checked>
						<span class="checkmark"></span>
					</div>
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Ya
						<input type="radio" name="pcr" class = "pilih_pcr" value = "Ya" id = "pcr_ya">
						<span class="checkmark"></span>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div class="row pcr" id = "pcr" style="display: none; margin-top:20px;">
							<label class="pay">Tanggal :</label>
							<input type = "date" name = "tgl_pcr" id = "tgl_pcr" class="form-control">
						</div>
						<div class="row pcr_hasil" id = "pcr_hasil" style="display: none; margin-top:20px;">
							<label class="pay">Hasil :</label>
							<select name = "hasil_pcr" id = "hasil_pcr" class="form-control">
								<option></option>
								<option value = "Positif">Positif</option>
								<option value = "Negatif">Negatif</option>
							</select>
						</div>							
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Kontak dengan riwayat kasus Covid-19</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Tidak
						<input type="radio" name="kontak" class = "pilih_kontak" value = "Tidak" id = "kontak_tidak" checked>
						<span class="checkmark"></span>
					</div>
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Ya
						<input type="radio" name="kontak" class = "pilih_kontak" value = "Ya" id = "kontak_ya">
						<span class="checkmark"></span>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="col-12">
							<div class="row kontak" id = "kontak" style="display: none; margin-top:20px;">
								<label class="pay">Sebutkan :</label>
								<input type = "text" name = "sebutkan_kontak" id = "sebutkan_kontak">
							</div>
						</div>
					</div>
				</div>					
				<br>
				<div class="row">
					<div class="col-12">
						<label class="pay pertanyaan">Riwayat Perjalanan</label>
					</div>
					<div class="col-4" style = "margin-left:10px;">
						<label class="container">Tidak
						<input type="radio" name="perjalanan" class = "pilih_perjalanan" value = "Tidak" id = "perjalanan_tidak" checked>
						<span class="checkmark"></span>
					</div>
					<div class="col-4" style = "margin-left:40px;">
						<label class="container">Ya
						<input type="radio" name="perjalanan" class = "pilih_perjalanan" value = "Ya" id = "perjalanan_ya">
						<span class="checkmark"></span>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="col-12">
							<div class="row perjalanan" id = "perjalanan" style="display: none; margin-top:20px;">
								<label class="pay">Sebutkan :</label>
								<input type = "text" name = "sebutkan_perjalanan" id = "sebutkan_perjalanan">
							</div>
						</div>
					</div>
				</div>	
			</div>
			<input type="button" name="previous" class="previous action-button-previous" value="Sebelumnya" />
          	<input type="button" name="next" class="next action-button" value="Selanjutnya"/>
        </fieldset>		
		<fieldset>
        	<div class="form-card">
				<div class="row">
					<div class="col-12">
					<br>
						<label class="pay">Wilayah Tempat Tinggal <b class = "require">*</b></label>
						<textarea name = "wilayah" id = "wilayah"></textarea>
					</div>
				</div>	
			</div>
          	<input type="button" name="previous" class="previous action-button-previous" value="Sebelumnya" />
          	<input type="button" name="next" class="next action-button" value="Selanjutnya"/>	
         </fieldset>

		 <fieldset>
        	<div class="form-card">
				<div class="row">
					<div class="col-12" style = "font-size:20px !important; font-weight:bold; text-align:center">
						Informasi Pengguna
					</div>
					<br>
					<br>
		
					<div class="col-12" style = "text-align:center">
						Setelah menekan tombol selesai pada form Skrining Awal Pasien Rawat Jalan, file pdf akan terdownload secara otomatis.
					</div>
					<br>
					<br>
					<div class="col-12" style = "text-align:center">
						Silakan cek pada menu download browser diperangkat anda.
					</div>
				</div>	
			</div>
          	<input type="submit" name="next" class="next selesai-button" value="Selesai"/>	
         </fieldset>


		 <fieldset>
          <div class="form-card">
           <h2 class="fs-title text-center">Berhasil disimpan.!</h2>
           <br /><br />
           <div class="row justify-content-center">
            <div class="col-3">
             <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"/>
            </div>
           </div>
           <br /><br />
           <div class="row justify-content-center">
            <div class="col-7 text-center">
             <!-- <h5>You Have Successfully Signed Up</h5> -->
            </div>
           </div>
          </div>
         </fieldset>		 
        </form>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/select2.full.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/js.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="https://adminlte.io/themes/v3/plugins/jquery-validation/additional-methods.min.js"></script>
  
	<script>

		function hide_alergi(){
			document.getElementById("rapid").style.display = "none";
			document.getElementById("rapid_hasil").style.display = "none";

			$("#tgl_rapid").val("");
			$("#hasil_rapid").val("");
		}

		$(document).on("change", ".pilih-alergi", function() {
			var  pilih_rapid = $("input[name='rapid_test']:checked").val();			
			if(pilih_rapid=="Ya"){
				document.getElementById("rapid").style.display = "flex";
				document.getElementById("rapid_hasil").style.display = "flex";
			}else{
				hide_alergi();
			}
		});


		function hide_pcr(){
			document.getElementById("pcr").style.display = "none";
			document.getElementById("pcr_hasil").style.display = "none";

			$("#tgl_pcr").val("");
			$("#hasil_pcr").val("");
		}

		$(document).on("change", ".pilih_pcr ", function() {
			var  pilih_pcr = $("input[name='pcr']:checked").val();			

			if(pilih_pcr=="Ya"){
				document.getElementById("pcr").style.display = "flex";
				document.getElementById("pcr_hasil").style.display = "flex";
			}else{
				hide_pcr();
			}
		});


		function hide_kontak(){
			document.getElementById("kontak").style.display = "none";

			$("#sebutkan_kontak").val("");
		}

		$(document).on("change", ".pilih_kontak ", function() {
			var  pilih_kontak = $("input[name='kontak']:checked").val();			

			if(pilih_kontak=="Ya"){
				document.getElementById("kontak").style.display = "flex";
			}else{
				hide_kontak();
			}
		});

		function hide_perjalanan(){
			document.getElementById("perjalanan").style.display = "none";
			$("#sebutkan_perjalanan").val("");
		}

		$(document).on("change", ".pilih_perjalanan ", function() {
			var  pilih_perjalanan = $("input[name='perjalanan']:checked").val();			

			if(pilih_perjalanan=="Ya"){
				document.getElementById("perjalanan").style.display = "flex";
			}else{
				hide_perjalanan();
			}
		});

		$(document).on("click", ".simpan", function() {
			var data = $('#msform').serialize();
			$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Home/Simpan'); ?>',
				data: data
			})	
			.done(function(data) {
				var i;
				var data = jQuery.parseJSON(data);
				// $('#golpas').html(data);
				// for(i=0; i<data.show.length; i++){
				// 	a++;
				// }
			});			
		});

		// $('#msform').validate({
		// 	rules: {
		// 		nama: {
		// 			required: true,
		// 		},
		// 		norm: {
		// 			required: true,
		// 		},
		// 		terms: {
		// 			required: true
		// 		},
		// 	},
		// 	messages: {
		// 		nama: {
		// 			required: "Nama tidak boleh kosong.!",
		// 			// email: "Please enter a vaild email address"
		// 		},
		// 		norm: {
		// 			required: "Norm tidak boleh kosong.!",
		// 		},
		// 		terms: "Please accept our terms"
		// 	},
		// 	errorElement: 'span',
		// 	errorPlacement: function (error, element) {
		// 	error.addClass('invalid-feedback');
		// 	element.closest('.form-group').append(error);
		// 	},
		// 	highlight: function (element, errorClass, validClass) {
		// 	$(element).addClass('is-invalid');
		// 	},
		// 	unhighlight: function (element, errorClass, validClass) {
		// 	$(element).removeClass('is-invalid');
		// 	}
		// });


	</script>

 </body>
</html>
