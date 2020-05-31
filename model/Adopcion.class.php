<?php


class Adopcion extends Crud
{
    //Array que servirá para rellenar las propiedades de la clase con el método mágico set
    private $id;
    private $idAnimal;
    private $idUsuario;
    private $fecha;
    private $razon;
    private $conexion;
    const TABLA = "adopcion";

    public function __construct ($idAnimal = null, $idUsuario = null, $fecha = null, $razon = null, $id = null) {
        $this->conexion = parent::__construct(self::TABLA);
        $this->idAnimal = $idAnimal;
        $this->idUsuario = $idUsuario;
        $this->fecha = date('Y-m-d', strtotime($fecha));
        $this->razon = $razon;
        $this->id = $id;
    }

    public function __set ($propiedad, $valor)
    {
        //mira si existe la propiedad $var en la clase, y si es así le asigna el valor que
        //se pasa por parámetro
        //__CLASS__ es una constante predefinida en PHP que contiene el nombre de la clase
        //echo "CLASE:".__CLASS__;
        if (property_exists(__CLASS__, $propiedad)) {
            if ($propiedad == "fecha" ) $this->$propiedad = date('Y-m-d', strtotime($valor));
            $this->$propiedad = $valor;
        }
    }

    //Devolvemos el dato que se solicite
    public function __get ($propiedad)
    {
        if (property_exists(__CLASS__, $propiedad)) {
           return  $this->$propiedad;
        } else
            return "método __get() NO existe el atributo '"
                . $propiedad . "'<br/>";
    }


    public function crear ()
    {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "INSERT INTO " . self::TABLA . " (idAnimal, idUsuario, fecha, razon) VALUES (:idAnimal, :idUsuario, :fecha, :razon)";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':idAnimal', $this->idAnimal, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $this->fecha);
            $stmt->bindParam(':razon', $this->razon, PDO::PARAM_STR);
            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>". $affected . " row inserted with ID " . $this->id = $this->conexion->lastInsertId() . "</h6>";
            } else {
                echo "<h6 class='text-danger mt-3'>Error al crear nueva adopción</h6>";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;
        } else{
            //Devuelve el último Id que se ha insertado
            return $affected . " row inserted with ID " . $this->id = $this->conexion->lastInsertId();
        }

    }

    public function actualizar ()
    {

        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE " . self::TABLA . " SET idAnimal = :idAnimal, idUsuario = :idUsuario, fecha = :fecha, razon = :razon WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':idAnimal', $this->idAnimal, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);
            $stmt->bindParam(':fecha', $this->fecha, PDO::PARAM_STR);
            $stmt->bindParam(':razon', $this->razon, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>" . $affected . " Adopción {$this->id} mofidicado con éxito</h6>";
            } else {
                echo  "<h6 class='text-danger mt-3'>Error al modificar adopción</h6>";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;

        }
    }
}