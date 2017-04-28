<article class="topcontent">
	<header><h2>Management User - > Input Perawat</h2></header>
	<content>
		<div class="input_table">
		<form method="post" id="form_input" action="<?php echo base_url();?>admin/input_data_perawat">
		<?php 
			if(isset($msg)){
				echo $msg;
			}
		?>
		<table>
			<tr>
				<th colspan="2">
					Data Perawat
				</th>
			</tr>
			<tr>	
				<td class="title"><label>Id Perawat</label></td>
				<td><input type="text" name="txtId" readonly="readonly" value="<?php echo $id_perawat;?>" /></td>
			</tr>
			<tr>
				<td class="title"><label>Nama</label></td>
				<td><input type="text" name="txtNama" value="<?php if(!isset($msg))echo set_value('txtNama');?>"/><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>No. Telpon</label></td>
				<td><input type="text" name="txtNoTelp" value="<?php if(!isset($msg))echo set_value('txtNoTelp');?>"/><?php echo form_error('txtNoTelp');?><?php echo form_error('txtNama');?></td>
			</tr>
			<tr>
				<td class="title"><label>Alamat</label></td>
				<td><textarea name="txtAlamat" cols="40" value="<?php if(!isset($msg))echo set_value('txtAlamat');?>"><?php echo form_error('txtAlamat');?></textarea></td>
			</tr>