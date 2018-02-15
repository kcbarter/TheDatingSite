<?php

    class PremiumMember extends Member {
        private $_inDoorInterests;
        private $_outDoorInterest;

        function __construct($fname, $lname, $age, $gender, $phone)
        {
            parent::__construct($fname, $lname, $age, $gender, $phone);
        }

        /**
         * @return mixed
         */
        public function getInDoorInterests()
        {
            return $this->_inDoorInterests;
        }

        /**
         * @param mixed $inDoorInterests
         */
        public function setInDoorInterests($inDoorInterests)
        {
            $this->_inDoorInterests = $inDoorInterests;
        }

        /**
         * @return mixed
         */
        public function getOutDoorInterest()
        {
            return $this->_outDoorInterest;
        }

        /**
         * @param mixed $outDoorInterest
         */
        public function setOutDoorInterest($outDoorInterest)
        {
            $this->_outDoorInterest = $outDoorInterest;
        }

    }