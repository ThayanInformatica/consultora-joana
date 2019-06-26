<?php
require_once __DIR__ . '/../repository/MarcasRepository.php';

if (isset($_GET['id'])) {
    $recuperarID = $_GET['id'];

        $marcasControllerMethod = new MarcasController;
    $recuperarPorID = $marcasControllerMethod->RecuperarTodasCategorias($recuperarID);

    echo json_encode($recuperarPorID);
}

if (isset($_GET['id_sub_cat'])) {

    $recuperarIDSub = $_GET['id_sub_cat'];
    $marcasControllerMethod = new MarcasController;
    $recuperarPorIDSubCategoria = $marcasControllerMethod->RecuperarTodasSubCatPorIdCat($recuperarIDSub);

    echo json_encode($recuperarPorIDSubCategoria);
}

class MarcasController{

        public function listarTodasAsMarcas()
    {
        $marcasRepository = new MarcasRepository();
        return $marcasRepository->listarTodasAsMarcas();

    }

    public function RecuperarTodasCategorias($recuperarID)
    {
        $marcasRepository = new MarcasRepository();
        return $marcasRepository->RecuperarTodasCategoriasPorIDMarca($recuperarID);

    }

    public function RecuperarTodasSubCatPorIdCat($recuperarIDCat)
    {
        $marcasRepository = new MarcasRepository();
        return $marcasRepository->RecuperarTodasSubCatPorIdCat($recuperarIDCat);

    }
}

?>