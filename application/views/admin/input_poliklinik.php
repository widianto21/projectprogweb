<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Poliklinik</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/input_data_poliklinik">
			<table>
				<?php
					echo "<div style=\"color:red; \">".validation_errors();
				?>
				<?php
					if(isset($res)){
						if($res == TRUE){
							echo "<tr>
									<td colspan=\"2\">Input Berhasil</td>
								</tr>";
							}		
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
					<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>