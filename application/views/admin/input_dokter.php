<article class="topcontent">
	<header><h2>Management User - > Input Dokter</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
	<form method="post" id="form_input" action="<?php echo base_url();?>admin/input_data_dokter">
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
				<td><input type="text" name="txtNama" value="<?php if(!isset($msg))echo set_value('txtNama');?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>No. Telpon</label></td>
				<td><input type="text" name="txtNoTelp" value="<?php if(!isset($msg))echo set_value('txtNoTelp');?>"/><?php echo form_error('txtNoTelp');?></td>
			</tr>
			<tr>
				<td class="title"><label>Alamat</label></td>
				<td><textarea name="txtAlamat" cols="40" value="<?php if(!isset($msg))echo set_value('txtAlamat');?>"></textarea><?php echo form_error('txtAlamat');?></td>
			</tr>
			<tr>
				<td class="title"><label>Poliklinik</label></td>
				<td>
					<select name="txtPoliklinik">
						<option value="null">-- pilih -- </option>
						<?php 
							foreach ($poli as $row) {
								if($row['ID_POLI'] == $data_dokter['ID_POLI']){
									echo "<option value=\"".$row['ID_POLI']."\" selected=\"selected\">".$row['NAMA_POLI']."</option>";
									continue;
								}
								echo "<option value=\"".$row['ID_POLI']."\">".$row['NAMA_POLI']."</option>";
							}
						?>
					</select>
				</td>
			</tr>