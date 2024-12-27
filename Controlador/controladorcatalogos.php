<?php

include_once('Modelo/clsBecas.php');
class controladorcatalogos
{
	private $vista;

    public function AltaBecas()
    {
        $becas=new clsBecas(); //MODELO BECAS //LAMAR FUNCION A TRAVES DE ESTE OBJETO
        if(empty($_POST))
        {
            $consulta=$becas->ConsultaBecas();
            $vista="Vistas/Catalogos/frmBecas.php";
            include_once("Vistas/frmplantilla.php");
        }
        else
        {
            $nombreBeca=$_POST['txtbeca'];
            $monto=$_POST['txtmonto'];
            $becas->GuardarBecas($nombreBeca,$monto); //LAMO A LA FUNCION DEL MODELO clsBecas
            $consulta=$becas->ConsultaBecas();

            $vista="Vistas/Catalogos/frmBecas.php";
            include_once("Vistas/frmplantilla.php");
        }
    }

    
    public function EliminaActualizaBecas()
    {
        if(isset($_POST['btnEliminar']))
        {
            $becas=new clsBecas();
            $id=$_POST['txtIdBeca'];
            $becas->EliminarBecas($id);
            $consulta=$becas->ConsultaBecas();
            $vista="Vistas/Catalogos/frmBecas.php";
            include_once("Vistas/frmplantilla.php");
        }
        else if(isset($_POST['btnActualizar']))
        {
            $becas=new clsBecas();
            $id=$_POST['txtIdBeca'];
            $nombreBeca=$_POST['txtNombre'];
            $monto=$_POST['txtMonto'];

            $becas->ActualizarBecas($id,$nombreBeca,$monto);
            $consulta=$becas->ConsultaBecas();
            $vista="Vistas/Catalogos/frmBecas.php";
            include_once("Vistas/frmplantilla.php");
        }
    }
	
}

?>