<?php
    //Confirmar que el metodo sea POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //Propiedades de la base de datos
        $mysql_username = "root";
        $mysql_password = "mymalk4pon3";
        $mysql_host = "localhost";
        $mysql_database = "labtecaa_registros";
        
        //Valores obtenidos de los input y su verificacion
        $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
        $a_paterno = filter_var($_POST["a_paterno"], FILTER_SANITIZE_STRING);
        $a_materno = filter_var($_POST["a_materno"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
        if (empty($nombre)){
            die("Ingresa tu nombre <br/> <a href=\"./../contact-us.html\">Volver<a/>");
        }
        if (empty($a_paterno)){
            die("Ingresa tu nombre <br/> <a href=\"./../contact-us.html\">Volver<a/>");
        }
        if (empty($a_materno)){
            die("Ingresa tu nombre <br/> <a href=\"./../contact-us.html\">Volver<a/>");
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            die("Ingrese una dirección de correo electrónico válida <br/> <a href=\"./../contact-us.html\">Volver<a/>");
        }
    
        //Conexion a base de datos labtecaa_registros
        $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        
        
        if ($mysqli->connect_error) {
            die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
        }	
        
        $consulta = $mysqli->prepare("INSERT INTO datos_usuario (nombre, a_paterno, a_materno, email) VALUES(?, ?, ?, ?)"); //Esqueleto de la consulta

        //Paso de los valores necesarios a la consulta
        $consulta->bind_param('ssss', $nombre, $a_paterno, $a_materno, $email);
        
        if($consulta->execute()){
            print "Gracias " . $nombre . ", pronto recibirás notificaciones por parte del equipo de LABTECAA. <br/> <a href=\"./../contact-us.html\">Volver<a/>";
        }
        else{
            //Muestra cualquier error obtenido en este punto
            print $mysqli->error . "<br/> <a href=\"./../contact-us.html\">Volver<a/>";
        }
    }
?>