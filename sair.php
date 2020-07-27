<?php

	session_start();
	session_destroy();
	
	unset(
		$_SESSION['usuoarioId'],
		$_SESSION['usuoarioNome'],
		$_SESSION['usuoarioEmail'],
		$_SESSION['usuoarioSenha'],
		);
	
	header("Location: index.php")


?>