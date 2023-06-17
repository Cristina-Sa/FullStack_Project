<!doctype html>
<html lang="ES-es">
    <head>
        <meta charset="utf-8">      
        <title> Tramitar inscripción </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"> 
    </head>

<body>
<div class="TablaDatos">
    <?php
        // Incluimos los datos de conexión y las funciones:
        include("dataConfig.php");
        include("functions.php");
        
        // Crear conexión
        try {
            $conn = new mysqli($servername, $username, $password, $dbname);
            $conn->set_charset("utf8");  //Para no tener problemas con caracteres especiales (acentos, eñes)

            // QUERY
            $consulta = "SELECT `NOMBRE`, `PRIMER APELLIDO`, `SEGUNDO APELLIDO`, `EMAIL`, `LOGIN` FROM USUARIOS";

            $filas = $conn->query($consulta)->fetch_all();
            if(count($filas)==0){
                die(" <p style='color:red;font-size:30px'>" . 
                        "No hay aún ningún registro en la base de datos" .
                    "</p><br>");
            }
            $content ="<h1 class='title'>Usuarios inscritos</h1>" . 
                        "<br><div>" .
                        "<table class='table table-dark table-striped'>" .
                            "<thead class='table thead-dark'>
                            <tr>
                                <th scope='col'>NOMBRE</th>
                                <th scope='col'>PRIMER APELLIDO</th>
                                <th scope='col'>SEGUNDO APELLIDO</th>
                                <th scope='col'>EMAIL</th>
                                <th scope='col'>LOGIN</th>
                            </tr></thead>" .
                            "<tbody>";
            foreach ($filas as &$fila) {
                $content .= "<tr>";
                foreach($fila as &$campo){
                    $content .= "<td>" . $campo . "</td>";
                }
                $content .= "</tr>";
            }
            $content .= "</tbody>";
            $content .= "</table>";
            $content .= "</div>";
            echo $content;

        } catch (Exception $e) {
            echo "<p style='color:red;font-size:50px'>Servicio interrumpido</p>";
            echo "<p  style='color:red'> Caught exception: </p>" .  $e->getMessage() . "\n";
            if($conn->connect_error){
                die("<div> Fallo de conexión con la base de datos: " . $conn->connect_error . "</div>");
            }
        }      
        
    ?>

        <div class="text-center">
            <form class="sendedForm" action="index.html" style="margin-bottom:30px">
                <input class="btn btn-primary" name="volver" type="submit" value="Volver al formulario"/>
            </form>
        </div>
        
        <footer>
        <div>
            <hr />
            <span>&copy; 2023 Cristina Santa Cruz</span>
        </div>
	</footer>
    
    </div>


</body>
</html>
