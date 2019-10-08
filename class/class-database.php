<?php
    require_once(__DIR__.'/../vendor/autoload.php');
    use Kreait\Firebase\Factory;

    class Database{
        private $keyFile = __DIR__.'/../secret/easy-market-800b5-78af79defe5e.json';
        private $URI = 'https://easy-market-800b5.firebaseio.com/';
        private $db;

        public function __construct(){
            $firebase = (new Factory)
                ->withServiceAccount($this->keyFile)
                ->withDatabaseUri($this->URI)
                ->create();

            $this->db = $firebase->getDatabase();
        }

        public function getDB(){
            return $this->db;
        }
    }
?>