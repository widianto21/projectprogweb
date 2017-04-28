<article class="topcontent">
	<header><h2>Management User - > Input Dokter</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
	<form method="post" id="form_input" action="<?php echo base_url();?>admin/input_data_perawat/1">
		<table>
			<tr>
				<th colspan="2">Data Dokter</th>
			</tr>
			<tr>	
				<td class="title"><label>ID Dokter</label></td>
				<td><input type="text" name="txtId" readonly="readonly" value="<?php echo $data_perawat[0]['ID_PERAWAT'];?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>Nama</label></td>
				<td><input type="text" name="txtNama" value="<?php echo $data_perawat[0]['NAMA'];?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>No. Telpon</label></td>
				<td><input type="text" name="txtNoTelp" value="<?php echo $data_perawat[0]['NO_TELP'];?>"/><?php echo form_error('txtNoTelp');?></td>
			</tr>
			<tr>
				<td class="title"><label>Alamat</label></td>
				<td><textarea name="txtAlamat" cols="40" ><?php echo $data_perawat[0]['ALAMAT'];?></textarea><?php echo form_error('txtAlamat');?></td>
			</tr>
			<tr>
				<th colspan="2">Data Account</th>
			</tr>
			<tr>
				<td class="title"><label>ID User</label></td>
				<td><input type="text" name="txtIDUser" readonly="readonly" value="<?php echo $data_user[0]['ID_USER'];?>"/><?php echo form_error('txtIDUser');?></td>
			</tr>
			<tr>
				<td class="title"><label>Username</label></td>
				<td><input type="text" name="txtUsername" value="<?php echo $data_user[0]['USERNAME'];?>"/><?php echo form_error('txtUsername');?></td>
			</tr>
			<tr>
				<td class="title"><label>Password</label></td>
				<td><input type="password" name="txtPassword" value="<?php echo $data_user[0]['PASSWORD'];?>"/><?php echo form_error('txtPassword');?></td>
			</tr>
			<tr>
				<td class="title"><label>Tipe</label></td>
				<td><input type="text" name="txtTipe" readonly="readonly" value="<?php echo $data_user[0]['TIPE'];?>"/></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
			</tr>
		</table>
	</content>
</article>