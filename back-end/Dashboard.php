<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="assets/img/logo_p.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>

<body>
    <br>
    <div class=" container-fluid clearfix">
        <h2>List of Education Institution </h2>
        <a href="add.php" class="btn btn-primary" role="button"><i class="fa fa-plus-square"></i> New Dr. </a>
        <a href="/index.php" class="btn btn-outline-primary" role="button" target="_blank"><i class="fa fa-home"></i> HOME </a>
        <a href="/team.php" class="btn btn-outline-primary" role="button" target="_blank"><i class="fa fa-list-ul"></i> View All </a>

        <br>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>certificate</th>
                    <th>description</th>
                    <th>department</th>
                    <th>email</th>
                    <th>date</th>
                    <th>general </th>
                    <th>specific </th>
                    <th>country </th>
                    <th>granting </th>
                    <th>date </th>
                </tr>
            </thead>
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
            $sql = "SELECT * FROM db";
            $result = $connection->query($sql);

            #check query
            if (!$result) {
                die("Error:" . $connection->error);
            }
            //read data each row
            while ($row = $result->fetch_assoc()) {
                echo
                "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[certificate]</td>
                <td>$row[description]</td>
                <td>$row[department]</td>
                <td>$row[email]</td>
                <td>$row[date]</td>
                <td>$row[general_specialty]</td>
                <td>$row[specific_specialty]</td>
                <td>$row[country_granting_the_certificate]</td>
                <td>$row[the_body_granting_the_certificate]</td>
                <td>$row[date_of_granting_the_certificate]</td>
                <td><a  href='/team-details.php?id=$row[id]' class='mr-3' title='View Record' data-toggle='tooltip' target='_blank'><span class='fa fa-link'></span></a></td>
                <td><a  href='/back-end/edit.php?id=$row[id]' class='mr-3' title='Update Record' data-toggle='tooltip' target='_blank'><span class='fa fa-pencil'></span></a></td>
                <td><a  href='/print.php?id=$row[id]' class='mr-3' title='Print Record' data-toggle='tooltip' target='_blank'><span class='fa fa-print'></span></a></td>
                <td><a  href='delete.php?id=$row[id]' class='mr-3' title='Delete Record' data-toggle='tooltip' target='_blank'><span class='fa fa-trash'></span></a></td>
               
                </tr>
            ";
            }
            ?>
            <!--
                 <td><a href='/back-end/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>edit </a></td>
                <td><a href='delete.php?id=$row[id]' class='btn btn-danger btn-sm'>delete </a></td>
             -->
            </tbody>
        </table>
    </div>
</body>

</html>