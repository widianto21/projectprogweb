<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Poliklinik</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/update_data_poli">
			<table>
				<tr>
					<th colspan="2">Jenis User</th>
				</tr>
				<tr>
					<td class="title"><label>ID Poliklinik</label></td>
					<td><input type="text" readonly="readonly" name="txtIdPoli" value="<?php echo $result[0]['ID_POLIKLINIK'];?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Nama Poliklinik</label></td>
					<td><input type="text" name="txtNamaPoli" value="<?php echo $result[0]['NAMA_POLIKLINIK'];?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Ruangan</label></td>
					<td>
						<select name="txtRuangan">
							<option value="R.001" <?php if($result[0]['RUANGAN'] == "R.001") echo "selected=\"selected\"";?>> Ruangan 1</option>
							<option value="R.002" <?php if($result[0]['RUANGAN'] == "R.002") echo "selected=\"selected\"";?>> Ruangan 2</option>
							<option value="R.003" <?php if($result[0]['RUANGAN'] == "R.003") echo "selected=\"selected\"";?>> Ruangan 3</option>
							<option value="R.004" <?php if($result[0]['RUANGAN'] == "R.004") echo "selected=\"selected\"";?>> Ruangan 4</option>
							<option value="R.005" <?php if($result[0]['RUANGAN'] == "R.005") echo "selected=\"selected\"";?>> Ruangan 5</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="title"><label>Spesialis</label></td>
					<td><input type="text" name="txtSpesialis" value="<?php echo $result[0]['SPESIALIS'];?>"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Update"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>