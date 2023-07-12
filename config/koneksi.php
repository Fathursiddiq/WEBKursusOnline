<?php

	$db = new mysqli("localhost","root","","dbkursus");
	if($db->connect_errno > 0)
		echo "Ada Masalah dengan database atau koneksi";

?>	