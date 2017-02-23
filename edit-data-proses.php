<?php
	
	if (isset($_POST['rubah'])) {
		include ("koneksi.php");

		$user_name = $_POST['user_name'];
		$id = $_POST['id'];
		$sandi	= $_POST['sandi'];
		
	   

	    // prepare data
	    //$info["cn"] = $user_name;
	    //$info["sn"] = $user_name;
	    //$info["objectclass"] = "inetOrgPerson";
	    //$info["userPassword"] = '{SHA}' . base64_encode(pack('H*',sha1($sandi)));;
	    //$info["uid"] = $user;

	    $modifs = [
    [
        "attrib"  => "uid",
        "modtype" => LDAP_MODIFY_BATCH_REPLACE,
        "values"  => ["$user_name"],
    ],
    [
        "attrib"  => "userPassword",
        "modtype" => LDAP_MODIFY_BATCH_REPLACE,
        "values"  => ['{SHA}' . base64_encode(pack('H*',sha1($sandi)));],
    ],
    
];
	    

	    if ($ldap_con) {
		    // bind with appropriate dn to give update access
		    $data = ldap_bind($ldap_con, $ldap_dn, $ldap_pass);
		    //$data = ldap_rename($ldap_con, "cn=mijo, $ldap_dn2", $id, "uid=encong",TRUE);
		    $data = ldap_modify_batch($ldap_con, "cn=$id, $ldap_dn2", $modifs);
		    echo "<script>alert('BERHASIL ....');</script>";
		    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}else{
			echo "<script>window.history.back()</script>";
		}
	}	
	
?>