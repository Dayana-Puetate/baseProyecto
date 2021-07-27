<?php
class MvcController
{
    public function plantilla()
    {
        include "views/template.php";
    }

    public function enlacesPaginasController()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicio.php";
        }
        $respuesta= EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;

    }
}

class adminController
{
    public function plantillaAdmin()
    {
        include "views/estilo.php";
    }

    public function enlacesPaginasControllerAdmin()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicioAdmin.php";
        }
        $respuesta= EnlacesPaginasAdmin::enlacesPaginasModelAdmin($enlacesController);
        include $respuesta;

    }

}

class cuencaController
{
    public function plantillaCuenca()
    {
        include "views/estiloC.php";
    }

    public function enlacesPaginasControllerCuenca()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicioC.php";
        }
        $respuesta= EnlacesPaginasCuenca::enlacesPaginasModelCuenca($enlacesController);
        include $respuesta;

    }

}

class guayaquilController
{
    public function plantillaGuayaquil()
    {
        include "views/estiloG.php";
    }

    public function enlacesPaginasControllerGuayaquil()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicioG.php";
        }
        $respuesta= EnlacesPaginasGuayaquil::enlacesPaginasModelGuayaquil($enlacesController);
        include $respuesta;

    }
}
class quitoController
{
    public function plantillaQuito()
    {
        include "views/estiloQ.php";
    }

    public function enlacesPaginasControllerQuito()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicioQ.php";
        }
        $respuesta= EnlacesPaginasQuito::enlacesPaginasModelQuito($enlacesController);
        include $respuesta;

    }
}
?>