<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
?>


<html lang="pt">
<head>
    <script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="img/icon.ico" type="image/ico">
    <link href="css/estilos.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Cade meu Marido?</title>
</head>
<body>

 <div id="container">
<div id="box">
	<form method="POST" action="validar.php">
	<br>
            <img src="img/logo.png" width="80%"> <br><br>
            <img id="iconLogin" src="img/user.png" width="20px" > 
		    <input type="text" name="loginUsu" placeholder="Login" required autofocus> <br><br>
            <img  id="iconPass"src="img/password.png" width="20px" >
            <input type="password" name="senha" placeholder="Senha" required> <br><br>
            <button type="submit">Acessar</button>
				<p>
            <?php
			//Recuperando o valor da variável global, os erro de login.
			if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }?>
        </p>
        <p>
            <?php 
			//Recuperando o valor da variável global, deslogado com sucesso.
            if(isset($_SESSION['logindeslogado'])){
                echo $_SESSION['logindeslogado'];
                unset($_SESSION['logindeslogado']);
            }
            ?>
        </p>
        </form>
 
 </div>
</div>
</body>
</html>