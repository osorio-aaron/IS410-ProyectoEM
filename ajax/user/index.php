<?php
    header('Content-Type: application/json');
    include_once('../../class/class-usuario.php');
    require_once('../../class/class-database.php');
    
    $database = new Database();

    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_GET['accion']) && $_GET['accion']=='login'){ 
        Usuario::login($_POST['email'], $_POST['password'] ,$database->getDB());
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        $u = new Usuario(
                $_POST['firstName'],
                $_POST['lastName'],
                $_POST['email'],
                $_POST['password'],
            );
        echo $u->crearUsuario($database->getDB());        
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] =='PUT' && isset($_GET['id'])){
        $_PUT=array();
        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
            parse_str(file_get_contents("php://input"), $_PUT);

        $u = new Usuario(
            $_PUT['firstName'],
            $_PUT['lastName'],
            $_PUT['email'],
            $_PUT['password'],
        );
        echo $u->actualizarUsuario($database->getDB(),$_GET['id']);
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        Usuario::verificarEmail($database->getDB(), $_GET['userEmail']);
        exit();
    }
?>