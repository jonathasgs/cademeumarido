<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
	include_once("conexao.php");
include_once('verificalogado.php');	

?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="icon" href="img/icon.ico" type="image/ico">
    <link href="css/estilos.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Rastreador</title>
</head>
<body>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
            $(function(){
                $("#btn-mensagem").click(function(){
                $("#modal-mensagem").modal();
                });
            });
                        
    </script> 
    <script type="text/javascript" src="js/code.js"></script>
    <?php include "header.php";?>
  
    
<?php

if (isset($_POST['cadastrar'])){
	
	$nome = $_POST["nomeUsu"];
	$telefone = $_POST["telefoneUsu"];
	$email = $_POST["emailUsu"];
	$senha = $_POST["senhaUsu"];
	$nivel = $_POST["nivel"];
	$login = $_POST["loginUsu"];
	
	$sql="insert into usuario(nome, email, senha, nivel, telefone, login) values('".$nome."','".$email."','".$senha."','".$nivel."','".$telefone."','".$login."')";
    
	if(mysqli_query($conn,$sql)){
	echo "<script> alert('Gravado com sucesso');</script>";
	}else{
	echo   "<script> alert('Erro ao gravar no Banco');</script>";
	}}
     
?>
<div class="modal fade" id="cadastrarDispositivo">
	<div class="modal-dialog">
		 <div class="modal-content">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				 <h4 class="modal-title">Cadastrar Dispositivo</h4>
			 </div>
			 <div class="modal-body">
			 <form id="formulario" method="POST" action="">
					<fieldset>
						<label>Nome: </label>
						<input type="text" name="nomeDisp"><br> 

						<label>N° Série: </label>
						<input type="text" name="nSerieDisp"><br>
						
						<label>Descrição: </label>
						<input type="text" name="descricaoDisp"><br>
						
						<label>Tipo: </label>
						<input type="text" name="tipoDisp"><br>
						<br>
						<input type="submit" name="inserir" value="Inserir" style="background-color: #252525; border-radius: 5px; width:100px; height: 40px;color:white">   
					</fieldset>
				</form> 
			 </div>
			 <div class="modal-footer">
				 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			 </div>
		 </div>
	 </div>
</div>

<?php

if (isset($_POST['inserir'])){
	
	$nomeDisp = $_POST["nomeDisp"];
	$numeroSerie = $_POST["nSerieDisp"];
	$tipoDisp = $_POST["tipoDisp"];
	$descricaoDisp = $_POST["descricaoDisp"];
	$usuario = (int) $_SESSION['usuarioId'];
	
	 $sql="INSERT INTO dispositivo(nSerieDisp, nomeDisp, tipoDisp, usuario, descricaoDisp) values('$numeroSerie', '$nomeDisp', '$tipoDisp', $usuario, '$descricaoDisp')";
    
	if(mysqli_query($conn,$sql)){
	echo "<script> alert('Inserido com sucesso');</script>";
	}else{
	echo   "<script> alert('Erro ao inserir no Banco');</script>";
    }
}
     
?>
    <div id="sidebox">
       <h3><img src="img/user_white.png" width="25px" style="vertical-align:middle;"> USUÁRIO</h3>
       
       <p><?php echo "ID: ".$_SESSION['usuarioId']." | ".$_SESSION['usuarioNome']; ?></p>
       <h3><img src="img/local.png" width="25px" style="vertical-align:middle;"> DISPOSITIVOS</h3>
    
       
       <?php 
       $idusuario = $_SESSION['usuarioId'];
       $listar = mysqli_query($conn ,"SELECT * FROM dispositivo WHERE usuario = '$idusuario'");
     //  $row = mysqli_fetch_array($listar);
	 $latitude = "";
	 $longitude = "";
       while($i = mysqli_fetch_array($listar)){
			$id_disp = (int) $i['id'];
		    $sql_loc = mysqli_query($conn ,"SELECT * FROM loc WHERE id_disp =". $id_disp);
			while($loc = mysqli_fetch_array($sql_loc)) {
				$latitude = $loc['latitude'];
				$longitude = $loc['longitude'];
			}
            echo "<p>"."<a href ='javascript:dispositivo(".$latitude.",".$longitude.")'>"."ID: ".$i['id']." | ".$i['nomeDisp']."<br>"."</a>"."</p>";
       }
       ?>   
            
                

    </div>

<div id="mapa"></div>  
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfFLbJ9GuB8i3TjSIXAJJ1QsQoOV8AMBA&callback=inicializar"></script>    
</body>
</html>