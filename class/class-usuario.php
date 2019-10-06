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
            }
            echo json_encode($respuesta);
        }
    }
?>