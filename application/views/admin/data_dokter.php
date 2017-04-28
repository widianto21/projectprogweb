<article class="topcontent">
	<header><h2>Management User - > Data Dokter</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
	<form method="post" id="form_input" action="<?php echo base_url();?>admin/input_data_dokter/1">
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
				<table>
				<h4>JADWAL PRAKTEK</h4>
				<button class="button" onclick="location.href='<?php echo base_url();?>admin/show_input_jadwal/<?php echo $data_dokter[0]['ID_DOKTER']?>">Tambah Jadwal</button>
					<?php 
						if(isset($data_jadwal)){
							if($data_jadwal != "kosong"){
								foreach ($data_jadwal as $row) {
									echO "<tr><td>".$row['ID_JADWAL']."</td></tr>";
									echO "<tr><td>".$row['JAM_AWAL']."</td></tr>";
									echO "<tr><td>".$row['JAM_AKHIR']."</td></tr>";
									echO "<tr><td>".$row['HARI']."</td></tr>";
									echO "<tr><td>".$row['RUANGAN']."</td></tr>";
								}
							}else{
								echo "kosong";
							}
						}
					?>
				</table>
			<?php }?>
		</table>
	</form>
	</content>
</article>