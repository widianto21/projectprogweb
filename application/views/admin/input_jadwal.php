<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Poliklinik</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/input_data_jadwal">
			<table>
				<?php
					echo "<div style=\"color:red; \">".validation_errors();
				?>
				<?php
					if(isset($msg)){
						if($msg != ""){
							echo "<tr>
									<td colspan=\"2\">".$msg."</td>
								</tr>";
							}		
						}
				?>
				<tr>
					<th colspan="2">Jenis User</th>
				</tr>
				<tr>
					<td class="title"><label>ID JADWAL</label></td>
					<td><input type="text" readonly="readonly" name="txtIdJadwal" value="<?php echo $kode;?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Dokter</label></td>
					<td><input type="text" class="input-invisible" readonly="readonly" name="txtIdDokter" value="<?php echo $data_dokter[0]['ID_DOKTER'];?>"/> | <?php echo $data_dokter[0]['NAMA'];?></td>
				</tr>
				<tr>
					<td class="title"><label>Hari Praktek</label></td>
					<td><select name="txtHari">
						<option value="Senin">Senin</option>
						<option value="Selasa">Selasa</option>
						<option value="Rabu">Rabu</option>
						<option value="Kamis">Kamis</option>
						<option value="Jumat">Jum'at</option>
					</select></td>
				</tr>
				<tr>
					<td class="title"><label>RUANGAN</label></td>
					<td><input type="text"  name="txtRuangan"/></td>
				</tr>
				<tr>
					<td class="title"><label>JAM PRAKTEK</label></td>
					<td><input class="input_jam" type="text" maxlength="5" name="txtJamAwal" value="<?php set_value('txtJamAwal');?>"/> - <input class="input_jam" type="text" maxlength="5" name="txtJamAkhir"  value="<?php set_value('txtJamAkhir');?>"/> * FORMAT : HH : MM</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>