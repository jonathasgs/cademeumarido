<?php
session_start();
include_once("conexao.php");
include_once('verificalogado.php');

$id = $_POST['id_disp'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$sql="INSERT INTO loc(id_disp, latitude, longitude) VALUES('$id', '$latitude', '$longitude')";

if(mysqli_query($conn,$sql)){

echo "<script>window.location='simuladorApp.html';alert('Inserido com sucesso');</script>";    

}else{
    echo "<script>window.location='simuladorApp.html';alert('Inserido com sucesso');</script>";
}
?>