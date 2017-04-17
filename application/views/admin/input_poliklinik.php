<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Poliklinik</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/input_data_poli">
			<table>
				<?php if(isset($res)){
					echo "<tr>
							<th colspan=\"2\">Input Berhasil</th>
						</tr>";
				}
				?>
				<tr>
					<th colspan="2">Jenis User</th>
				</tr>
				<tr>
					<td class="title"><label>ID Poliklinik</label></td>
					<td><input type="text" readonly="readonly" name="txtIdPoli" value="<?php echo $kode;?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Nama Poliklinik</label></td>
					<td><input type="text" name="txtNamaPoli"/></td>
				</tr>
				<tr>
					<td class="title"><label>Ruangan</label></td>
					<td>
						<select name="txtRuangan">
							<option value="R.001"> Ruangan 1</option>
							<option value="R.002"> Ruangan 2</option>
							<option value="R.003"> Ruangan 3</option>
							<option value="R.004"> Ruangan 4</option>
							<option value="R.005"> Ruangan 5</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="title"><label>Spesialis</label></td>
					<td><input type="text" name="txtSpesialis"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>