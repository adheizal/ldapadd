<!DOCTYPE html>
<html>
<head>
	<title>LDAP</title>
	<meta charset="utf-8">
	<?php
		include("navbar.php");
	?>
</head>
<body>
	<div class="container">
		<div class="row">
		<?php

			include("koneksi.php");
			
		
			if (ldap_bind($ldap_con,$ldap_dn,$ldap_pass)) {
				$cari = "(uid=*)";
				$hasil = ldap_search($ldap_con, $dn, $cari) or exit("tidak ada data");
				$data = ldap_get_entries($ldap_con, $hasil);
		       
		       
		        // iterate over array and print data for each entry
		        echo '<h3>Show me the users</h3></br>';

		        echo "
		        	<div class='container'>
		        	<div class='row'>
		        		<div class='col-md-3'>
		        		<a href='tambah-data.php' class='btn btn-default' role='button'>Tambah</a></div>
		        		<div class=' col-md-5 '>
			        		<form action='' methos='POST'>
			        			<input type='text' name='input_cari' placeholder='Masukan User'>
			        			<input type='submit' name='cari' class='btn btn-default' value='Cari'>
			        		</form>			        	
		        		</div>
		        		
		        	</div>
		        	</div>
		        	";

		        //$input_cari = $_POST['input_cari'];
		        //$cari = $_POST['cari'];

		        
		        echo "<table class='table table-bordered'>";
			        echo "<tr class='info'>";
			        	echo "<th>No</th>";
			        	echo "<th>User Name</th>";
			        	echo "<th>Opsi</th>";
			        echo "</tr>";
			        $no=1;
			        for ($i=0; $i<$data["count"]; $i++) {			        	
			        echo "<tr>";
			        	echo '<td>'.$no.'</td>';
			        	echo '<td>'.$data[$i]["uid"][0].'</td>';
			        	echo '<td><a href="edit-data.php?id='.$data[$i]["cn"][0].'">edit</a> / <a href="hapus.php?id='.$data["cn"].'" onclick="return confirm(\'Yakin?\')">hapus</a></td>';
			        echo "</tr>";
			        $no++;
			    	}
		        echo "</table>";
		    
			}else{
				echo "gagal broooo";
			}

		?>
	</div>
	</div>
</body>
</html>