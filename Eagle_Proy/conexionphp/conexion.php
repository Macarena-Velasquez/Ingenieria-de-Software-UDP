<?php 
 function conectar(){

  $user="root";
  $pass="12345";
  $server="localhost";
  $db="eaglecopters";
  $con=mysqli_connect($server,$user,$pass,$db) or die ("Error al conectar a la bd ");
  return $con;
  echo "sillego";
 }


 ?>