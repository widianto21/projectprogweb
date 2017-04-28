	<aside class="top-sidebar">
		<p>Menu</p>
  	 	<div class="dropdown">
	  		<button class="dropbtn" onclick="location.href='<?php echo base_url();?>admin';">Home</button>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn">User</button>
	  		<div class="dropdown-content">
			    <a href="<?php echo base_url();?>admin/show_view_user">Data User</a>
			    <a href="<?php echo base_url();?>admin/show_input_dokter">Input Dokter</a>
			    <a href="<?php echo base_url();?>admin/show_input_perawat">Input Perawat</a>
	  		</div>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn" onclick="location.href='<?php echo base_url();?>admin/show_view_dokter';">Dokter</button>
	  		<div class="dropdown-content">
			    <!-- <a href="<?php echo base_url();?>admin/show_view_dokter">Data Dokter</a> -->
			    <!-- <a href="<?php echo base_url();?>admin/show_view_jam">Jam Praktek</a>
			    <a href="<?php echo base_url();?>admin/show_view_poliklinik">Manage Jadwal</a> -->
	  		</div>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn" onclick="location.href='<?php echo base_url();?>admin/show_view_poliklinik';">Poliklinik</button>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn">Jadwal Praktek</button>
	  		<div class="dropdown-content">
			    <a href="#">Link 1</a>
			    <a href="#">Link 2</a>
			    <a href="#">Link 3</a>
	  		</div>
		</div>
	</aside>
	<div class="mainContent">
		<div class="content">