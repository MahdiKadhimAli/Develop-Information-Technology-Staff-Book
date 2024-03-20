<!DOCTYPE html>
<html>

<head>
  <title>Print</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/logo_p.svg">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <script>
    function printPage() {
      // Hide the print button to avoid infinite loop when printing the generated PDF
      document.querySelector('button').style.display = 'none';


      // Update the URL in the address bar
      window.history.replaceState({}, document.title, 'Print details...');

      // Print the page as a PDF
      window.print();
    }
  </script>

</head>

<body>



  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "database_college";
  //create connection
  $connection = new mysqli($servername, $username, $password, $database);

  #check connection
  if ($connection->connect_error) {
    die("Connection failed:" . $connection->connect_error);
  }
  $employee_id = $_GET['id'];
  $sql = "SELECT * FROM db WHERE id = $employee_id";
  $result = $connection->query($sql);



  #check query
  if (!$result) {
    die("Error:" . $connection->error);
  }
  //read data each row
  while ($row = $result->fetch_assoc()) {
    echo
    "


<section style='background-color: #eee;'>
  <div class='container py-5'>
    <div class='row'>
      <div class='col-lg-4'>
        <div class='card mb-4'>
          <div class='card-body text-center'>
            <img src='back-end/{$row['img']}' alt='avatar'
              class='rounded-circle img-fluid' style='width: 150px;'>
              <h2 class='my-3'>$row[name]</h2>
            <p class='text-muted mb-1'>$row[certificate]</p>
          </div>
        </div>
      </div>
      <div class='col-lg-8'>
        <div class='card mb-4'>
          <div class='card-body'>
          <div class='row'>
          <div class='col-sm-5'>
            <p class='mb-0'>Email</p>
          </div>
          <div class='col-sm-7'>
            <p class='text-muted mb-0'>$row[email]</p>
          </div>
        </div>
        <hr>
        
        <div class='row'>
          <div class='col-sm-5'>
            <p class='mb-12'>Department</p>
          </div>
          <div class='col-sm-7'>
            <p class='text-muted mb-0'>$row[department]</p>
          </div>
        </div>
        <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Description</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[description]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Date</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[date]</p>
              </div>
            </div>


            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>General Specialty</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[general_specialty]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Specific Specialty</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[specific_specialty]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Country Granting the Certificate</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[country_granting_the_certificate]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Body Granting the Certificate</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[the_body_granting_the_certificate]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Date of Granting the Certificate</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[date_of_granting_the_certificate]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name0]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name1]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name2]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name3]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name4]</p>
              </div>
            </div>
            <hr>
            <div class='row'>
              <div class='col-sm-5'>
                <p class='mb-0'>Search Name</p>
              </div>
              <div class='col-sm-7'>
                <p class='text-muted mb-0'>$row[search_name5]</p>
              </div>
            </div>
        </div>

 <button onclick='printPage()' type='button' class='btn btn-primary'>
          <i class='fa fa-print'></i> Print</button>
          </div>
        ";
  } ?>


</body>

</html>