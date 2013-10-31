<?php
include 'archivoxml.php';
$configuration = new SimpleXMLElement($xmlstr);
//Datos de configuración de la conexión a la base de datos

//Servidor
 $host=$configuration->database->database_host;

//Usuario
 $user=$configuration->database->database_user;

//Password
 $password=$configuration->database->database_pass;

//Base de datos a utilizar
 $db=$configuration->database->database_name;

 $emailfrom=$configuration->database->email_from;

 $emailfromname=$configuration->database->email_from_name;

 $emailhost=$configuration->database->email_smtp_host;

 $emailport=$configuration->database->email_smtp_port;

 $emailuser=$configuration->database->email_smtp_user;

 $emailpass=$configuration->database->email_smtp_pass; 

 $emaillimit=$configuration->database->email_batch_limit;
    
?>