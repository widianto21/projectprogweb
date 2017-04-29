<script type="text/javascript">
	var xmlHttp;
	get_list(null);
	function get_list(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "";
		if(!STR){
			url = "<?php echo base_url();?>dokter/get_list_antrian";
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
		else{
			url = "<?php echo base_url();?>dokter/get_specific_antrian/" + STR;
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
	}
	function stateChanged(){
		if(xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
			document.getElementById("result").innerHTML=xmlHttp.responseText;
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
<article class="topcontent">
	<header><h2>Antrian Pasien</h2></header>
	<content>
		<?php 
				if(isset($msg)){
					echo "<div style=\"color:red;\">".$msg."</div>";
				}
			?>
			
			<div class="little_text">Tekan Tombol "Pasien Selanjutnya" untuk mulai praktek</div>
			<button class="button" onclick="location.href='<?php echo base_url();?>dokter/show_berobat_pasien';">Pasien Selanjutnya</button>
		<div id="result">
		</div>
	</content>
</article>