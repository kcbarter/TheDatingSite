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

    }