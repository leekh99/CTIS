<section class="py-4">
    <h5>Does patient already have an account ?  &emsp;
        <label class="switch">
            <input id="chkForm" type="checkbox" data-toggle="collapse" href="#account-form" onclick="formToggle()">
            <span class="slider round"></span>
            </label>  
    </h5>


    <div class="collapse" id="account-form">
        <form action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="patient_username">Patient's Username</label>
                <input type="text" id="focusUsername" class="form-control" name="patient_username" required>
            </div>

            <div class="form-group">
                <label for="patient_name">Patient's Name</label>
                <input type="text" class="form-control" name="patient_name" required>
            </div>

            <div class="form-group">
                <label for="patient_password">Patient's Password</label>
                <input type="text" class="form-control" name="patient_password" required minlength="5">
            </div>

            <div class="form-group">
                <label for="patient_CrmPassword">Confirm Password</label>
                <input type="text" class="form-control" name="patient_CrmPassword" required minlength="5">
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
                <button class="btn btn-primary shadow" type="submit" name="add_test">CREATE and ADD Test to current Patient Account</button>
            </div>
        </form>
    </div>


    <!-- add test to existing patient account -->
    <div id="test-form">
        <form action="" enctype="multipart/form-data" id="toggle">
            <div class="form-group">
                <label for="patient_username">Patient's Username</label>
                <input type="text" id="focusDefaultUsername" class="form-control" name="patient_username" required autofocus>
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
                <textarea class="form-control" name="patient_symptom" id="" cols="30" rows="10" required></textarea>
            </div>
    
            <div class="form-group">
                <button class="btn btn-primary shadow" type="submit" name="add_test">Add Test to Patient</button>
            </div>
        </form>
    </div>
</section>