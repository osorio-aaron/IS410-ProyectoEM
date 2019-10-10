<?php

    header('Content-Type: application/json');
    include_once('../../class/class-empresa.php');
    require_once('../../class/class-database.php');

    $database = new Database();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        Empresa::login($_POST['companyEmail'], $_POST['password'] ,$database->getDB());
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ubicacion'])){
        $carpeta = '../../img/'.$_POST['companyName'].'';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }
        if ($_FILES['txtImg']['error'] == 0) {
            // Donde se va a guardar el fichero (la imagen)
            move_uploaded_file($_FILES['txtImg']['tmp_name'], '../../img/'.$_POST['companyName'].'/logo.jpg');
        }
        $u = new Empresa(
                $_POST['companyName'],
                $_POST['companyEmail'],
                '../../img/'.$_POST['companyName'].'/logo.jpg',
                $_POST['ubicacion'],
                $_POST['latitud'],
                $_POST['longitud'],
                $_POST['password'],
            );
        echo $u->crearEusuario($database->getDB());        
        exit();
    }

?>