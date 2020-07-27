<?php
include_once('conexao.php');
if(!$_SESSION['logado'])
{
	header("Location: index.php");
	exit();
}
?>
