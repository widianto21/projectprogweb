<article class="topcontent">
	<header><h2>Update Data Pasien</h2></header>
	<content>
		<div class="input_table">
			<?php foreach($pasien as $u){ ?>
			<form action="<?php echo base_url(). 'petugas/update'; ?>" method="post">	
				<table>
				<tr>
					<td class="title"><label>ID Pasien</label></td>
					<td><input type="text" name="txtidpasien" value = "<?php echo $u->ID_PASIEN ?>" readonly/></td>
				</tr>
				<tr>
					<td class="title"><label>Nama Pasien</label></td>
					<td><input type="text" name="txtnamapasien" value = "<?php echo $u->NAMA_PASIEN ?>"/></td>
				</tr>
				
					<td class="title"><label>Jenis Kelamin</label></td>
					<td>
						<input type="radio" name="jk" value="Laki-laki" <?php echo ($u->JENIS_KELAMIN=='Laki-laki')?'checked':''?> >Laki-laki</input>
						<input type="radio" name="jk" value="Perempuan" <?php echo ($u->JENIS_KELAMIN=='Perempuan')?'checked':''?> >Perempuan</input>
					</td>

					
				</tr>
				<tr>
					<td class="title"><label>Tempat Lahir</label></td>
					<td><input type="text" name="tempatlahir" value = "<?php echo $u->TEMPAT_LAHIR ?>"/></td>
				</tr>
				<tr>
					<td class="title"><label>Tanggal Lahir</label></td>
					<td><input type="date" name="tanggallahir" value = "<?php echo $u->TGL_LAHIR ?>"/></td>
				</tr>
				</tr>
				<tr>
					<td class="title"><label>Agama</label></td>
					<td><select name="agama">
							<option name="" value="">--Pilih Agama--</option>
							<option name="" value="Islam" <?php if( $u->AGAMA=='Islam'){echo "selected"; } ?> >Islam</option>
							<option name="" value="Kristen" <?php if( $u->AGAMA=='Kristen'){echo "selected"; } ?>>Kristen</option>
							<option name="" value="Katolik" <?php if( $u->AGAMA=='Katolik'){echo "selected"; } ?>>Katolik</option>
							<option name="" value="Hindu" <?php if( $u->AGAMA=='Hidu'){echo "selected"; } ?>>Hindu</option>
							<option name="" value="Budha" <?php if( $u->AGAMA=='Budha'){echo "selected"; } ?>>Budha</option>
						</select></td>
				</tr>
				<tr>
					<td class="title"><label>Alamat</label></td>
					<td><textarea name="alamat"><?php echo $u->ALAMAT_PASIEN ?></textarea> </td>
				</tr>

				<tr>
					<td class="title"><label>No Telepon</label></td>
					<td><input type="number" name="txtnotelp" value = "<?php echo $u->NO_TELP ?>"></input> </td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Ubah Data"/></td>
				</tr>
			</table>
		</form>
		<?php } ?>
			<div id="result"></div>
		</div>
		
	</content>
</article>