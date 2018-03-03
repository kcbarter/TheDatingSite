<?php

    /**
     * Class PremiumMember
     * This class represents a premium member if the user clicked the checkbox for premium
     * member.
     * @author Kevan Barter
     */
    class PremiumMember extends Member {
        private $_inDoorInterests;
        private $_outDoorInterest;

        function __construct($fname, $lname, $age, $gender, $phone)
        {
            parent::__construct($fname, $lname, $age, $gender, $phone);
        }

        /**
         * Getter for inDoorInterests
         * @return mixed
         */
        public function getInDoorInterests()
        {
            return $this->_inDoorInterests;
        }

        /**
         * Setter for inDoorInterests
         * @param mixed $inDoorInterests
         */
        public function setInDoorInterests($inDoorInterests)
        {
            $this->_inDoorInterests = $inDoorInterests;
        }

        /**
         * Getter for outDoorInterest
         * @return mixed
         */
        public function getOutDoorInterest()
        {
            return $this->_outDoorInterest;
        }

        /**
         * Setter for outDoorInterest
         * @param mixed $outDoorInterest
         */
        public function setOutDoorInterest($outDoorInterest)
        {
            $this->_outDoorInterest = $outDoorInterest;
        }

        public static function getPreMembers()
        {
            $dataObject = new DataObject();
            $conn = $dataObject->connect();

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

        function addPreMember($fname, $lname, $age, $gender, $phone, $email, $state,
                           $seeking, $bio, $_inDoorInterests, $_outDoorInterest)
        {
            $dbh = parent::connect();
            $image = '';
            $activities = implode(", ", $_inDoorInterests).', '.implode(", ", $_outDoorInterest);

            //define query
            $sql = "INSERT INTO LCDating
                  (fname, lname, age, gender, phone, email,
                  state, seeking, bio, premium, image, interests)
                  VALUES (:fname, :lname, :age, :gender, :phone, :email,
                  :state, :seeking, :bio, 0, :image, :interests)";


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
            $statement->bindParam(':interests', $activities, PDO::PARAM_STR);

            //execute statement
            $success = $statement->execute();

            //return the result
            return $success;
        }
    }