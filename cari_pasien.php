<script type="text/javascript">
	var xmlHttp;

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

<table>
	<tr>
		<td>Masukkan ID Pasien <input class="input-2" type="text" id="search" name="search"/> <button class="search" onClick="get_data_pasien(document.getElementById('search').value)">Cari</button></td>
	</tr>
	<tr>
		<td><div id="res">
		</div></td>
	</tr>
</table>
 

