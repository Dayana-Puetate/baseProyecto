<?php
class EnlacesPaginas
{
    public function enlacesPaginasModel($enlacesModel)
    {
        if($enlacesModel== "inicio" ||
        $enlacesModel== "nosotros" ||
        $enlacesModel== "bodega" ||
        $enlacesModel== "login")
        {
            $module="views/modules/".$enlacesModel.".php";
        }
        else if($enlacesModel=="index")
        {
            $module="views/modules/inicio.php";
        }
        else
        {
            $module="views/modules/inicio.php";
        }
        return $module;

    }
}


class EnlacesPaginasAdmin
{
    public function enlacesPaginasModelAdmin($enlacesModelAdmin)
    {
        if($enlacesModelAdmin== "inicioAdmin"||
        $enlacesModelAdmin== "registroProductos" ||
        $enlacesModelAdmin== "distribucion"||
        $enlacesModelAdmin== "buscarPBodega"||
        $enlacesModelAdmin== "ingresoProductos")
        {
            $module="views/administrado/".$enlacesModelAdmin.".php";
        }
        else if($enlacesModelAdmin=="indexAdmin")
        {
            $module="views/administrado/inicioAdmin.php";
        }
        else
        {
            $module="views/administrado/inicioAdmin.php";
        }
        return $module;
    }

}

class EnlacesPaginasCuenca
{
    public function enlacesPaginasModelCuenca($enlacesModelCuenca)
    {
        if($enlacesModelCuenca== "inicioC"||
        $enlacesModelCuenca== "distribucionC"||
        $enlacesModelCuenca== "tablaPC")
        {
            $module="views/administrado/cuenca/".$enlacesModelCuenca.".php";
        }
        else if($enlacesModelCuenca=="indexC")
        {
            $module="views/administrado/cuenca/inicioC.php";
        }
        else
        {
            $module="views/administrado/cuenca/inicioC.php";
        }
        return $module;
    }

}

class EnlacesPaginasGuayaquil
{
    public function enlacesPaginasModelGuayaquil($enlacesModelGuayaquil)
    {
        if($enlacesModelGuayaquil== "inicioG"||
        $enlacesModelGuayaquil== "distribucionG"||
        $enlacesModelGuayaquil== "tablaPG")
        {
            $module="views/administrado/guayaquil/".$enlacesModelGuayaquil.".php";
        }
        else if($enlacesModelGuayaquil=="indexG")
        {
            $module="views/administrado/guayaquil/inicioG.php";
        }
        else
        {
            $module="views/administrado/guayaquil/inicioG.php";
        }
        return $module;
    }

}

class EnlacesPaginasQuito
{
    public function enlacesPaginasModelQuito($enlacesModelQuito)
    {
        if($enlacesModelQuito== "inicioQ"||
        $enlacesModelQuito== "distribucionQ"||
        $enlacesModelQuito== "tablaPQ")
        {
            $module="views/administrado/quito/".$enlacesModelQuito.".php";
        }
        else if($enlacesModelQuito=="indexQ")
        {
            $module="views/administrado/quito/inicioQ.php";
        }
        else
        {
            $module="views/administrado/quito/inicioQ.php";
        }
        return $module;
    }

}
?>