<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "database_college";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);
$name = $certificate = $description = $department = $email = $date
  = $general_specialty = $specific_specialty = $country_granting_the_certificate
  = $the_body_granting_the_certificate = $date_of_granting_the_certificate =
  $search_name0 = $search_link0 =
  $search_name1 = $search_link1 =
  $search_name2 = $search_link2 =
  $search_name3 = $search_link3 =
  $search_name4 = $search_link4 =
  $search_name5 = $search_link5 = "";
$errorMessage =  "";
$successMessage = "";

if ($connection->connect_error) {
  //exit early
  die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST["add"])) {
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

  $fileName = $_FILES["image"]["name"];
  $fileSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["tmp_name"];

  $validImageExtension = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff'];
  $imageExtension = explode('.', $fileName);
  $imageExtension = strtolower(end($imageExtension));

  if (
    empty($name) || empty($certificate) || empty($description)
    || empty($department) || empty($email) || empty($date)
    || empty($general_specialty) || empty($specific_specialty)
    || empty($country_granting_the_certificate) || empty($the_body_granting_the_certificate)
    || empty($date_of_granting_the_certificate)
  ) {
    $errorMessage = "All fields are required";
  } elseif ($fileSize === 0 || $_FILES["image"]["error"] === 4) {
    $errorMessage = "Please select an image";
  } elseif (!in_array($imageExtension, $validImageExtension)) {
    $errorMessage = "Invalid image extension. Only JPG and JPEG files are allowed";
  } elseif ($fileSize > 1000000) {
    $errorMessage = "Image size is too large. Please select an image with size less than 1MB";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $name)) {
    $errorMessage = "Name must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $certificate)) {
    $errorMessage = "Certificate must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $department)) {
    $errorMessage = "Department must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errorMessage = "Invalid email format";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $general_specialty)) {
    $errorMessage = "General Specialty must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $specific_specialty)) {
    $errorMessage = "Specific Specialty must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $country_granting_the_certificate)) {
    $errorMessage = "Country granting the Certificate must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (!preg_match("/^[a-zA-Z ]{2,30}$/", $the_body_granting_the_certificate)) {
    $errorMessage = "The body granting the Certificate must be between 2 and 30 characters, containing only letters and spaces";
  } elseif (strtotime($date_of_granting_the_certificate) > strtotime(date('Y-m-d'))) {
    $errorMessage = "Date of granting the certificate must be in the past";
  } else {
    if (move_uploaded_file($tmpName, 'uplode/' . $fileName)) {
      $newImageName = uniqid() . '.' . $imageExtension;
      rename('uplode/' . $fileName, 'uplode/' . $newImageName);

      $sql = "INSERT INTO db (name,img, certificate, description, department, email, date, general_specialty, 
      specific_specialty, country_granting_the_certificate, the_body_granting_the_certificate, 
      date_of_granting_the_certificate,
      search_name0,
      search_link0,
      search_name1,
      search_link1,
      search_name2,
      search_link2,
      search_name3,
      search_link3,
      search_name4,
      search_link4,
      search_name5,
      search_link5)
                VALUES ('$name', 'uplode/$newImageName', '$certificate', '$description', 
                '$department', '$email', '$date', '$general_specialty', '$specific_specialty',
                 '$country_granting_the_certificate', '$the_body_granting_the_certificate',
                  '$date_of_granting_the_certificate',
                  '$search_name0',
                  '$search_link0',
                  '$search_name1',
                  '$search_link1',
                  '$search_name2',
                  '$search_link2',
                  '$search_name3',
                  '$search_link3',
                  '$search_name4',
                  '$search_link4',
                  '$search_name5',
                  '$search_link5'
                  )";

      if ($connection->query($sql) === TRUE) {
        $successMessage = "Dr. added successfully";
      } else {
        $errorMessage = "Error: " . $sql . "<br>" . $connection->error;
      }
    } else {
      $errorMessage = "Failed to upload image";
    }
    $name = $certificate = $description = $department = $email
      = $date = $general_specialty = $specific_specialty
      = $country_granting_the_certificate = $the_body_granting_the_certificate
      = $date_of_granting_the_certificate =
      $search_name0 = $search_link0 = $search_name1 = $search_link1 = $search_name2 = $search_link2 =
      $search_name3 = $search_link3 = $search_name4 = $search_link4 = $search_name5 = $search_link5 = "";
  }
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>

  <link rel="stylesheet" href="assets2/css/style.css">
  <!-- ========== Favicon Icon ========== -->
  <link rel="shortcut icon" href="assets/img/logo_p.svg">
  <!-- ===========  All Stylesheet ================= -->
  <!--  Icon css plugins -->
  <link rel="stylesheet" href="assets/css1/icons.css">
  <!--  animate css plugins -->
  <link rel="stylesheet" href="assets/css1/animate.css">
  <!--  magnific-popup css plugins -->
  <link rel="stylesheet" href="assets/css1/magnific-popup.css">
  <!--  owl carosuel css plugins -->
  <link rel="stylesheet" href="assets/css1/owl.carousel.min.css">
  <!-- metis menu css file -->
  <link rel="stylesheet" href="assets/css1/metismenu.css">
  <!--  owl theme css plugins -->
  <link rel="stylesheet" href="assets/css1/owl.theme.css">
  <!--  Bootstrap css plugins -->
  <link rel="stylesheet" href="assets/css1/bootstrap.min.css">
  <!--  main style css file -->
  <link rel="stylesheet" href="assets/css1/style.css">
  <!-- template main style css file -->
  <link rel="stylesheet" href="style.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container my-5">
    <h2>New Dr. </h2>
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
          <input type="file" class="form-control" name="image" id="image" accept=".jpg, .jpeg .png" aria-label="file example">
          <div class="invalid-feedback">Example invalid form file feedback</div>
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

      <!-- ################################ -->
      <!-- ######### -->




      <div class="accordion no-border  " id="accordion">
        <div class="accordion-item">
          <h4 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="true" aria-controls="faq2">
              <b> Add More Search</b>
            </button>
          </h4>
          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
            <div class="accordion-body">
              <!-- ############ -->

              <div class="row mb-3">
                <label class="col-sm-3  col-form-label">Search Name</label>
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


              <!-- ######### -->

              <hr>
              <!-- ######### -->
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

              <!-- ######### -->
              <hr>
              <!-- ######### -->
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

              <!-- ######### -->
              <hr>
              <!-- ######### -->
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

              <!-- ######### -->
              <hr>
              <!-- ######### -->
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
            </div>
          </div>
        </div>


      </div>

  </div>


  <div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
      <button type="submit" name="add" class="btn btn-primary" href="Dashboard.php">Add</button>
    </div>
    <div class="col-sm-3 d-grid">
      <a class="btn btn-outline-primary" href="Dashboard.php" role="button"> Back to Dashboard</a>
    </div>
  </div>





  </form>

  </div>
</body>

</html>