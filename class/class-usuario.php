<?php
    class Usuario{
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        public function __construct(
            $firstName,
            $lastName,
            $email,
            $password
        ){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
        }
        public function setFirstName($firstName){
            $this->firstName = $firstName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
        }
        public function __toString(){
            return json_encode($this->getData());
        }
        public function crearUsuario($db){
            $usuarios = $this->getData();
            $result = $db->getReference('users')
               ->push($usuarios);
               
            if ($result->getKey() != null)
                return '{"mensaje":"Registro almacenado","key":"'.$result->getKey().'"}';
            else 
                return '{"mensaje":"Error al guardar el registro"}';
        }
        public static function obtenerUsuarios($db){
            $result = $db->getReference('users')
                ->getSnapshot()
                ->getValue();

            echo json_encode($result);
        }
        public function actualizarUsuario($db, $id){
            $result = $db->getReference('users')
                ->getChild($id)
                ->set($this->getData());
            
            if ($result->getKey() != null)
                return '{"mensaje":"Registro actualizado","key":"'.$result->getKey().'"}';
            else 
                return '{"mensaje":"Error al actualizar el registro"}';
        }
        public function getData(){
            $result['firstName'] = $this->firstName;
            $result['lastName'] = $this->lastName;
            $result['email'] = $this->email;
            $result['password'] = password_hash($this->password,PASSWORD_DEFAULT);
            return $result;
        }
        public static function login($email, $password, $db){
            $result = $db->getReference('users')
                ->orderByChild('email')
                ->equalTo($email)
                ->getSnapshot()
                ->getValue();

            $key = array_key_first($result);
            $valido = password_verify($password, $result[$key]['password']);
            $respuesta["valido"] = $valido==1?true:false;
            if($respuesta["valido"]){
                $respuesta["key"] = $key;
                $respuesta["email"] = $result[$key]['email'];
                $respuesta["token"] = bin2hex(openssl_random_pseudo_bytes(16));
                setcookie('key',$respuesta['key'], time() + (86400 * 15), "/");
                setcookie('email',$respuesta['email'], time() + (86400 * 15), "/");
                setcookie('token',$respuesta['token'], time() + (86400 * 15), "/");

                $db->getReference('users/'.$key.'/token')
                    ->set($respuesta["token"]);
            }
            echo json_encode($respuesta);
        }
        public static function verificarEmail($db, $email){
            $result = $db->getReference('users')
                ->orderByChild('email')
                ->equalTo($email)
                ->getSnapshot()
                ->getValue();
            
            $key = array_key_first($result);
            if (isset($result[$key]['email']) && $result[$key]['email'] == $email){
                echo '{"mensaje":"El usuario con llave '.$key.' tiene vinculado este correo", "valor":"false"}';
            }
            else
                echo '{"mensaje":"Correo disponible", "valor":"true"}';
        }

        public static function verificarAutenticacion($db){
            if (!isset($_COOKIE['key'])){
                echo '{"valor":"No se ha iniciado sesion"}';
                exit();
            }
            $result = $db->getReference('users')
                ->getChild($_COOKIE['key'])
                ->getValue();
            if ($result['token'] == $_COOKIE['token'])
                echo '{"valor": "valido", "infoUser": '.json_encode($result).'}';
            else
                echo '{"valor":"No se ha iniciado sesion"}';
        }

        public static function limpiarCookies(){
            setcookie('email', "", time() - 3600, "/");
            setcookie('key', "", time() - 3600, "/");
            setcookie('token', "", time() - 3600, "/");
            header('Location: ../../index.php');
        }
    }
?>