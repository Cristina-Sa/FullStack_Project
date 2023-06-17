<!doctype html>
<html lang="ES-es">
    <head>
        <meta charset="utf-8">      
        <title> Tramitar inscripción </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"> 
    </head>

<body>

<?php
    // Incluimos datos de conexión a la base de datos:
    include("dataConfig.php");
    // Incluimos algunas funciones útiles
    include("functions.php");

    // Validamos que hayan llegado variables, y que no estén vacías:
    if(isset($_POST["submit"]) and  $_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])  || strlen($_POST["nombre"]) > 25){
            $errores[] = "El nombre es requerido y debe tener menos de 26 caracteres";
        }
        if(empty($_POST["1_apellido"]) || strlen($_POST["1_apellido"]) > 25){
            $errores[] = "El primer apellido es requerido y debe tener menos de 26 caracteres";
        }
        if(empty($_POST["2_apellido"]) || strlen($_POST["2_apellido"]) > 25){
            $errores[] = "El segundo apellido es requerido y debe tener menos de 26 caracteres";
        }
        // El email es obligatorio y ha de tener formato adecuado
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || empty($_POST["email"]) || strlen($_POST["email"]) > 30){
            $errores[] = "No se ha indicado email o el formato no es correcto o tiene más de 30 caracteres";
        }
        if(empty($_POST["login"]) || strlen($_POST["login"]) > 25){
            $errores[] = "El login es requerido y debe tener menos de 26 caracteres";
        }
        if(empty($_POST["contraseña"]) || strlen($_POST["contraseña"]) < 4 || strlen($_POST["contraseña"]) > 8){
            $errores[] = "La contraseña es requerida y ha de tener entre 4 y 8 caracteres";
        }
        
        // Si el array $errores está vacío, se aceptan los datos y se asignan a variables
        if(empty($errores)) {
            // Traspasamos a variables locales, para evitar posibles errores
            $nombre = filtrado($_POST['nombre']);
            $apellido1 = filtrado($_POST['1_apellido']);
            $apellido2 = filtrado($_POST['2_apellido']);
            $email = filtrado($_POST['email']);
            $login_user = filtrado($_POST['login']);
            $contraseña = filtrado($_POST['contraseña']);
        }
        else {
            if(isset($errores)){
                foreach ($errores as $error){
                    echo "<li> $error </li>";
                }
            }
        }

        // Intentamos crear conexión con DDBB
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset("utf8"); //Para no tener problemas con caracteres especiales (acentos, eñes)

            //Comprobamos que el email introducido no está en la base de datos
            $email_consulta = "SELECT `EMAIL` FROM USUARIOS WHERE `EMAIL` = '$email'";
            try {
                if (mysqli_num_rows($conn->query($email_consulta))>0) {
                    echo '<script>
                        alert("El email introducido ya estaba registrado en la base de datos introduzca otro");
                        window.location="index2.html";
                        </script>';
                }
                else {
                    // Preparamos la consulta SQL para introducir los datos del formulario en la DDBB:
                    $sql = "INSERT INTO USUARIOS (`NOMBRE`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `EMAIL`, `LOGIN`, `PASSWORD`) 
                    VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login_user', '$contraseña')";

                    try {
                        $conn->query($sql);
                        echo '<script>
                            window.location = "getUsers.html";
                            </script>';
                        //var_dump($_SERVER);
                        //header("Refresh:1; Location: {$_SERVER['HTTP_REFERER']}", true, 303);
                    } catch (mysqli_sql_exception $e) {
                        echo "<br>
                        <div> <p style='color:red;font-size:50px'> Error: </p> " . $sql . "<br><p style='color:red'>" . $conn->error . "</p> " ;
                    }
                }
            } catch (mysqli_sql_exception $e) {
                echo "<br>
                        <div> <p style='color:red;font-size:50px'> Error: </p> " . $sql . "<br><p style='color:red'>" . $conn->error . "</p> " ;
            }

        } catch (Exception $e) {
            // Check conexión
            if ($conn->connect_error) {
                error_log('Connection error: ' . $conn->connect_error);
                //die("connection failed: ". $conn->connection_error);
            }
            echo "<br>
                <div><p  style='color:red;font-size:50px;'>Servicio interrumpido</p> <br>";
            echo "<p  style='color:red'> Caught exception: </p>" .  $e->getMessage() . "\n";
            }

        $conn->close();
    }
    else {
        echo '<p> Por favor, complete el <a href="index.html">formulario</a></p>';
    }
?>


    <div class="text-center">
            <form class="sendedForm" action="index.html" style="margin-bottom:30px">
                <input class="btn btn-primary" name="volver" type="submit" value="Volver al formulario"/>
            </form>
    </div>
</div>

</body>
</html>