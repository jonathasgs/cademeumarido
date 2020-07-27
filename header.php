<header>
        <div id="header1"><div id="header1_1">
        <img id="logoWhite" src="img/logo_white.png"></div>
        </div>
        
        <ul id="menu-rastreador">
            
			<?php if ($_SESSION['usuarioNiveisAcessoId'] == 1) {?>
            <li>
                <a href="#" data-toggle="modal" data-target="#cadastrarUsuario">Cadastrar Usuário</a>
            </li>
			<?php } ?>
            <li>
                <a href="#" data-toggle="modal" data-target="#cadastrarDispositivo">Cadastrar Dispositivo</a> 
            </li>
			
            
            <li>
                <a href='logout.php'>Sair</a>
            </li>
			<li> 
            <a id="usuVar"><img id="iconLoginWhite" src="img/user_white.png">
            <?php
             $idusuario=$_SESSION['usuarioId'];
             $result = mysqli_query($conn, "select nome from usuario where id_usuario = '$idusuario'");
             $row = mysqli_fetch_assoc($result);
             echo $row['nome']; 
             ?></a>                    
			</li>
        </ul>
        
    </header>