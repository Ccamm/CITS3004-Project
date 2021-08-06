<?php
	$passhash=password_hash("supersecurelongpasswordnoonewillgetlol", PASSWORD_BCRYPT);
	echo $passhash;
?>
