<article class="topcontent">
	<header><h2>Daftar Berobat</h2></header>
	<content>
		<div class="input_table">
			<form action="<?php echo base_url(). 'petugas/tambah_daftar_berobat_aksi'; ?>" method="post">	
				<table>
				<!-- <tr>
					<td class="title"><label>No. Antrian</label></td>
					<td><input type="text" name="noantrian"/></td>
				</tr> -->
				<tr>
					<td class="title"><label>ID Pasien</label></td>
					<td><input type="text" name="idpasien"/></td>
				</tr>
				<tr>
					<td class="title"><label>ID Jadwal</label></td>
					<td><input type="text" name="idjadwal" value="MG002"/></td>
				</tr>
				<tr>
					<td class="title"><label>Tanggal Berobat</label></td>
					<td><input type="date" name="tglberobat" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("m/d/Y"); ?>" /></td>
				</tr>
				<tr>
					<td class="title"><label>Jam Daftar</label></td>
					<td><input type="text" name="jamdaftar" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date("h:i:s"); ?>" readonly /></td>
				</tr>
					
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Tambah ke antrian"/></td>
				</tr>
			</table>
		</form>
			<div id="result"></div>
		</div>
		
	</content>
</article>