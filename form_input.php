<table>
	<tr>
		<th class="title" style="border-top: 1px solid black;" colspan="2"><label>Input Pasien</label></th>
	</tr>
	<tr>
		<td class="title"><label>ID Pasien</label></td>
		<td><input id="txtIdPasien" type="text" name="txtidpasien" value="<?php echo $ID_PASIEN;?>"/></td>
	</tr>
	<tr>
		<td class="title"><label>Nama Pasien</label></td>
		<td><input type="text" name="txtnamapasien"/></td>
	</tr>
	<tr>
		<td class="title"><label>Jenis Kelamin</label></td>
		<td>
			<input type="radio" name="jk" value="Laki-laki">Laki-laki</input>
			<input type="radio" name="jk" value="Perempuan">Perempuan</input>
		</td>
	</tr>
	<tr>
		<td class="title"><label>Tempat Lahir</label></td>
		<td><input type="text" name="tempatlahir"/></td>
	</tr>
	<tr>
		<td class="title"><label>Tanggal Lahir</label></td>
		<td><input type="date" name="tanggallahir"/></td>
	</tr>

	<tr>
		<td class="title"><label>Agama</label></td>
		<td><select name="agama">
				<option name="" value="">--Pilih Agama--</option>
				<option name="" value="Islam">Islam</option>
				<option name="" value="Kristen">Kristen</option>
				<option name="" value="Katolik">Katolik</option>
				<option name="" value="Hindu">Hindu</option>
				<option name="" value="Budha">Budha</option>
			</select></td>
	</tr>
	<tr>
		<td class="title"><label>Alamat</label></td>
		<td><textarea name="alamat"></textarea> </td>
	</tr>

	<tr>
		<td class="title"><label>No Telepon</label></td>
		<td><input type="number" name="txtnotelp"></input> </td>
	</tr>
</table>