<?php
session_start();
include("config.php"); // config.php sets up the PDO connection as $conn

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ensure user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// Fetch user data for sidebar (if needed)
$select_profile = $conn->prepare("SELECT * FROM users WHERE email = ?");
$select_profile->execute([$email]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

// --- Process PDF Upload if the form is submitted ---
if (isset($_POST['pdf-upload'])) {
    // Check if all files have a PDF extension
    $allPdf = true;
    foreach ($_FILES['multiple_pdf']['name'] as $file) {
        $fileExt = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if ($fileExt !== 'pdf') {
            $allPdf = false;
            break;
        }
    }
    
    if (!$allPdf) {
        $msg = "Error: Only PDF files are allowed.";
    } else {
        // Array to store successfully uploaded filenames
        $uploaded_files = [];
        for ($i = 0; $i < count($_FILES['multiple_pdf']['name']); $i++) {
            $fileName   = basename($_FILES['multiple_pdf']['name'][$i]);
            $uploadfile = $_FILES['multiple_pdf']['tmp_name'][$i];
            $targetpath = "uploads/" . $fileName;
            
            // Upload the file to the server
            if (move_uploaded_file($uploadfile, $targetpath)) {
                $uploaded_files[] = $fileName;
            } else {
                $msg = "Error uploading file: " . $fileName;
            }
        }
        
        // If at least one file was successfully uploaded, insert the record
        if (!empty($uploaded_files) && empty($msg)) {
            $files = implode(', ', $uploaded_files);
            $uni_id = uniqid(); 
            $insert_query = $conn->prepare("INSERT INTO resume (resume_id, files) VALUES (?, ?)");
            if ($insert_query->execute([$uni_id, $files])) {
                $msg = "PDF(s) uploaded successfully";
            } else {
                $msg = "Error inserting record into database!";
            }
        }
    }
}

// --- Fetch job details or listing ---
if (isset($_GET['crud_id'])) {
    $crud_id = $_GET['crud_id'];
    // Fetch the specific job record (removed jobImage column)
    $stmt = $conn->prepare("SELECT crud_id, jobTitle, jobDescription FROM addjob WHERE crud_id = ?");
    $stmt->execute([$crud_id]);
    $job_detail = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Otherwise, fetch all job listings
    $stmt = $conn->prepare("SELECT crud_id, jobTitle, jobDescription FROM addjob");
    $stmt->execute();
    $jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Available Job</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- Main CSS files -->
  <link rel="stylesheet" href="css/jobavailable.css">
  <link rel="stylesheet" href="css/styless.css">
</head>
<body>
  <!-- SIDEBAR -->
  <section id="sidebar">
      <a href="#" class="brand">
          <i class='bx'></i>
          <span class="text">HRHub</span>
      </a>
      <ul class="side-menu top">
          <li><a href="index.php"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
          <li class="active"><a href="availablejob.php"><i class='bx bxs-shopping-bag-alt'></i><span class="text">Available Jobs</span></a></li>
          <li><a href="addjob.php"><i class='bx bxs-doughnut-chart'></i><span class="text">Add Job</span></a></li>
      </ul>
      <ul class="side-menu">
          <li><a href="myaccount.php"><i class='bx bxs-cog'></i><span class="text">My Account</span></a></li>
          <li><a href="../logout.php" class="logout"><i class='bx bxs-log-out-circle'></i><span class="text">Logout</span></a></li>
      </ul>
  </section>
  <!-- SIDEBAR -->

  <!-- CONTENT -->
  <section id="content">
      <!-- NAVBAR -->
      <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Automated Resume Screening System</a>
        <form action="#"></form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a>
          <?php
          // Display user's first and last name
          $query = $conn->prepare("SELECT firstName, lastName FROM users WHERE email = ?");
          $query->execute([$email]);
          $user = $query->fetch(PDO::FETCH_ASSOC);
          if ($user) {
              echo htmlspecialchars($user['firstName'] . ' ' . $user['lastName']);
          }
          ?>
        
        </a>
      </nav>
      <!-- MAIN CONTENT -->
      <div class="job-container">
          <?php if (isset($job_detail) && $job_detail): ?>
              <!-- DETAILS VIEW: Two-column layout -->
              <div class="details-container">
                  <!-- Left Column: Job Details -->
                  <div class="job-details">
                      <h2><?= htmlspecialchars($job_detail['jobTitle']) ?></h2>
                      <p><?= nl2br(htmlspecialchars($job_detail['jobDescription'])) ?></p>
                      <a class="back-btn" href="availablejob.php">Back to Job Listings</a>
                  </div>
                  <!-- Right Column: PDF Upload Interface -->
                  <div class="upload-container">
                      <h3 align="center">Upload PDF(s) for Job</h3><br/>
                      <div class="box">
                        <form method="post" enctype="multipart/form-data" action="availablejob.php?crud_id=<?= urlencode($job_detail['crud_id']) ?>">
                          <div class="form-group">
                          <label for="multiple_pdf" style="display: block; margin-bottom: 15px;">Select Multiple PDF Files</label>
                            <!-- The accept attribute ensures only PDFs can be selected -->
                            <input type="file" name="multiple_pdf[]" class="form-control" multiple accept="application/pdf" required/>
                          </div>  
                          <input type="submit" id="pdf-upload" name="pdf-upload" value="Submit" class="details-btn" style="width: 200px;" />
                            </div>
                          <p class="error"><?php if (!empty($msg)) { echo $msg; } ?></p>
                        </form>
                      </div>
              </div>
          <?php else: ?>
              <!-- LISTING VIEW -->
              <?php if (isset($jobs) && count($jobs) > 0): ?>
                  <?php foreach ($jobs as $job): ?>
                      <div class="job-card">
                          <h2><?= htmlspecialchars($job['jobTitle']) ?></h2>
                          <p>
                              <?php
                              $description = isset($job['jobDescription']) ? $job['jobDescription'] : 'No description available';
                              $words = explode(' ', $description);
                              echo htmlspecialchars(implode(' ', array_slice($words, 0, 10))) . '...';
                              ?>
                          </p>
                          <!-- "Details" link passes the job's crud_id -->
                          <a class="details-btn" href="availablejob.php?crud_id=<?= urlencode($job['crud_id']) ?>">Details</a>
                      </div>
                  <?php endforeach; ?>
              <?php else: ?>
                  <p>No job listings available.</p>
              <?php endif; ?>
          <?php endif; ?>
      </div>
  </section>

  <script src="../dashboard/js/script.js"></script>
</body>
</html>
