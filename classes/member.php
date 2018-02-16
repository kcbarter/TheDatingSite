<?php

    /**
     * Class Member
     * The class represents a regular member who did not click the Premium Member
     * check box when creating an account.
     * @author Kevan Barter
     */
    class Member {
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
    }