<script type="text/javascript">
	var xmlHttp;
	var no_antrian;
	var id_jadwal;
	function get_data_pasien(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "";
		if(STR){
			// url = "<?php echo base_url();?>admin/get_data_dokter";
			// xmlHttp.onreadystatechange = stateChanged;
			// xmlHttp.open("GET",url,true);
			// xmlHttp.send(null);

			url = "<?php echo base_url();?>petugas/get_single_pasien/" + STR;
			xmlHttp.onreadystatechange = completeFetch;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
		else{
			
		}
	}

	function startTime() {
	    var today = new Date();
	    var h = today.getHours();
	    var m = today.getMinutes();
	    var s = today.getSeconds();
	    m = checkTime(m);
	    s = checkTime(s);
	    document.getElementById('jamdaftar').value =
	    h + ":" + m + ":" + s;
	    var t = setTimeout(startTime, 500);
	}
	function checkTime(i) {
	    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
	    return i;
	}
	

	function completeFetch(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			if(xmlHttp.responseText != "kosong"){
				document.getElementById("res").innerHTML=xmlHttp.responseText;
				var id = document.getElementById('search').value;
				document.getElementById("txtId").value = id;
			}else{document.getElementById("res").innerHTML=xmlHttp.responseText;}
		}
	}
	function get_pasien(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		if(STR!=""){
			var url = "<?php echo base_url();?>petugas/tampil_pasien/" + STR;
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
	}

	function get_dokter(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "<?php echo base_url();?>petugas/show_list_dokter/";
		xmlHttp.onreadystatechange = stateChangedDokter;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}

	function get_jenis(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		if(STR == 'lama'){
			url = "<?php echo base_url();?>petugas/show_form_cari/";
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}else if(STR == 'baru'){
			url = "<?php echo base_url();?>petugas/show_form_new/";
			xmlHttp.onreadystatechange = stateChanged1;

			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
	}

	function get_no_antrian(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		if(STR != ""){
			url = "<?php echo base_url();?>petugas/get_no_antrian/"+STR;
			xmlHttp.onreadystatechange = stateChangeJadwal;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
	}

	function get_jadwal(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "";
		if(STR!=""){
			url = "<?php echo base_url();?>petugas/check_jadwal/" + STR;
			xmlHttp.onreadystatechange = stateChangedDokter;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);

		}
	}

	function get_no_antrian(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "";
		if(STR!=""){
			url = "<?php echo base_url();?>petugas/get_no_antrian/" + STR;
			xmlHttp.onreadystatechange = stateChangedJadwal;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);

		}	
	}

	function stateChanged(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("jenis").innerHTML=xmlHttp.responseText;
			document.getElementById("form").innerHTML=null;
		}
	}
	function stateChangedDokter(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("dokter").innerHTML=xmlHttp.responseText;
			parser = new DOMParser();
			var doc = parser.parseFromString(xmlHttp.responseText, "text/html");
			id_jadwal= doc.querySelector("input").value;
			get_no_antrian(id_jadwal);
		}
	}
	function stateChangedJadwal(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("txtNoAntrian").value=xmlHttp.responseText;
		}
	}
	function stateDokter(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("result").innerHTML=xmlHttp.responseText;
			// no_antrian = document.getElementById('txtNoAntrian');
			
		}
	}


	function stateChanged1(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("form").innerHTML=xmlHttp.responseText;
			document.getElementById("jenis").innerHTML=null;
			var id = document.getElementById('txtIdPasien').value;
			document.getElementById("txtId").value = id;
			document.getElementById("form_input").action="<?php echo base_url(). 'petugas/tambah_daftar_berobat_aksi'; ?>/1";
		}
	}
	function GetXmlHttpObject(){
		var xmlHttp = null;
		try{
			xmlHttp = new XMLHttpRequest();
		}
		catch(e){
			try{
				xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
			}catch(e){
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		return xmlHttp;
	}
	function check(){
		document.getElementById("search").value="isi";
	}
</script>

<article class="topcontent" onload="setTime()">
	<header><h2>Daftar Berobat</h2></header>
	<content>
		<div class="input_table">
			<table>
				<tr>
					<th>
						Jenis Pasien
					</th>
					<th>
						<input type="radio" name="txtJnsPasien" value="lama" onclick="get_jenis(this.value);">Pasien Lama</input>
						<input type="radio" name="txtJnsPasien" value="baru" onclick="get_jenis(this.value);">Pasien Baru</input>
					</th>
				</tr>
			</table>
			<div id="jenis"></div>
			<form id="form_input" action="<?php echo base_url(). 'petugas/tambah_daftar_berobat_aksi'; ?>" method="post">	
				<table>
					<div id="form"></div>
					<tr>
						<th colspan="2">
							Form Pendaftaran
						</th>	
					</tr>
					<tr>
						<td class="title"><label>No. Pendaftaran</label></td>
						<td><input type="text" readonly="readonly" name="nopendaftaran" value="<?php echo $kode_pendaftaran;?>" /></td>
					</tr>
					<tr>
					<td>Klinik</td>
						<td>
							<select name="txtIdDokter" onChange="get_jadwal(this.value);">
								<?php
									foreach ($list_dokter as $row) {
										echo "<option value=\"".$row['ID_DOKTER']."\">".$row['NAMA']."|".$row['NAMA_POLI']."</option>";
									}
								?>
							</select>		
							<div id="dokter"></div>
							<div id="result"></div>
						</td>
					</tr>
					<tr>
						<td class="title"><label>ID Pasien</label></td>
						<td><input id="txtId" type="text" name="idpasien" readonly /></td>
					</tr>
					<tr>
						<td class="title"><label>Tanggal Berobat</label></td>
						<td><input type="date" name="tglberobat" value="<?php echo date('d/m/Y');?>" readonly/></td>
					</tr>
					<tr>
						<td class="title"><label>Jam Daftar</label></td>
						<td><input id="jamdaftar" type="text" name="jamdaftar" readonly />
						<script>startTime();</script></td>
					</tr>
					<tr>
						<td class="title"><label>No. Antrian</label></td>
						<td><input id="txtNoAntrian"type="text" name="noantrian"/></td>
					</tr>
					<!-- <tr>
						<td class="title"><label>Status</label></td>
						<td><input type="text" name="status"/></td>
					</tr> -->
					<tr>
						<td colspan="2"><input type="submit" name="submit" value="Tambah ke antrian"/></td>
					</tr>
				</table>
		</form>
			<div id="result"></div>
		</div>
	</content>
</article>