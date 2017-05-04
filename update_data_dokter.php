<article class="topcontent">
	<header><h2>Management User - > Input Dokter</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
	<form method="post" id="form_input" action="<?php echo base_url();?>admin/input_data_dokter/1">
		<table>
			<tr>
				<th colspan="2">Data Dokter</th>
			</tr>
			<tr>	
				<td class="title"><label>ID Dokter</label></td>
				<td><input type="text" name="txtId" readonly="readonly" value="<?php echo $data_dokter[0]['ID_DOKTER'];?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>Nama</label></td>
				<td><input type="text" name="txtNama" value="<?php echo $data_dokter[0]['NAMA'];?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>No. Telpon</label></td>
				<td><input type="text" name="txtNoTelp" value="<?php echo $data_dokter[0]['NO_TELP'];?>"/><?php echo form_error('txtNoTelp');?></td>
			</tr>
			<tr>
				<td class="title"><label>Alamat</label></td>
				<td><textarea name="txtAlamat" cols="40" ><?php echo $data_dokter[0]['ALAMAT'];?></textarea><?php echo form_error('txtAlamat');?></td>
			</tr>
			<tr>
				<td class="title"><label>Poliklinik</label></td>
				<td>
					<select name="txtPoliklinik">
						<option value="null">-- pilih -- </option>
						<?php 
							foreach ($data_poliklinik as $row){
								if($row['ID_POLI'] == $data_dokter[0]['ID_POLI']){
									echo "<option value=\"".$row['ID_POLI']."\" selected=\"selected\">".$row['NAMA_POLI']."</option>";
									continue;
								}
								echo "<option value=\"".$row['ID_POLI']."\">".$row['NAMA_POLI']."</option>";
							}
						?>
					</select>
				</td>
			</tr>		
			<tr>
				<th colspan="2">Data Account</th>
			</tr>
			<tr>
				<td class="title"><label>ID User</label></td>
				<td><input type="text" name="txtIDUser" readonly="readonly" value="<?php echo $data_dokter[0]['ID_USER'];?>"/><?php echo form_error('txtIDUser');?></td>
			</tr>
			<tr>
				<td class="title"><label>Username</label></td>
				<td><input type="text" name="txtUsername" value="<?php echo $data_dokter[0]['USERNAME'];?>"/><?php echo form_error('txtUsername');?></td>
			</tr>
			<tr>
				<td class="title"><label>Password</label></td>
				<td><input type="password" name="txtPassword" value="<?php echo $data_dokter[0]['PASSWORD'];?>"/><?php echo form_error('txtPassword');?></td>
			</tr>
			<tr>
				<td class="title"><label>Tipe</label></td>
				<td><input type="text" name="txtTipe" readonly="readonly" value="<?php echo $data_dokter[0]['TIPE'];?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
			</tr>
		</table>
	</content>
</article>