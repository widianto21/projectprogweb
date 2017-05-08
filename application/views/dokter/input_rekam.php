<article class="topcontent">
	<header><h2>Pasien - > Input Rekam Medik</h2></header>
	<content>
		<div class="input_table">
			<?php 
				if(isset($msg)){
					echo $msg;
				}
			?>
	<form method="post" id="form_input" action="<?php echo base_url();?>dokter/input_rekam_medik">
		<table>
			<tr>
				<th colspan="2">Data Dokter</th>
			</tr>
			<tr>	
				<td class="title"><label>Id Rekam Medik</label></td>
				<td><input type="text" name="txtIdRekam" readonly="readonly" value="<?php echo $kode_rekam;?>" /></td>
			</tr>
			<tr>
				<td class="title"><label>Data Pasien</label></td>
				<td>ID Pasien <input type="text" name="txtIdPasien" class="short" readonly="readonly" value="<?php echo $data_rekam[0]['ID_PASIEN'];?>"/><?php echo "<br/>Nama : ".$data_rekam[0]['NAMA_PASIEN']."<br/>No. Pendaftar : <input type=\"text\" class=\"short\" name=\"txtNoPendaftaran\" readonly=\"readonly\" value=\"". $data_rekam[0]['NO_PENDAFTARAN']."\"";?>
				</td>
			</tr>
			<tr>
				<td class="title"><label>TGL. Berobat</label></td>
				<td><input type="text" class="input-2" name="txtTglBerobat" readonly="readonly" value="<?php echo date('d-m-Y',strtotime($data_rekam[0]['TGL_BEROBAT']));?>"/><?php echo form_error('txtTglBerobat');?></td>
			</tr>
			<tr>
				<td class="title"><label>Keluhan</label></td>
				<td><textarea name="txtKeluhan" cols="40"><?php echo set_value('txtKeluhan');?></textarea><?php echo form_error('txtKeluhan');?></td>
			</tr>
			<tr>
				<td class="title"><label>Pengobatan</label></td>
				<td><textarea name="txtPengobatan" cols="40" ><?php echo set_value('txtPengobatan');?></textarea><?php echo form_error('txtPengobatan');?></td>
			</tr>
			<tr>
				<td class="title"><label>Resep</label></td>
				<td><textarea name="txtResep" cols="40"><?php echo set_value('txtResep');?></textarea><?php echo form_error('txtResep');?></td>
			</tr>
			<tr>
				<td class="title"><label>Tagihan</label></td>
				<td><input type="text" name="txtTagihan" value="<?php echo set_value('txtTagihan');?>"/><?php echo form_error('txtTagihan');?></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
			</tr>
		</table>
	</form>
</div>
</content>
</article>