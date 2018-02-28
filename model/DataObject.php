<?php
/**
 * CREATE TABLE LCDating(
        member_id int AUTO_INCREMENT PRIMARY KEY NOT NULL,
        fname varchar (20),
        lname varchar (20),
        age int (3),
        gender varchar (10),
        phone int (10),
        email varchar (30),
        state varchar (30),
        seeking varchar (10),
        bio varchar (500),
        premium tinyint,
        image varchar (50),
        interests varchar (200)
    );
 * */

    require_once "/home/kbarterg/config.php";

    abstract class DataObject {

        protected $data = array();

        public function __construct($data)
        {
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $this->data)) $this->data[$key] = $value;
            }
        }

        public function getValue($field){
            if(array_key_exists($field, $this->data)){
                return $this ->data[$field];
            }
            else
            {
                die("Field Not found");
            }
        }

        public function getValueEncoded($field)
        {
            return htmlspecialchars($this->getValue($field));
        }

        protected function connect(){
            try {
                $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                $conn->setAttribute(PDO::ATTR_PERSISTENT, true);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e)
            {
                die("Connection failed: ".$e->getMessage());
            }

            return $conn;
        }

        protected function disconnect($conn){
            $conn = "";
        }
    }