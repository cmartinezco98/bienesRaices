<?php

namespace App;

use \Exception;
use GuzzleHttp\Psr7\Query;

class Propiedad
{
    //Conexion a la DB
    protected static $db;
    protected static $columnas = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];
    //Arreglo de validacion errores en formulario
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? "";
        $this->precio = $args['precio'] ?? "";
        $this->imagen = $args['imagen'] ?? "";
        $this->descripcion = $args['descripcion'] ?? "";
        $this->habitaciones = $args['habitaciones'] ?? "";
        $this->wc = $args['wc'] ?? "";
        $this->estacionamiento = $args['estacionamiento'] ?? "";
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? "1";
    }

    public function guardar()
    {
        if ($this->id) {
            //Actualizar registro
            return $this->actualizar();
        } else {
            //Crear registro
            return $this->crear();
        }
    }

    public function actualizar()
    {
        try {
            $atributos = $this->sanitizarAtributos();
            $valores = [];
            foreach ($atributos as $key => $value) {
                $valores[] = " {$key} = '{$value}'";
            }
            $query = "UPDATE propiedades SET ";
            $query .= join(",", $valores);
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= "LIMIT 1; ";
            $resultado = self::$db->query($query);

            if (!$resultado) {
                throw new Exception("Error al insertar en la base de datos", false);
            }
            return $resultado;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function crear()
    {
        try {
            $atributos = $this->sanitizarAtributos();
            $query = "INSERT INTO propiedades ";
            $query .= "(" . implode(", ", array_keys($atributos)) . ") VALUES ";
            $query .= "('" . implode("', '", array_values($atributos)) . "');";
            $resultado = self::$db->query($query);

            if (!$resultado) {
                throw new Exception("Error al insertar en la base de datos", false);
            }
            return $resultado;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminar()
    {
        // debuguear("Desde Eliminar " . $this->id);

        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1;";
        // debuguear($query);

        //Realizar consulta 
        $resultadoConsulta = self::$db->query($query);

        if ($resultadoConsulta) {
            $this->eliminarImagen();
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=4");
        } else {
            header("Location:/ProyectosPHP/bienesraices_inicio/admin/index.php?codigo=3");
        }
    }
    public function eliminarImagen()
    {
        // debuguear("Desde Elimnar " . $this->imagen);
        //Comprobar si el existe archivo existe
        $imagenExiste = file_exists(CARPETA_IMAGENES . "/" . $this->imagen);
        if ($imagenExiste) {
            //Eliminar archivo del servidor
            unlink(CARPETA_IMAGENES . "/" . $this->imagen);
        }
    }

    public function atributos(): array
    {
        $atributos = [];

        foreach (self::$columnas as $columna) {
            if ($columna === "id") continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(): array
    {
        $sanitizado = [];
        $atributos = $this->atributos();

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        };

        return $sanitizado;
    }

    //Validacion erorres de formulario

    public function validacionErrores()
    {
        if (!$this->titulo) {
            self::$errores[] = "El titulo esta vacio";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio esta vacio";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "El numero de habitaciones es obligatorio";
        }
        if (!$this->wc) {
            self::$errores[] = "El numero de baños es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "El numero de estacionamiento es obligatorio";
        }

        if (!$this->vendedores_id) {
            self::$errores[] = "El vendedor es obligatorio";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }
        return self::$errores;
    }

    //Obtener Todas las propiedades

    public static function getAll(): array
    {
        $query = "SELECT * FROM propiedades;";
        $resultado = self::consultaSQL($query);
        return $resultado;
    }

    public static function getForID($id): object
    {
        $query = "SELECT * FROM propiedades WHERE id={$id};";
        $resultado = self::consultaSQL($query);
        return array_shift($resultado);
    }

    public static function consultaSQL($query): array
    {
        //Consultar a la Base de Datos
        $resultado = self::$db->query($query);

        //Iterar los datos
        $arregloObjetos = [];
        while ($registro = $resultado->fetch_assoc()) {
            $arregloObjetos[] = self::crearObjeto($registro);
        }

        //liberar memoria
        $resultado->free();

        //Retornar objetos
        return $arregloObjetos;
    }


    protected static function crearObjeto($registro): object
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincronizar datos del objeto en memoria

    public function sincronizar($args = [])
    {
        // debuguear("Hola desde sincronizar.php");

        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    //GETTERS AND SETTERS

    public static function getErrores()
    {
        return self::$errores;
    }

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function setImagen($imagen)
    {
        //Eliminar la imagen previa

        if (is_null($this->id)) {

            $this->eliminarImagen();
        }

        //Asignar al atributo imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }
}
