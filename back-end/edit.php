<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "database_college";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Initialize variables for employee details
$name = $certificate = $description = $department = $email
    = $date = $general_specialty = $specific_specialty
    = $country_granting_the_certificate = $the_body_granting_the_certificate
    = $date_of_granting_the_certificate =
    $search_name0 = $search_link0 = $search_name1 = $search_link1 = $search_name2 = $search_link2 =
    $search_name3 = $search_link3 = $search_name4 = $search_link4 = $search_name5 = $search_link5 = "";

$errorMessage = "";
$successMessage = "";

// Check if a specific employee is being edited
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve the details of the employee from the database
    $sql = "SELECT * FROM db WHERE id = $id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Populate the form fields with the employee's details
        $name = $row["name"];
        $certificate = $row["certificate"];
        $description = $row["description"];
        $department = $row["department"];
        $email = $row["email"];
        $date = $row["date"];
        $general_specialty = $row["general_specialty"];
        $specific_specialty = $row["specific_specialty"];
        $country_granting_the_certificate = $row["country_granting_the_certificate"];
        $the_body_granting_the_certificate = $row["the_body_granting_the_certificate"];
        $date_of_granting_the_certificate = $row["date_of_granting_the_certificate"];

        $search_name0 = $row["search_name0"];
        $search_link0 = $row["search_link0"];
        $search_name1 = $row["search_name1"];
        $search_link1 = $row["search_link1"];
        $search_name2 = $row["search_name2"];
        $search_link2 = $row["search_link2"];
        $search_name3 = $row["search_name3"];
        $search_link3 = $row["search_link3"];
        $search_name4 = $row["search_name4"];
        $search_link4 = $row["search_link4"];
        $search_name5 = $row["search_name5"];
        $search_link5 = $row["search_link5"];
    } else {
        $errorMessage = "Dr not found";
    }
}

// Check if the form is submitted
if (isset($_POST["edit"])) {
    // Get the values from the form
    $name = htmlspecialchars($_POST["name"]);
    $certificate = htmlspecialchars($_POST["certificate"]);
    $description = htmlspecialchars($_POST["description"]);
    $department = htmlspecialchars($_POST["department"]);
    $email = htmlspecialchars($_POST["email"]);
    $date = htmlspecialchars($_POST["date"]);
    $general_specialty = htmlspecialchars($_POST["general_specialty"]);
    $specific_specialty = htmlspecialchars($_POST["specific_specialty"]);
    $country_granting_the_certificate = htmlspecialchars($_POST["country_granting_the_certificate"]);
    $the_body_granting_the_certificate = htmlspecialchars($_POST["the_body_granting_the_certificate"]);
    $date_of_granting_the_certificate = htmlspecialchars($_POST["date_of_granting_the_certificate"]);
    $search_name0 = htmlspecialchars($_POST["search_name0"]);
    $search_link0 = htmlspecialchars($_POST["search_link0"]);
    $search_name1 = htmlspecialchars($_POST["search_name1"]);
    $search_link1 = htmlspecialchars($_POST["search_link1"]);
    $search_name2 = htmlspecialchars($_POST["search_name2"]);
    $search_link2 = htmlspecialchars($_POST["search_link2"]);
    $search_name3 = htmlspecialchars($_POST["search_name3"]);
    $search_link3 = htmlspecialchars($_POST["search_link3"]);
    $search_name4 = htmlspecialchars($_POST["search_name4"]);
    $search_link4 = htmlspecialchars($_POST["search_link4"]);
    $search_name5 = htmlspecialchars($_POST["search_name5"]);
    $search_link5 = htmlspecialchars($_POST["search_link5"]);
    // Handle Image Upload
    if ($_FILES["img"]["size"] > 0) {
        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "uplode/" . $filename;
    } else {
        // If no new image uploaded, keep the old image
        $filename = $_POST["old_img"];
    }

    // Update the employee details in the database
    $sql = "UPDATE db SET name = '$name', img = '$filename',
certificate = '$certificate', description = '$description', 
department = '$department', email = '$email', date = '$date',
general_specialty = '$general_specialty', specific_specialty = '$specific_specialty', 
country_granting_the_certificate = '$country_granting_the_certificate', 
the_body_granting_the_certificate = '$the_body_granting_the_certificate',
date_of_granting_the_certificate = '$date_of_granting_the_certificate',

search_name0= '$search_name0',
search_link0= '$search_link0',
search_name1= '$search_name1',
search_link1= '$search_link1',
search_name2= '$search_name2',
search_link2= '$search_link2',
search_name3= '$search_name3',
search_link3= '$search_link3',
search_name4= '$search_name4',
search_link4= '$search_link4',
search_name5= '$search_name5',
search_link5= '$search_link5'
WHERE id = $id";


    if ($connection->query($sql) === TRUE) {
        $successMessage = " Dr updated successfully";
        // move_uploaded_file($tempname, $folder); // Store the uploaded image
    } else {
        $errorMessage = "Error updating Dr...: " . $connection->error;
    }
}

// Close connection
$connection->close();
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="shortcut icon" href="assets/img/logo_p.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container my-5">
        <h2>Edit Dr. </h2>
        <?php
        if (!empty($errorMessage)) {
            echo
            "
      <div class='row mb-3'>
      <div class='offset-sm-3 col-sm-6 '>
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
      </div>
      </div>
      </div>
  ";
        }
        ?>
        <?php
        if (!empty($successMessage)) {
            echo
            "
      <div class='row mb-3'>
      <div class='offset-sm-3 col-sm-6 '>
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
      </div>
      </div>
      </div>
  ";
        }
        ?>

        <form class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" for="validationCustom01">name</label>
                <div class="col-sm-6">
                    <input type="text" id="validationCustom01" class="form-control" name="name" value=" <?php echo $name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">image</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="img" id="img" accept=".jpg, .jpeg .png" aria-label="file example">
                    <input type="hidden" name="old_img" value="<?php echo $row['img']; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">certificate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="certificate" value="<?php echo $certificate ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="description" value="<?php echo $description ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">department</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="department" value="<?php echo $department ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">general specialty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="general_specialty" value="<?php echo $general_specialty ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">specific specialty</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="specific_specialty" value="<?php echo $specific_specialty ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">country granting the certificate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="country_granting_the_certificate" value="<?php echo $country_granting_the_certificate ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">the body granting the certificate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="the_body_granting_the_certificate" value="<?php echo $the_body_granting_the_certificate ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">date of granting the certificate</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date_of_granting_the_certificate" value="<?php echo $date_of_granting_the_certificate ?>">
                </div>
            </div>

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name0" value="<?php echo $search_name0 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link0" value="<?php echo $search_link0 ?>">
                </div>
            </div>
            <!-- ************** -->

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name1" value="<?php echo $search_name1 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link1" value="<?php echo $search_link1 ?>">
                </div>
            </div>
            <!-- ************** -->

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name2" value="<?php echo $search_name2 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link2" value="<?php echo $search_link2 ?>">
                </div>
            </div>
            <!-- ************** -->

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name3" value="<?php echo $search_name3 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link3" value="<?php echo $search_link3 ?>">
                </div>
            </div>
            <!-- ************** -->

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name4" value="<?php echo $search_name4 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link4" value="<?php echo $search_link4 ?>">
                </div>
            </div>
            <!-- ************** -->

            <!-- ************** -->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_name5" value="<?php echo $search_name5 ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Search Link</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="search_link5" value="<?php echo $search_link5 ?>">
                </div>
            </div>
            <!-- ************** -->






            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="edit" class="btn btn-primary" href="Dashboard.php">Edit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="Dashboard.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>

    </div>

</body>

</html>