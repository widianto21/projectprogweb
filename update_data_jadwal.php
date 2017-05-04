<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Poliklinik</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/update_data_jadwal">
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
					<td><input type="text" readonly="readonly" name="txtIdJadwal" value="<?php echo $data_dokter[0]['ID_JADWAL'];?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Dokter</label></td>
					<td><input type="text" class="input-invisible" readonly="readonly" name="txtIdDokter" value="<?php echo $data_dokter[0]['ID_DOKTER'];?>"/> | <?php echo $data_dokter[0]['NAMA'];?></td>
				</tr>
				<tr>
					<td class="title"><label>Hari Praktek</label></td>
					<td><select name="txtHari">
						<?php 
							$arr_hari = 
							array(
								'Senin' => "<option value=\"Senin\">Senin</option>",
								'Selasa' => "<option value=\"Selasa\">Selasa</option>",
								'Rabu' => "<option value=\"Rabu\">Rabu</option>",
								'Kamis' => "<option value=\"Kamis\">Kamis</option>",
								'Jum\'at' => "<option value=\"Jumat\">Jum'at</option>"
							);
							foreach ($arr_hari as $key => $option){
								if($key == $data_dokter[0]['HARI']){
									$hari = substr($option, 0, 8) . "selected=\"selectec\" " . substr($option, 8);
									echo $hari;
									continue;
								}
								echo $option;
							}
						?>
					</select></td>
				</tr>
				<tr>
					<td class="title"><label>RUANGAN</label></td>
					<td><input type="text"  name="txtRuangan" value="<?php echo $data_dokter[0]['RUANGAN'];?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>JAM PRAKTEK</label></td>
					<td><input class="input_jam" type="text" maxlength="5" name="txtJamAwal" value="<?php echo date("H:i",strtotime($data_dokter[0]['JAM_AWAL']));?>"/> - <input class="input_jam" type="text" maxlength="5" name="txtJamAkhir" value="<?php echo date("H:i",strtotime($data_dokter[0]['JAM_AKHIR']));?>"/> * FORMAT : HH : MM</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>