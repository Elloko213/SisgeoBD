<?php

require_once "modelos/ubicacion.php";

class UbicacionControlador {

    private $modelo;

    public function __CONSTRUCT() {
        $this->modelo = new Ubicacion();
    }

    public function Inicio() {
        require_once "vistas/encabezado.php";
        require_once "vistas/ubicacion/index.php";
        require_once "vistas/pie.php";
    }

    public function FormCrear() {
        $titulo = "Registrar";
        $u = new Ubicacion();
        if (isset($_GET['id'])) {
            $u = $this->modelo->Obtener($_GET['id']);
            $titulo = "Modificar";
        }

        require_once "vistas/encabezado.php";
        require_once "vistas/ubicacion/form.php";
        require_once "vistas/pie.php";
    }

    public function Guardar() {
        $u = new Ubicacion();
        $u->setId_ubicacion(($_POST['Id_ubicacion']));
        $u->setLatitud($_POST['Latitud']);
        $u->setLongitud($_POST['Longitud']);
        $u->setDireccion_textual($_POST['Direccion']);

        $u->getId_ubicacion() > 0 ?
        $this->modelo->Actualizar($u) :
        $this->modelo->Insertar($u);
        
        header("location:?c=ubicacion");
    }

    public function Borrar() {
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=ubicacion");
    }

}
