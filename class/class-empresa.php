<?php
	class Empresa{
		private $companyName;
		private $companyEmail;
		private $img;
		private $ubicacion;
		private $latitud;
		private $longitud;
		private $password;
		public function __construct(
			$companyName,
			$companyEmail,
			$img,
			$ubicacion,
			$latitud,
			$longitud,
			$password
		){
			$this->companyName = $companyName;
			$this->companyEmail = $companyEmail;
			$this->img = $img;
			$this->ubicacion = $ubicacion;
			$this->latitud = $latitud;
			$this->longitud = $longitud;
			$this->password = $password;
		}

		public function __toString(){
			return json_encode($this->getData());
		}

		public function getCompanyName(){
			return $this->companyName;
		}

		public function setCompanyName($companyName){
			$this->companyName = $companyName;
		}

		public function getCompanyEmail(){
			return $this->companyEmail;
		}

		public function setCompanyEmail($companyEmail){
			$this->companyEmail = $companyEmail;
		}

		public function getImg(){
			return $this->img;
		}

		public function setImg($img){
			$this->img = $img;
		}

		public function getUbicacion(){
			return $this->ubicacion;
		}

		public function setUbicacion($ubicacion){
			$this->ubicacion = $ubicacion;
		}
		public function getLatitud(){
			return $this->latitud;
		}

		public function setLatitud($latitud){
			$this->latitud = $latitud;
		}
		public function getLongitud(){
			return $this->longitud;
		}

		public function setLongitud($longitud){
			$this->longitud = $longitud;
		}
		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}
		
		public function getData(){
			$result['companyName'] = $this->companyName;
			$result['companyEmail'] = $this->companyEmail;
			$result['img'] = $this->img;
			$result['ubicacion'] = $this->ubicacion;
			$result['latitud'] = $this->latitud;
			$result['longitud'] = $this->longitud;
			$result['password'] = password_hash($this->password,PASSWORD_DEFAULT);
			return $result;
		}

		public function crearEusuario($db){
			$empresa = $this->getData();
			$result = $db->getReference('eUsers')
			->push($empresa);
			
			if ($result->getKey() != null)
				return '{"mensaje":"Registro almacenado","key":"'.$result->getKey().'"}';
			else 
				return '{"mensaje":"Error al guardar el registro"}';
		}

		public static function login($email, $password, $db){
            $result = $db->getReference('eUsers')
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

                $db->getReference('eUsers/'.$key.'/token')
                    ->set($respuesta["token"]);
            }
            echo json_encode($respuesta);
        }

	}
?>