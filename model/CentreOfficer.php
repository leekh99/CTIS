<?php 

class CentreOfficer extends User{
    private $position;
    private $testCentre;
    private $tests = [];    

    function __construct($username, $password, $name, $position){
        parent::__construct($username, $password, $name);
        set_position($position);
        set_testCentre(null);
        set_tests([]);
    }

    public function addTest($test){
        get_tests()->array_push($test);
        $test.setTester($this);

        // SAVE DATABASE
    }

    public function findTests($testID){
        // CONNECT TO DATABASE

        return null;
    }

    public function numOfTests(){
        return sizeof(get_tests());
    }

    public function viewTestHistory(){
        // Display all test
        

    }


    // GETTERS & SETTERS
    function get_position(){
        return $this->$position;
    }

    function set_position($newPosition){
        $this->$position = $newPosition;
    }

    function get_testCentre(){
        return $this->$testCentre;
    }

    function set_testCentre($newTestCentre){
        $this->$testCentr = $testCentre;
    }

    function get_tests(){
        return $this->$tests;
    }

    function set_tests($newTests){
        $this->$tests = $newTests;
    }


}

?>