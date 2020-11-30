<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include("principal.php");
//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM usuarios INNER JOIN ejecutivos ON  ejecutivos.usuarioID= usuarios.ID";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['busqueda']))
{
	$q=trim($_POST['busqueda']);
	$query="SELECT * FROM usuarios INNER JOIN ejecutivos ON  ejecutivos.usuarioID= usuarios.ID
	WHERE 
		nombre_apellido LIKE '%".$q."%' OR
		mail LIKE '%".$q."%' OR
		telefono LIKE '%".$q."%'";
}

$buscarCliente=mysqli_query($con,$query);
$filas=mysqli_num_rows($buscarCliente);
if ($filas> 0)
{
	$tabla.= 
    '<br>
    <table class="content-table">
        <thead>
		    <tr class="bg-primary">
			    <td>Nombre Ejecutivo</td>
			    <td>email</td>
                <td>telefono</td>
                <td>Configurar</td>
            </tr>
        </thead>';

	while($filaCliente= $buscarCliente->fetch_assoc())
	{
		$tabla.=
        '<tbody>
            <tr>
			    <td>'.$filaCliente['nombre_apellido'].'</td>
			    <td>'.$filaCliente['mail'].'</td>
			    <td>'.$filaCliente['telefono'].'</td>
			    <td><a href="GestionarEjecutivo.php?IDejecutivo='.$filaCliente['usuarioID'].'"> Gestionar</a></td>
			
		    </tr>
        </tbody>';
	}

	$tabla.='</table>';
} else
	{
		$tabla.='<h4 class="tabla_buscador">No se encontraron coincidencias con sus criterios de búsqueda.</h4>';
	}


echo $tabla;
?>
