<?php


class Animal extends Crud
{
    private $id;
    private $nombre;
    private $especie;
    private  $raza;
    private $genero;
    private $color;
    private $edad;
    private $conexion;
    const TABLA = "animal";

    public function __construct ($nombre = null, $especie = null, $raza = null, $genero = null, $color=null, $edad=null, $id =null)
    {
        $this->conexion = parent::__construct(Animal::TABLA);
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->genero = $genero;
        $this->color = $color;
        $this->edad = $edad;
        $this->id = $id;
    }

    public function __set ($propiedad, $valor)
    {
        //mira si existe la propiedad $var en la clase, y si es así le asigna el valor que
        //se pasa por parámetro
        //__CLASS__ es una constante predefinida en PHP que contiene el nombre de la clase
        //echo "CLASE:".__CLASS__;
        if (property_exists(__CLASS__, $propiedad)) {
            $this->$propiedad = $valor;
    }
    }

    //Devolvemos el dato que se solicite
    public function __get ($propiedad)
    {
        if (property_exists(__CLASS__, $propiedad)) {
            return $this->$propiedad;
        } else
            return "método __get() NO existe el atributo '"
                . $propiedad . "'<br/>";
    }


    public function crear () {
            try {
                //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
                $sql = "INSERT INTO ". self::TABLA ." (nombre, especie, raza, genero, color, edad) VALUES (:nombre, :especie, :raza, :genero, :color, :edad)";
                //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
                $stmt = $this->conexion->prepare($sql);
                //Bind value para calculos y expresiones BiddPAram para variables
                // //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
                //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
                // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
                //Ejecutamos la consulta preparada
                $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
                $stmt->bindParam(':especie', $this->especie, PDO::PARAM_STR);
                $stmt->bindParam(':raza', $this->raza, PDO::PARAM_STR);
                $stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);
                $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
                $stmt->bindParam(':edad', $this->edad, PDO::PARAM_INT);
                $affected = $stmt->execute();
                if ($affected) {
                    //Devuelve el último Id que se ha insertado
                    echo "<h6 class='text-success mt-3'>". $affected . " Animal guardado con ID " . $this->id = $this->conexion->lastInsertId() . "</h6>";
                } else {
                    echo "<h6 class='text-danger mt-3'>Error al crear nuevo usuario</h6>";
                }
            } catch (Exception $e) {
                return $error = $e->getMessage();
            }
            if (isset($error)) {
                return $error;
            }
    }

    public function actualizar ()
    {
        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE " . self::TABLA . " SET nombre = :nombre, especie= :especie, raza = :raza, genero = :genero, color = :color, edad = :edad WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':especie', $this->especie, PDO::PARAM_STR);
            $stmt->bindParam(':raza', $this->raza, PDO::PARAM_STR);
            $stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);
            $stmt->bindParam(':color', $this->color, PDO::PARAM_STR);
            $stmt->bindParam(':edad', $this->edad, PDO::PARAM_INT);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>" . $affected . " Animal {$this->id} mofidicado con éxito</h6>";
            } else {
                echo  "<h6 class='text-danger mt-3'>Error al modificar Animal</h6>";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;

        }
    }
}