<?php


class Usuario extends Crud
{
    //Array que servirá para rellenar las propiedades de la clase con el método mágico set
    private $id;
    private $nombre;
    private $apellido;
    private $sexo;
    private $direccion;
    private $telefono;
    private $conexion;
    const TABLA = "usuarios";

    public function __construct ($nombre=null, $apellido=null, $sexo=null, $direccion=null, $telefono=null, $id = null)
    {
        $this->conexion = parent::__construct(self::TABLA);
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sexo = $sexo;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
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


    public function crear ()
    {
        try {
            //Usar el nombre del parámetro con :nombreTabla, la misma que la columna en la BD
            $sql = "INSERT INTO " . self::TABLA . " (nombre, apellido, sexo, direccion, telefono) VALUES (:nombre, :apellido, :sexo, :direccion, :telefono)";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $this->sexo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $this->telefono, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>". $affected . " Usuario guardado con ID " . $this->id = $this->conexion->lastInsertId() . "</h6>";
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
            $sql = "UPDATE " . self::TABLA . " SET nombre = :nombre, apellido = :apellido, sexo = :sexo, direccion = :direccion, telefono = :telefono WHERE id = :id LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
            $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR);
            $stmt->bindParam(':sexo', $this->sexo, PDO::PARAM_STR);
            $stmt->bindParam(':direccion', $this->direccion, PDO::PARAM_STR);
            $stmt->bindParam(':telefono', $this->telefono, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>" . $affected . " Usuario {$this->id} mofidicado con éxito</h6>";
            } else {
                echo  "<h6 class='text-danger mt-3'>Error al modificar Usuario</h6>";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;

        }
    }
}