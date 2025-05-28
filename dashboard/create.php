<?php
    include "php/conn.php";

    if(isset($_POST['submit'])){
        $ran_id = rand(time(), 100000000);
        $title = trim($_POST['jobTitle']);  
        $description = trim($_POST['jobDescription']); 


        $insert = mysqli_query($conn, "INSERT INTO `addjob`( `crud_id`,`jobTitle`, `jobDescription`) 
        VALUES ('$ran_id','$title','$description')");

        if($insert) {
        header("location: create.php?success=Job Created Successfull");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Crud Project</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Job</h2>
        <br><br>
<form action="" method="post">
    <?php
        if (isset($_GET['success'])) {
            echo '<div class="w-25 alert alert-success" role="alert">' . $_GET['success'] . '</div>';
        }
    ?>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Job Title</label>
        <div class="col-sm-6">
            <input type="text" name="jobTitle" class="form-control" placeholder="Job Title" required>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Job Description</label>
        <div class="col-sm-6">
            <input type="text" name="jobDescription" class="form-control" placeholder="Job Description" required>
        </div>
    </div>
    <div class="row mb-3">
        <button type="submit" name="submit" class="col-sm-3 btn btn-primary">Submit</button>
        <div class="col-sm-6">
            <a href="addjob.php" class="btn btn-outline-primary">Go Back</a>
        </div>
    </div>
</form>
