<?php 
if (isset($_GET['patientUsername'])){
    $patient = $_GET['patientUsername'];
}
?>

<section class="py-5">
    <h3>Please select a test kit to record a test :</h3> <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">KitID</th>
            <th scope="col">Kit Name</th>
            <th scope="col">Available Stock</th>
            <th scope="col">Select Test Kit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">TK1</th>
            <td>Antigen Test</td>
            <td>20</td>
            <td><a href='posts.php?delete={$post_id}'>Select</a></td>
            </tr>
            <tr>
            <th scope="row">TK2</th>
            <td>Rapid Detection Test</td>
            <td>35</td>
            <td><a href='posts.php?={$post_id}'>Select</a></td>
            </tr>
            <tr>
            <th scope="row">TK3</th>
            <td>Molecular Test</td>
            <td>50</td>
            <td><a href='recordTest.php?source=create_test&p_id={$post_id}'>Select</a></td>
            </tr>
        </tbody>
        </table>
</section>