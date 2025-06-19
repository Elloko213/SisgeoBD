<?php

class Quiosco {

    private $pdo;

    private $id_quiosco;
    private $nombre;
    private $descripcion;
    private $id_ubicacion;

    public function __CONSTRUCT() {
        $this->pdo = BasedeDatos::Conectar();
    }

    public function getId_quiosco(): ?int { return $this->id_quiosco; }
    public function setId_quiosco(int $id) { $this->id_quiosco = $id; }

    public function getNombre(): ?string { return $this->nombre; }
    public function setNombre(string $nom) { $this->nombre = $nom; }

    public function getDescripcion(): ?string { return $this->descripcion; }
    public function setDescripcion(string $desc) { $this->descripcion = $desc; }

    public function getId_ubicacion(): ?int { return $this->id_ubicacion; }
    public function setId_ubicacion(int $ubic) { $this->id_ubicacion = $ubic; }

    public function Listar() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM quiosco;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id) {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM quiosco WHERE id_quiosco = ?;");
            $consulta->execute([$id]);
            $r = $consulta->fetch(PDO::FETCH_OBJ);

            if ($r) {
                $q = new Quiosco();
                $q->setId_quiosco($r->id_quiosco);
                $q->setNombre($r->nombre);
                $q->setDescripcion($r->descripcion);
                $q->setId_ubicacion($r->id_ubicacion);
                return $q;
            }
            return null;

        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Insertar(Quiosco $q) {
        try {
            $consulta = "INSERT INTO quiosco (id_quiosco, nombre, descripcion, id_ubicacion) VALUES (?, ?, ?, ?);";
            $this->pdo->prepare($consulta)
                ->execute([
                    $q->getId_quiosco(),
                    $q->getNombre(),
                    $q->getDescripcion(),
                    $q->getId_ubicacion()
                ]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Quiosco $q) {
        try {
            $consulta = "UPDATE quiosco SET 
                nombre = ?, 
                descripcion = ?, 
                id_ubicacion = ?
                WHERE id_quiosco = ?;";
            $this->pdo->prepare($consulta)
                ->execute([
                    $q->getNombre(),
                    $q->getDescripcion(),
                    $q->getId_ubicacion(),
                    $q->getId_quiosco()
                ]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id) {
        try {
            $consulta = "DELETE FROM quiosco WHERE id_quiosco = ?;";
            $this->pdo->prepare($consulta)->execute([$id]);
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }
}
