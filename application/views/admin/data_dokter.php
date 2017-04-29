<article class="topcontent">
	<header><h2>Management User - > Data Dokter</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
		<table>
			<?php if(isset($data_dokter)){?>
				<tr>
					<td class="img"><img src="<?php echo base_url();?>/assets/css/dokter.png"></td>
					<td>
						<table class="tbl_data">
							<tr><th>ID DOKTER</th><td><?php echo $data_dokter[0]['ID_DOKTER']?></td></tr>
							<tr><th>NAMA</th><td><?php echo $data_dokter[0]['NAMA']?></td></tr>
							<tr><th>ALAMAT</th><td><?php echo $data_dokter[0]['ALAMAT']?></td></tr>
							<tr><th>No. Telp</th><td><?php echo $data_dokter[0]['NO_TELP']?></td></tr>
							<tr><th>Poliklinik</th><td><?php echo $data_dokter[0]['NAMA_POLI']?></td></tr>
						</table>
					</td>
				</tr>
				<table class="jadwal">
				<h4>JADWAL PRAKTEK</h4>
				<button class="button" onclick="location.href='<?php echo base_url();?>admin/show_input_jadwal/<?php echo $data_dokter[0]['ID_DOKTER']?>';">Tambah Jadwal</button>
				<tr>
					<th>Id Jadwal</th>
					<th>Awal Praktek</th>
					<th>Akhir Praktek</th>
					<th>Hari</th>
					<th>Ruangan</th>
					<th>ACTION</th>
				</tr>
					<?php 
						if(isset($data_jadwal)){
							if($data_jadwal != "kosong"){
								foreach ($data_jadwal as $row) {
									echO "<tr><td>".$row['ID_JADWAL']."</td>
									<td>".$row['JAM_AWAL']."</td>
									<td>".$row['JAM_AKHIR']."</td>
									<td>".$row['HARI']."</td>
									<td>".$row['RUANGAN']."</td>
									<td><div class=\"action\"><a href=\"". base_url()."admin/show_update_jadwal/".$row['ID_JADWAL']."\">Edit</a> | <a href=\"". base_url()."admin/delete_jadwal/".$row['ID_JADWAL']."/".$data_dokter[0]['ID_DOKTER']."\">Delete</a></div></td></tr>";
								}
							}else{
								echo "<tr><td colspan=\"6\"> kosong</td><tr>";
							}
						}
					?>
				</table>
			<?php }?>
		</table>
	</content>
</article>