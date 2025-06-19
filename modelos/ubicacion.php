<?php

class Ubicacion {

    private $pdo;

    private $id_ubicacion;
    private $latitud;
    private $longitud;
    private $direccion_textual;

    public function __CONSTRUCT() {
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getId_ubicacion(): ?int {
     return $this->id_ubicacion; 
 }
    public function setId_ubicacion(int $id) { 
        $this->id_ubicacion = $id; }

    public function getLatitud(): ?float {
     return $this->latitud; 
 }
    public function setLatitud(float $lat) { 
        $this->latitud = $lat;
         }

    public function getLongitud(): ?float { 
        return $this->longitud; 
    }
    public function setLongitud(float $long) {
     $this->longitud = $long; 
 }

    public function getDireccion_textual(): ?string { return $this->direccion_textual;
     }
    public function setDireccion_textual(string $dir) { $this->direccion_textual = $dir; 
    }
    public function Cantidad(){
        try{
            $consulta=$this->pdo->prepare("SELECT SUM(latitud) as Cantidad FROM ubicacion;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM ubicacion;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM ubicacion WHERE id_ubicacion = ?;");
            $consulta->execute([$id]);
            $r = $consulta->fetch(PDO::FETCH_OBJ);

            if ($r) {
                $u = new Ubicacion();
                $u->setId_ubicacion($r->id_ubicacion);
                $u->setLatitud($r->latitud);
                $u->setLongitud($r->longitud);
                $u->setDireccion_textual($r->direccion_textual);
                return $u;
            }
            return null;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insertar(Ubicacion $u) {
        try {
            $consulta = "INSERT INTO ubicacion (id_ubicacion, latitud, longitud, direccion_textual) VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                ->execute([
                    $u->getId_ubicacion(),
                    $u->getLatitud(),
                    $u->getLongitud(),
                    $u->getDireccion_textual()
                ]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Ubicacion $u) {
        try {
            $consulta = "UPDATE ubicacion SET 
                latitud = ?, 
                longitud = ?, 
                direccion_textual = ?
                WHERE id_ubicacion = ?";
            $this->pdo->prepare($consulta)
                ->execute([
                    $u->getLatitud(),
                    $u->getLongitud(),
                    $u->getDireccion_textual(),
                    $u->getId_ubicacion()
                ]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $consulta = "DELETE FROM ubicacion WHERE id_ubicacion = ?;";
            $this->pdo->prepare($consulta)->execute([$id]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
