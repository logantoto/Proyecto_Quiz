<?php
require_once 'Db.php';
require_once 'Conf.php';
require("class.phpmailer.php");//primero incluimos la clase class.phpmailer.php
 include 'archivoxml.php';
$configuration = new SimpleXMLElement($xmlstr);

$mail = new PHPMailer();//definimos los datos del remitente
$mail->Host = $configuration->database->database_host;
$mail->From = $configuration->database->email_from;
$mail->FromName = $configuration->database->email_from_name;
$mail->Subject = $configuration->database->email_smtp_user;




mysql_connect("localhost", "root","");//tenemos que tenemos que hacer es realizar la consulta a la base de datos y extraer los datos de los estudiantes.
mysql_select_db("proyecto");
date_default_timezone_set("America/Costa_Rica");//captura la fecha  y
 $fecha=date ("Y-m-d h:i:s",time());//la guarda en esta variable

$tutu=mysql_query("SELECT groupInfo_id FROM test WHERE status=1 AND application_date<'$fecha'");//me selecciona el groupInfo_id de la tabla test
while ($row = mysql_fetch_array($tutu)) {//con todos las restrinciones
  $y=$row['groupInfo_id']. "\n";
  
  $toto=mysql_query("SELECT student_id FROM registration WHERE groupInfo_id='$y'");//seleciona los estudiantes
   while ($row= mysql_fetch_array($toto)) {
  $t=$row['student_id']. "\n";
  

$tu=mysql_query("SELECT description FROM test WHERE groupInfo_id='$y'");// selecciona la descriccion
while ($row = mysql_fetch_array($tu)) {
  $i=$row['description']. "\n";

$ty=mysql_query("SELECT course_id FROM groupinfo WHERE id='$y'");// selecciona el curso
while ($row = mysql_fetch_array($ty)) {
  $x=$row['course_id']. "\n";

$yy=mysql_query("SELECT name FROM course WHERE id='$x'");// selecciona el curso
while ($row = mysql_fetch_array($yy)) {
  $z=$row['name']. "\n";

$we=mysql_query("SELECT application_date FROM test WHERE groupInfo_id='$y'");//para seleccionar la fecha de activacion
while ($row = mysql_fetch_array($we)) {
  $v=$row['application_date']. "\n";

$w=mysql_query("SELECT term_in_minutes FROM test WHERE groupInfo_id='$y'");//para seleccionar la duracion del quiz
while ($row = mysql_fetch_array($w)) {
  $ve=$row['term_in_minutes']. "\n";

  $k=mysql_query("SELECT id FROM test WHERE groupInfo_id='$y'");//para seleccionar el id de quiz
while ($row = mysql_fetch_array($k)) {
  $ñ=$row['id']. "\n";

$p=mysql_query("SELECT professor_id FROM groupinfo WHERE id='$x'");// selecciona el profesor
while ($row = mysql_fetch_array($p)) {
  $pp=$row['professor_id']. "\n";

$pe=mysql_query("SELECT first_name FROM professor WHERE id='$pp'");// selecciona el profesor
while ($row = mysql_fetch_array($pe)) {
  $ppe=$row['first_name']. "\n";



  $result = mysql_query("SELECT first_name, email FROM student WHERE id='$t'");// busca el nombre y correo de los estudiantes
  while ($row = mysql_fetch_array($result)) {
    
    // HTML body mensaje que va a parecer en el correo
    $body = "Hola <strong>".$row["first_name"].",\n\n";
    $body.= "<p>El ".$i." "."del curso "." ".$z." "."ha sido activado a partir de <p>".$v." "." y por un lapso de ".$ve."minutos..<p>".
    "Seguir el siguiente link para ingresar al sistema automatizado de quices de la UTN.<p>"."http://localhost/test/"."<a href=”http://localhost/test/”></a>".$ñ."Link <p>"
    .$ppe."<p>"."\n\n";
    $body.= "<p><em>Buena Suerte!!</em><p>";
    // Text body
    $text = "Hola ".$row["first_name"].", \n\n";
    $text.= "Sera muy importante...\n\n";
    $text.= $configuration->database->email_from_name;
    // Configurar Email
    $mail->Body = $body;
    $mail->AltBody = $text;
    $mail->AddAddress($row["email"], $row["first_name"]);
    // Enviar el email
    if(!$mail->Send()) {
        echo "Error al enviar a: " . $row["email"] . "<br>";
    }
    $mail->ClearAddresses(); 
}
}
}
}
}
}
}
}
}
    }
      }
?>