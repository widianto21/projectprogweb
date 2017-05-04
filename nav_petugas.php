	<aside class="top-sidebar">
  	 	<div class="dropdown">
	  		<button class="dropbtn" onclick="location.href='<?php echo base_url();?>Petugas';">Home</button>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn">Pendaftaran Pasien</button>
	  		<div class="dropdown-content">
			    <a href="<?php echo base_url();?>petugas/tambah">Input Pasien Baru</a>
			    <a href="<?php echo base_url();?>petugas/">Manage Data Pasien</a>
	  		</div>
		</div>

		<div class="dropdown">
	  		<button class="dropbtn">Daftar Berobat</button>
	  		<div class="dropdown-content">
			    <a href="<?php echo base_url();?>petugas/tambah_daftar_berobat">Tambahkan ke antrian</a>
			    <a href="<?php echo base_url();?>petugas/lihat_antrian">Lihat Antrian</a>
	  		</div>
		</div>
	</aside>
	<div class="mainContent">
		<div class="content">