<?php
	if (isset($_POST['tambah'])) {
		include ("koneksi.php");
		$hosta = "localhost";	//nama host
	$usera = "radius";	//username phpMyAdmin
	$passa = "mysqlsecret";	//password phpMyAdmin
	$namea = "radius";	//nama database

	$koneksi = mysql_connect($hosta, $usera, $passa) or die("Koneksi ke database gagal!");
	mysql_select_db($namea, $koneksi) or die("Tidak ada database yang dipilih!");

		$user_name = $_POST['user_name'];
		$sandi	= $_POST['sandi'];
	   

	    // prepare data
	    $info["cn"] = $user_name;
	    $info["sn"] = $user_name;
	    $info["objectclass"] [0]= "inetOrgPerson";
	    $info["objectclass"] [1]= "radiusprofile";
	    $info["userPassword"] = '{SHA}' . base64_encode(pack('H*',sha1($sandi)));;
	    $info["uid"] = $user_name;
	    $UserName		= $user_name;
		$Attribute		= "Password";	
		$op			= "==";	
		$Value			= $sandi;

	    // add data to directory
	   

	    if ($ldap_con) {
		    // bind with appropriate dn to give update access
		    $data = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
		    $data = ldap_add($ldap_con, "cn=$user_name, $ldap_dn2", $info);
		    $input = mysql_query("INSERT INTO radcheck VALUES(NULL, '$UserName', '$Attribute', '$op', '$Value')");
		    echo "<script>alert('BERHASIL ....');</script>";
		    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}else{
			echo "<script>window.history.back()</script>";
		}
	}
?>
