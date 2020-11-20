<!-- breadcrumb navigation -->
<?php 
global $connection;
if (isset($_GET['tkID'])){
    $tkID = $_GET['tkID'];
}

if (isset($_GET['pUsername'])){
    $patientUsername = $_GET['pUsername'];
    $query = "SELECT * FROM patient WHERE username = '$patientUsername'";
    $selectPatient = mysqli_query($connection, $query);
    //$symptoms;
    while ($row = mysqli_fetch_assoc($selectPatient)){
        $patientType = $row['patientType'];
        $symptoms = $row['symptoms'];
    }
}

?>
<header>
    <h2>Record Test &nbsp; <i class="fas fa-vial"></i> </h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item" href="recordTest.php">Select Test Kit</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="breadcrumb-item disabled" href="#">Record New Test</a></li>
        </ol>
    </nav>
</header>

<section class="py-4">
    <h5>Does patient already have an account ?  &emsp;
        <label class="switch">
            <input id="chkForm" type="checkbox" data-toggle="collapse" href="#account-form" onclick="formToggle()">
            <span class="slider round"></span>
            </label>  
    </h5>


    <div class="collapse" id="account-form">
        <form action="" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="testKitID">Test Kit Selected : </label> 
                <input type="text" class="form-control" name="testKitID" value="TK<?php echo $tkID; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="patient_username">Patient's Username</label>
                <input type="text" id="createUsername" class="form-control" name="patient_username" required>
            </div>

            <div class="form-group">
                <label for="patient_name">Patient's Name</label>
                <input type="text" class="form-control" name="patient_name" required>
            </div>

            <div class="form-group">
                <label for="patient_password">Patient's Password</label>
                <input type="text" class="form-control" name="patient_password" id="pass">
            </div>

            <div class="form-group">
                <label for="patient_CrmPassword">Confirm Password</label>
                <input type="text" class="form-control" name="patient_CrmPassword" id="passMatch">
            </div>

            <div class="form-group">
                <label for="patient_type">Patient Type</label>
                <select class="form-control" name="patient_type">
                    <option value="returnee">Returnee</option>
                    <option value="quarantined">Quarantined</option>
                    <option value="close_contact">Close Contact</option>
                    <option value="infected">Infected</option>
                    <option value="suspected">Suspected</option>
                </select>
            </div>

            <div class="form-group">
                <label for="patient_symptom">Patient's Symptoms</label>
                <textarea class="form-control" name="patient_symptom" id="" cols="30" rows="10" required></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary shadow" type="submit" name="create_add_test">CREATE and ADD Test to current Patient Account</button>
            </div>
        </form>
    </div>


    <!-- add test to existing patient account -->
    <div id="test-form">
        <form action="" enctype="multipart/form-data" id="toggle" method="POST">
            <div class="form-group">
                <label for="testKitName">Test Kit Selected : </label>
                <input type="text" class="form-control" name="testKitName" value="TK<?php echo $tkID; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="patient_username">Patient's Username</label>
                <input type="text" id="username" class="form-control" name="patient_username" 
                    value="<?php if(isset($patientUsername)) echo $patientUsername?>" required autofocus>
            </div>
    
            <div class="form-group">
                <label for="patient_type">Patient Type</label>
                <select class="form-control" name="patient_type" id="patientType">
                    <option value="returnee">Returnee</option>
                    <option value="quarantined">Quarantined</option>
                    <option value="close_contact">Close Contact</option>
                    <option value="infected">Infected</option>
                    <option value="suspected">Suspected</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="patient_symptom">Patient's Symptoms</label>
                <textarea class="form-control" name="patient_symptom" id="" cols="30" rows="10" 
                    value= "<?php if(isset($symptoms)) echo $symptoms?>" required></textarea>
            </div>
    
            <div class="form-group">
                <button class="btn btn-primary shadow" type="submit" name="add_test">Add Test to Patient</button>
            </div>
        </form>
    </div>
</section>