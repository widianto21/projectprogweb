	<aside class="top-sidebar">
		<p>Menu</p>
  	 	<div class="dropdown">
	  		<button class="dropbtn" onclick="location.href='<?php echo base_url();?>admin';">Home</button>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn">Management User</button>
	  		<div class="dropdown-content">
			    <a href="<?php echo base_url();?>admin/show_input_user">Input Akun</a>
			    <a href="<?php echo base_url();?>admin/show_view_user">Manage Akun User</a>
	  		</div>
		</div>
		<div class="dropdown">
	  		<button class="dropbtn">Data Dokter</button>
	  		<div class="dropdown-content">
			    <a href="<?php echo base_url();?>admin/show_input_poliklinik">Manage Data Dokter</a>
			    <a href="<?php echo base_url();?>admin/show_view_poliklinik">Input Jadwal</a>
			    <a href="<?php echo base_url();?>admin/show_view_poliklinik">Manage Jadwal</a>
	  		</div>
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