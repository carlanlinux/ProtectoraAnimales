<?php

include ('Conexion.class.php');

abstract class Crud extends Conexion
{
    private $table;
    private $db;

    public function __construct (String $table)
    {
        $this->table = $table;
       $this->db = parent::setConnection();
       return $this->db;

    }

    public function obtieneTodos() {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "SELECT * FROM " . $this->table;
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->db->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            //Ejecutamos la consulta preparada
            $stmt->execute();
            //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
            // elemento en el array sabremos que hay un error
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                return $error = $errorInfo[2];
            } else{
                //Rellenar con qué hacer con los datos.
               return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
           return $error = $e->getMessage();
        }
    }

    public function obtienerPaginado($limit, $offset) {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "SELECT * FROM " . $this->table . " LIMIT  :limit , :offset";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->db->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            //Ejecutamos la consulta preparada
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
            // elemento en el array sabremos que hay un error
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                return $error = $errorInfo[2];
            } else{
                //Rellenar con qué hacer con los datos.
                return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
    }

    public function contarRegistros() {
        return sizeof($this->obtieneTodos());
    }

    public function obtieneDeID($id) {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "SELECT :id FROM " . $this->table;
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->db->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            //Ejecutamos la consulta preparada
            $stmt->execute();
            //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
            // elemento en el array sabremos que hay un error
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                return $error = $errorInfo[2];
            } else{
                //Rellenar con qué hacer con los datos.
                return $result = $stmt->fetchObject();
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
    }

    public function borrar( $id) {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD, ponemos limit 1 para
            // asgurarnos  que no borra nada más que una fila
            $sql = "DELETE FROM " .  $this->table . " WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->db->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            //Devolvemos el número de filas afectadas
            echo $affected . ' records deleted.';
        } catch (Exception $e) {
            echo $error = $e->getMessage();
        }
    }

    abstract protected function crear();

    abstract protected function actualizar(array $args);

}