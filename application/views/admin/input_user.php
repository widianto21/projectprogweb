<script>
	var xmlHttp;
	function get_input(STR){
		xmlHttp = GetXmlHttpObject();		
		if(xmlHttp == null){
			alert("Not Compatible");
			return;
		}
		var url = "";
		if(STR == "perawat"){
			url = "<?php echo base_url();?>admin/show_input_perawat";
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
		else if(STR == "dokter"){
			url = "<?php echo base_url();?>admin/show_input_dokter";
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
	<header><h2>Management User - > Input User</h2></header>
	<content>
		<div class="input_table">
			<form method="post">
			<table>
				<tr>
					<th colspan="2">Jenis User</th>
				</tr>
				<tr>
					<td><input type="radio" name="rbJenis" value="perawat" onclick="get_input(this.value);">Perawat</input></td>
					<td><input type="radio" name="rbJenis" value="dokter" onclick="get_input(this.value);">Dokter</input></td>
				</tr>
			</table>
			<div id="result"></div>
		</div>
		
	</content>
</article>