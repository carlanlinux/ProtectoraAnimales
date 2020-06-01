<?php
/**
 * @Class FuncionesSoap
 * Objetivo: tarea servicio con  WSDL
 */

class FuncionesSoap
{
    //Constantes con los datos de la conexión para inciarla

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASS = "root";
    const DB_NAME = "protectora_animales";
    //$dsn = 'mysql:host=localhost;dbname=protectora_animales;port=8889';
    const DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";";


    //Setear la conexión de la base de datos

    /**
     * Método que establece la conexión con la base de datos
     * @return PDO
     */
    protected function setConnection() {
        try {
            $pdo = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
            return $pdo;
        }
        catch (Exception $e) {
            exit($e->getMessage());
        }
    }


    /**
     * Método que devuelve si el animal ha sido adoptado en un string.
     * @param int
     * @return string
     */
    public function obtieneDeIDAnimal($idAnimal) {
        try {
            $conexion = self::setConnection();
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "SELECT * FROM adopcion WHERE idAnimal = :idAnimal";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':idAnimal', $idAnimal);
            //Ejecutamos la consulta preparada
            $stmt->execute();
            //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
            // elemento en el array sabremos que hay un error
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                return $error = $errorInfo[2];
            } else{
                //Rellenar con qué hacer con los datos.
                $result = $stmt->fetchObject();
               //Si hay resultados es que ha sido adoptado, si no aún está esperando  una adopción.
                if ($result) {
                    return "El animal {$idAnimal} ha sido adoptado";
                } else{
                    return "El animal {$idAnimal} aún está esperando a su alma gemela";
                }
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
    }
}