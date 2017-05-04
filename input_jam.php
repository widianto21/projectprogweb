<article class="topcontent">
	<header><h2>Manage Poliklinik -> Input Jam</h2></header>
	<content>
		<div class="input_table">
			<form method="post" action="<?php echo base_url()?>admin/input_data_jam">
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
					<td class="title"><label>ID JAM PRAKTEK</label></td>
					<td><input type="text" readonly="readonly" name="txtIdJam" value="<?php echo $kode;?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>JAM PRAKTEK</label></td>
					<td><input class="input_jam" type="text" name="txtJamAwal"/> - <input class="input_jam" type="text" name="txtJamAkhir"/></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Tambahkan"/></td>
				</tr>
			</table>
		</div>
	</content>
</article>