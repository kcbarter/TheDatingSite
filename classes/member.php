<?php

    /**
     * Class Member
     * The class represents a regular member who did not click the Premium Member
     * check box when creating an account.
     * @author Kevan Barter
     */

    class Member extends DataObject {
        protected $fname;
        protected $lname;
        protected $age;
        protected $gender;
        protected $phone;
        protected $email;
        protected $state;
        protected $seeking;
        protected $bio;

        /**
         * Member constructor.
         * @param $fname
         * @param $lname
         * @param $age
         * @param $gender
         * @param $phone
         */
        function __construct($fname, $lname, $age, $gender, $phone)
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->age = $age;
            $this->gender = $gender;
            $this->phone = $phone;
        }

        /**
         * Getter for fname
         * @return mixed
         */
        public function getFname()
        {
            return $this->fname;
        }

        /**
         * Setter for fname
         * @param mixed $fname
         */
        public function setFname($fname)
        {
            $this->fname = $fname;
        }

        /**
         * Getter for lname
         * @return mixed
         */
        public function getLname()
        {
            return $this->lname;
        }

        /**
         * Setter for lname
         * @param mixed $lname
         */
        public function setLname($lname)
        {
            $this->lname = $lname;
        }

        /**
         * Getter age
         * @return mixed
         */
        public function getAge()
        {
            return $this->age;
        }

        /**
         * Setter age
         * @param mixed $age
         */
        public function setAge($age)
        {
            $this->age = $age;
        }

        /**
         * Getter for gender
         * @return mixed
         */
        public function getGender()
        {
            return $this->gender;
        }

        /**
         * Setter for gender
         * @param mixed $gender
         */
        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        /**
         * Getter for phone
         * @return mixed
         */
        public function getPhone()
        {
            return $this->phone;
        }

        /**
         * Setter for phone
         * @param mixed $phone
         */
        public function setPhone($phone)
        {
            $this->phone = $phone;
        }

        /**
         * Getter for email
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Setter for email
         * @param mixed $email
         */
        public function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * Getter for state
         * @return mixed
         */
        public function getState()
        {
            return $this->state;
        }

        /**
         * Setter for state
         * @param mixed $state
         */
        public function setState($state)
        {
            $this->state = $state;
        }

        /**
         * Getter for seeking
         * @return mixed
         */
        public function getSeeking()
        {
            return $this->seeking;
        }

        /**
         * Setter for seeking
         * @param mixed $seeking
         */
        public function setSeeking($seeking)
        {
            $this->seeking = $seeking;
        }

        /**
         * Getter for bio
         * @return mixed
         */
        public function getBio()
        {
            return $this->bio;
        }

        /**
         * Setter for bio
         * @param mixed $bio
         */
        public function setBio($bio)
        {
            $this->bio = $bio;
        }

        public static function getMembers()
        {
            $conn = parent::connect();

            //define query
            $sql = "SELECT * FROM LCDating ORDER  BY lname, fname, member_id";

            //prepare a statement
            $statement = $conn->prepare($sql);

            //bind parameters
            //no parameters to bind

            //execute
            $statement->execute();

            //fetch results
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            //return any values if applicable
            return $results;
        }

        function addMember($fname, $lname, $age, $gender, $phone, $email, $state,
                $seeking, $bio)
        {
            global $dbh;
            $interests = '';
            $image = '';

            //define query
            $sql = "INSERT INTO LCDating
                  VALUES (:fname, :lname, :age, :gender, :phone, :email,
                  :state, :seeking, :bio, :image, :interests)";


            //prepare statement
            $statement = $dbh->prepare($sql);

            //bind parameter
            $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
            $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
            $statement->bindParam(':age', $age, PDO::PARAM_STR);
            $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
            $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':seeking', $seeking, PDO::PARAM_STR);
            $statement->bindParam(':bio', $bio, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':interests',$interests, PDO::PARAM_STR);

            //execute statement
            $success = $statement->execute();

            //return the result
            return $success;
        }
    }