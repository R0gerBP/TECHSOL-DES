<?php
    session_start(); // Inicia una sesión en PHP.

    class Conectar{ // Declaración de la clase "Conectar".
        protected $dbh; // Variable protegida para almacenar la conexión a la base de datos.

        protected function Conexion(){ // Función protegida para establecer la conexión con la base de datos.
            try{
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=bd_techsol","root",""); // Crea una nueva instancia de la clase PDO para conectarse a la base de datos.
                return $conectar; // Devuelve la conexión establecida.
            } catch (Exception $e){
                print "¡ERROR BD!: " . $e->getMessage() . "<br/>"; // Muestra un mensaje de error si ocurre una excepción en la conexión a la base de datos.
                die(); // Finaliza la ejecución del script.
            }
        }

        public function set_names(){ // Función pública para establecer el juego de caracteres de la conexión a UTF-8.
            return $this->dbh->query("SET NAMES 'utf8'"); // Ejecuta una consulta para establecer el juego de caracteres a UTF-8.
        }

        public static function ruta(){ // Función pública que devuelve una ruta de URL.
            return "http://localhost/WEB_TECHSOL/"; // Devuelve la ruta especificada.
        }
    }
?>
