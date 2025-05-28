<?php
    include "php/conn.php";
    if (!isset($_GET['client'])) {
        header("location: addjob.php");
        exit();
    }

    $client = $_GET['client']; 
    $select = mysqli_query($conn, "SELECT * FROM `addjob` WHERE crud_id = '$client'");
    $fecth = mysqli_fetch_assoc($select);

    if (isset($_POST['submit'])) {
        $title = trim($_POST['jobTitle']);
        $description = trim($_POST['jobDescription']);
        $update = mysqli_query($conn, "UPDATE `addjob` SET `jobTitle`='$title',`jobDescription`='$description' WHERE `crud_id` = '$client'");

        if ($update) {
            header("location: edit.php?client=$client&success=Job Edited Successfully");
            exit();  
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container my-5">
        <h2>Edit Job</h2>
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
                    <input type="text" value="<?php echo $fecth['jobTitle']; ?>" name="jobTitle" class="form-control" placeholder="Job Title" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Job Description</label>
                <div class="col-sm-6">
                    <input type="text" value="<?php echo $fecth['jobDescription']; ?>" name="jobDescription" class="form-control" placeholder="Job Description" required>
                </div>
            </div>
           
            <div class="row mb-3">
               <button type="submit" name="submit" class="col-sm-3 btn btn-primary">Edit</button>
                <div class="col-sm-6">
                   <a href="addjob.php" class="btn btn-outline-primary">Go Back</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
