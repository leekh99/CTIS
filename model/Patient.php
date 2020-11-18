<?php 

class Patient extends User{
    private $patientType;
    private $symptoms;
    private $tests = [];


    function __construct($username, $password, $name, $patientType, $symptoms){
        parent::__construct($username, $password, $name);
        set_patientType($patientType);
        set_symptoms($symptoms);
        set_tests([]);
    }

    
    public function addTest($test){
        get_tests()->array_push($test);
        $test.setPatient($this);

        // SAVE DATABASE
    }

    public function findTests($testID){
        // CONNECT TO DATABASE

        return null;
    }

    public function numOfTests(){
        return sizeof(get_tests());
    }



     // GETTERS & SETTERS
    function get_patientType(){
        return $this->$patientType;
    }

    function set_patientType($newPatientType){
        $this->$patientType = $newPatientType;
    }

    function get_symptoms(){
        return $this->$symptoms;
    }

    function set_symptoms($newSymptoms){
        $this->$symptoms = $newSymptoms;
    }

    function get_tests(){
        return $this->$tests;
    }

    function set_tests($newTests){
        $this->$tests = $newTests;
    }


}

?>