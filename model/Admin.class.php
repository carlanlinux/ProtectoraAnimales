<?php

include ('Crud.class.php');

class Admin extends Crud
{
    //Array que servirá para rellenar las propiedades de la clase con el método mágico set
    private $id;
    private $password;
    private $conexion;
    const TABLA = "admins";

    public function __construct ($id = null, $password = null)
    {
        $this->conexion = parent::__construct(self::TABLA);
        $this->id = $id;
        $this->password = $password;
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
            $sql = "INSERT INTO " . self::TABLA . " (id, password) VALUES (:username, :password)";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
           $this->password = md5($this->password);
            $stmt->bindParam(':username', $this->id, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);
            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>" . $affected . " row inserted</h6>";
            } else {
                echo "<h6 class='text-danger mt-3'>Error al introducir nuevo Administrador</h6>";
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
        $this->password = md5($this->password);
        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE " . self::TABLA . " SET id = :id, password = :password LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo "<h6 class='text-success mt-3'>" . $affected . "Administrador {$this->id} mofidicado con éxito" . "<h6>";
            } else {
                echo "<h6 class='text-success mt-3'>Error al modificar Administrador</h6>";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;

        }
    }

    public function obtenerPorUsername($username) {
        try {
            //Usar el nombre del parámetro con :username, la misma que la columna en la BD
            $sql = "SELECT * FROM " . self::TABLA . " WHERE id = :username";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion ->prepare($sql);
            //Bind value para calculos y expresiones ('%' si quiero usar wildcard characters por delante o por detrás)
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            //Ejecutamos la consulta preparada
            $stmt->execute();
            // Crear un objeto de la clase Admin con el resultado de la base de datos - Se debe tener método mágico __Construct y __set
            //Seteamos el modo de PDO a FETCH_CLASS para que me cree un objeto de la clase y añadimos una segunda constante usando pipe
            //PDO::FETCH_PROPS_LATE para indicar que rellene los datos una vez hemos creado el objeto para asegurarmos que sobreecribimos
            // cualquier propiedad que haya por defecto en el constructor
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Admin',array($this->username, $this->password) );
            //Usamos el método de error en el objeto del statment en vez de en el de la base de datos, si hay un tercer
            // elemento en el array sabremos que hay un error
            $errorInfo = $stmt->errorInfo();
            if (isset($errorInfo[2])) {
                return $error = $errorInfo[2];
            } else{
                //Devolvemos el objeto Admin
                return $admin = $stmt->fetch();
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
    }

/*    //Actualizar usando argumentos
    public function actualizar (array $args)
    {
        //Cambiamos los datos del objeto en función de lo que nos llegue en el array asociativo de argumentos
        foreach ($args as $key=> $value){
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }

        try {
            //Query a la base de datos para actualizar
            $sql = "UPDATE " . self::TABLA . " SET id = :id, password = :password LIMIT 1";
            //Creamos la consulta preparada desde el objeto de conexión de base de datos y le pasamos el SQL
            $stmt = $this->conexion->prepare($sql);
            //Bind value para calculos y expresiones
            //$stmt->bindValue(':make', '%' . $_GET['make'] . '%');
            //Estos son string y ya usamos Param, cogemos la variable que queremos asignar e incluimos el tipo de datos con
            // una constante PDO para indicar si es INT o qué tipo: PDO::PARAM_INT
            $stmt->bindParam(':id', $this->username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, PDO::PARAM_STR);

            //Ejecutamos la consulta preparada
            $affected = $stmt->execute();
            if ($affected) {
                //Devuelve el último Id que se ha insertado
                echo $affected . "Administrador {$this->adminname} mofidicado con éxito";
            } else {
                echo "Error al modificar Administrador";
            }
        } catch (Exception $e) {
            return $error = $e->getMessage();
        }
        if (isset($error)) {
            return $error;

        }
    }*/



}