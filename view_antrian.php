<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data Pasien</title>
</head>
<body>
<article class="topcontent">
	<header><h2>Daftar Antrian</h2></header>
		<table border="1" width="600px" auto>
		<tr>
			<th>No. Antrian</th>
			<th>ID Pasien</th>
			<th>ID Jadwal</th>
			<th>Tanggal Berobat</th>
			<th>Jam Daftar</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($daftar_berobat as $u){ 
		?>
		<tr>
			<td><?php echo $u['NO_ANTRIAN'];?></td>
			<td><?php echo $u['ID_PASIEN'];?></td>
			<td><?php echo $u['ID_JADWAL']?></td>
			<td><?php echo $u['TGL_BEROBAT'];?></td>
			<td><?php echo $u['JAM_DAFTAR'];?></td>
			
			<td>
                  <?php echo anchor('petugas/hapus_antrian/'.$u['NO_PENDAFTARAN'],'Hapus dari antrian'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
		
	</content>
</article>

</body>
</html>
