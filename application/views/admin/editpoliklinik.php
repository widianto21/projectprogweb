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
			url = "<?php echo base_url();?>admin/get_data_user";
			xmlHttp.onreadystatechange = stateChanged;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
		else{
			url = "<?php echo base_url();?>admin/get_single_user		/" + STR;
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
	<header><h2>Management User - > view User</h2></header>
	<content>
			CARI <input type="text" id="search" name="search" onkeydown="get_list(document.getElementById('search').value)" /><button class="search" onClick="get_list(document.getElementById('search').value)">Cari</button>
		<div id="result">
		</div>
	</content>
</article>