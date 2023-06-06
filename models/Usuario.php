<?php
     class Usuario extends Conectar{ // Declaración de la clase "Usuario" que hereda de la clase "Conectar".

        public function login(){ // Función pública "login" que se encarga del inicio de sesión.
            $conectar=parent::Conexion(); // Establece la conexión a la base de datos utilizando el método "Conexion" de la clase padre.
            parent::set_names(); // Establece el juego de caracteres a UTF-8 utilizando el método "set_names" de la clase padre.

            if(isset($_POST["enviar"])){ // Comprueba si el formulario de inicio de sesión ha sido enviado.
                $correo = $_POST["usu_correo"]; // Obtiene el valor del campo de correo electrónico del formulario.
                $pass = $_POST["usu_pass"]; // Obtiene el valor del campo de contraseña del formulario.

                if(empty($correo) and empty($pass)){ // Comprueba si el correo y la contraseña están vacíos.
                    header("Location:".Conectar::ruta()."index.php?m=2"); // Redirecciona al archivo "index.php" con un mensaje de error.
                    exit(); // Finaliza la ejecución del script.
                }else{
                    $sql = "SELECT * FROM tm_usuario WHERE usu_correo=? AND usu_pass=? AND sta=1"; // Consulta SQL para buscar un usuario con el correo y la contraseña proporcionados, y estado activo.
                    $stmt=$conectar->prepare($sql); // Prepara la consulta SQL.
                    $stmt->bindValue(1, $correo); // Asigna el valor del correo al parámetro de la consulta.
                    $stmt->bindValue(2, $pass); // Asigna el valor de la contraseña al parámetro de la consulta.
                    $stmt->execute(); // Ejecuta la consulta.
                    $resultado = $stmt->fetch(); // Obtiene el resultado de la consulta como un arreglo asociativo.

                    if(is_array($resultado) and count($resultado)>0){ // Comprueba si se encontró un usuario válido.
                        $_SESSION["id_usu"]=$resultado["id_usu"]; // Almacena el ID del usuario en la sesión.
                        $_SESSION["usu_nom"]=$resultado["usu_nom"]; // Almacena el nombre del usuario en la sesión.
                        $_SESSION["usu_ape"]=$resultado["usu_ape"]; // Almacena el apellido del usuario en la sesión.
                        header("Location:".Conectar::ruta()."view/home/"); // Redirecciona al archivo "home.php".
                        exit(); // Finaliza la ejecución del script.
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1"); // Redirecciona al archivo "index.php" con un mensaje de error.
                        exit(); // Finaliza la ejecución del script.
                    }
                }
            }
        }
     }
?>
