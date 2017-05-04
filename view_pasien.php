<!DOCTYPE html>
<html>
<head>
	<title>Lihat Data Pasien</title>
</head>
<body>
<article class="topcontent">
	<header><h2>Data Pasien</h2></header>
		<table border="1" width="600px" auto>
		<tr>
			<th>No</th>
			<th>ID Pasien</th>
			<th>Nama Pasien</th>
			<th>Jenis Kelamin</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Agama</th>
			<th>Alamat</th>
			<th>No. Telp</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($pasien as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->ID_PASIEN ?></td>
			<td><?php echo $u->NAMA_PASIEN ?></td>
			<td><?php echo $u->JENIS_KELAMIN ?></td>
			<td><?php echo $u->TEMPAT_LAHIR ?></td>
			<td><?php echo $u->TGL_LAHIR ?></td>
			<td><?php echo $u->AGAMA ?></td>
			<td><?php echo $u->ALAMAT_PASIEN ?></td>
			<td><?php echo $u->NO_TELP ?></td>
			
			<td>
		    	<?php echo "<a href=\"".base_url()."petugas/edit/".$u->ID_PASIEN."\">EDIT</a>";
                  echo " | <a href=\"".base_url()."petugas/hapus/".$u->ID_PASIEN."\" onclick=\"return confirm('Are you sure?')\">DELETE</a>"; ?>
			</td>
		</tr>
		<?php } ?>
	</table>
		
	</content>
</article>

</body>
</html>
