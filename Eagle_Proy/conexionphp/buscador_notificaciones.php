<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include("principal.php");
//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT *  FROM  (SELECT rubros.nombre AS 'Nombre_rubro', empresa.nombre AS 'Nombre_Empresa', empresa.ID as 'empresa_ID' FROM empresa INNER JOIN rubros ON empresa.rubroID=rubros.ID) AS tb_rubro_empresa INNER JOIN cliente ON cliente.empresaID=tb_rubro_empresa.empresa_ID WHERE notificacion =1 ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['busqueda']))
{
	$q=trim($_POST['busqueda']);
	$query="SELECT *  FROM  (SELECT rubros.nombre AS 'Nombre_rubro', empresa.nombre AS 'Nombre_Empresa', empresa.ID as 'empresa_ID' FROM empresa INNER JOIN rubros ON empresa.rubroID=rubros.ID) AS tb_rubro_empresa INNER JOIN cliente ON cliente.empresaID=tb_rubro_empresa.empresa_ID 
        WHERE 
        (Nombre LIKE '%".$q."%' OR
		Nombre_rubro LIKE '%".$q."%' OR
		ID LIKE '%".$q."%') AND notificacion =1";
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
			    <td>Nombre Cliente</td>
			    <td>Nombre Rubro</td>
                <td>Potencialidad</td>
                
            </tr>
        </thead>';

	while($filaCliente= $buscarCliente->fetch_assoc())
	{
		$tabla.=
        '<tbody>
            <tr>
			    <td>'.$filaCliente['Nombre'].'</td>
			    <td>'.$filaCliente['Nombre_rubro'].'</td>
			    <td>'.$filaCliente['ID'].'</td>
			    
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
