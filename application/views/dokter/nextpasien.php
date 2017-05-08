<article class="topcontent">
	<header><h2>Pasien Selanjutnya</h2></header>
	<content>
		<?php 
			if(isset($msg)){
				echo "<div style=\"color:red;\">".$msg."</div>";
			}
			if(isset($data_antrian)){
				$data = $data_antrian[0];
				echo "
				<table style=\"border:1px solid black;\"class=\"tbl_data\">
					<tr>
						<th style=\"text-align:center;border:1px solid black;\"colspan=\"2\">Data Pasien</th>
					</tr>
					<tr>
						<th>ID Pasien</th>
						<td>".$data['ID_PASIEN']."</td>
					</tr>
					<tr>
						<th>Nama PasienPasien</th>
						<td>".$data['NAMA_PASIEN']."</td>
					</tr>
					<tr>
						<th>Jenis Kelamin</th>
						<td>".$data['JENIS_KELAMIN']."</td>
					</tr>
					<tr>
						<th>Tempat/Tanggal Lahir</th>
						<td>".$data['TEMPAT_LAHIR']."-". date("d/m/Y",strtotime($data['TGL_LAHIR']))."</td>
					</tr>
					<tr>
						<th>Agama</th>
						<td>".$data['AGAMA']."</td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>";
						if(isset($data['ALAMAT']))
							echo $data['ALAMAT'];
						else
							echo$data['ALAMAT_PASIEN'];
						echo "</td>
					</tr>
				</table>";
				?>
				<br/>
				<?php if(isset($data['NO_PENDAFTARAN']))
					echo "<button class=\"button\" onclick=\"location.href='".base_url()."dokter/show_input_rekam/".$data['ID_PASIEN']."/".$data['NO_PENDAFTARAN']."'\";\">Buat Rekam Medik</button><br/><br/>";
				?>
				
				<?php
				echo "<br/><table style=\"text-align:center;border:1px solid black;\">
					<tr>
						<th style=\"text-align:center;border:1px solid black;\"colspan=\"6\">Riwayat Berobat</th>";
						if(isset($riwayat)){
							if($riwayat == "kosong"){
								echo "<tr><td colspan=\"2\">Pasien belum memiliki riwayat berobat</td></tr>";
							}else{
								echo "<tr>
									<th>Tgl. Berobat</th>
									<th>Dokter</th>
									<th>Klinik</th>
									<th>Keluhan</th>
									<th>Pengobatan</th>
									<th>Resep</th>
								</tr>";
								foreach ($riwayat as $row) {
									echo "<tr>
										<td>".$row['TGL_BEROBAT']."</td>
										<td>".$row['NAMA']."</td>
										<td>".$row['NAMA_POLI']."</td>
										<td>".$row['KELUHAN']."</td>
										<td>".$row['PENGOBATAN']."</td>
										<td>".$row['RESEP']."</td>
									</tr>";
								}
							}
						}
				echo "</tr>
				</table>";
			}

		?>
		
	</content>
</article>