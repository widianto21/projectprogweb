<table>
	<tr>
		<th colspan="2">Data Dokter</th>
	</tr>
	<tr>	
		<td class="title"><label>ID Dokter</label></td>
		<td><input type="text" name="txtId" readonly="readonly" value="<?php echo $id_dokter;?>" /></td>
	</tr>
	<tr>
		<td class="title"><label>Nama</label></td>
		<td><input type="text" name="txtNama"/></td>
	</tr>
	<tr>
		<td class="title"><label>No. Telpon</label></td>
		<td><input type="text" name="txtNoTelp"/></td>
	</tr>
	<tr>
		<td class="title"><label>Alamat</label></td>
		<td><textarea name="txtAlamat" cols="40"></textarea></td>
	</tr>
	<tr>
		<td class="title"><label>Poliklinik</label></td>
		<td>
			<select name="txtPoliklinik">
				<option value="null">-- pilih -- </option>
			</select>
		</td>
	</tr>