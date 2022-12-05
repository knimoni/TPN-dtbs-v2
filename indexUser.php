<?php
// Create database connection using config file
include_once("config.php");

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}

// Fetch data
$locations = mysqli_query($link, "SELECT * FROM locations WHERE is_delete=0 ORDER BY locations_id ASC");
$observer = mysqli_query($link, "SELECT * FROM  observer  WHERE is_delete=0 ORDER BY observer_id ASC");
$child = mysqli_query($link, "SELECT * FROM  child  WHERE is_delete=0 ORDER BY child_id ASC");
$locationsJoin = mysqli_query($link, "SELECT A.locations_id, A.locations_name, A.locations_status, B.observer_name, C.child_name from locations A INNER JOIN observer B ON A.observer_id = B.observer_id INNER JOIN child C ON A.child_id = C.child_id WHERE A.is_delete=0");
?>

<!DOCobserver html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Promised Neverland Database</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font: 14px sans-serif;
            }

            table {
                border: 2px solid black;
            }

            th {
                padding: 2rem;
            }

            td {
                padding: 2rem 1rem;
            }

            h3 {
                text-align: center;
            }

            div {
                width: fit-content;
            }
        </style>
    </head>

    <body>
        <div class="logout-btn ml-3 mt-3">
            <a href="logout.php" class="btn btn-danger">Logout</a>
            <c class="">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.
                Welcome to The Promised Neverland Database.</c>
        </div>
        <h1 class="mt-5 mb-5 text-center">The Promised Neverland Database</h1>

        <!-- locations -->
        <div class="d-flex align-items-center mx-auto">
            <h3>List of Locations</h3>
            <form action="indexUser.php" method="get" class="ml-5 row">
                <!-- <label>Search :</label> -->
                <input name="text" name="searchlocations" class="form-control form-control-sm col mr-2">
                <input name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
        <div class="d-flex align-items-center mx-auto ">
            <?php
            if (isset($_GET['searchlocations'])) {
                $searchlocations = $_GET['searchlocations'];
                echo "<b>Search result: " . $searchlocations . "</b>";
            }
            ?>
        </div>
        <div class="mx-auto mb-5">
            <table border="">
                <tr>
                    <th style="text-align:center">ID</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">
                        Location
                    </th>
                    <th style="text-align:center">
                        Type
                    </th>
                </tr>
                <?php
                if (isset($_GET['searchlocations'])) {
                    $searchlocations = $_GET['searchlocations'];
                    $locations = mysqli_query($link, "SELECT * FROM locations WHERE is_delete=0 AND locations_name like '%" . $searchlocations . "%'");
                } else {
                    $locations = mysqli_query($link, "SELECT * FROM locations WHERE is_delete=0 ORDER BY locations_id ASC");
                }
                while ($item = mysqli_fetch_array($locations)) {
                    echo "<tr>";
                    echo "<td style='text-align:center;'>" . $item['locations_id'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['locations_name'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['locations_status'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['locations_type'] . "</td>";
                }
                ?>
            </table>
        </div>

        <!-- observer -->
        <div class="d-flex align-items-center mx-auto ">
            <h3>List of Observer</h3>
            <form action="indexUser.php" method="get" class="ml-5 row">
                <!-- <label>Search :</label> -->
                <input observer="text" name="searchobserver" class="form-control form-control-sm col mr-2">
                <input observer="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
        <div class="d-flex align-items-center mx-auto ">
            <?php
            if (isset($_GET['searchobserver'])) {
                $searchobserver = $_GET['searchobserver'];
                echo "<b>Search result: " . $searchobserver . "</b>";
            }
            ?>
        </div>
        <div class="mx-auto mb-5">
            <table border="">
                <tr>
                    <th style="text-align:center">
                        ID
                    </th>
                    <th style="text-align:center">
                        Name
                    </th>
                    <th style="text-align:center">
                        Species
                    </th>
                    <th style="text-align:center">
                        Gender
                    </th>
                </tr>
                <?php
                if (isset($_GET['searchobserver'])) {
                    $searchobserver = $_GET['searchobserver'];
                    $observer = mysqli_query($link, "SELECT * FROM observer WHERE is_delete=0 AND observer_name like '%" . $searchobserver . "%'");
                } else {
                    $observer = mysqli_query($link, "SELECT * FROM observer WHERE is_delete=0 ORDER BY observer_id ASC");
                }
                while ($item = mysqli_fetch_array($observer)) {
                    echo "<tr>";
                    echo "<td style='text-align:center;'>" . $item['observer_id'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['observer_name'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['observer_species'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['observer_gender'] . "</td>";
                }
                ?>
            </table>
        </div>

        <!-- child -->
        <div class="d-flex align-items-center mx-auto ">
            <h3>List of Children</h3>
            <form action="indexUser.php" method="get" class="ml-5 row">
                <!-- <label>Search :</label> -->
                <input observer="text" name="searchchild" class="form-control form-control-sm col mr-2">
                <input observer="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
        <div class="d-flex align-items-center mx-auto ">
            <?php
            if (isset($_GET['searchchild'])) {
                $searchchild = $_GET['searchchild'];
                echo "<b>Search result: " . $searchchild . "</b>";
            }
            ?>
        </div>
        <div class="mx-auto mb-5">
            <table border="">
                <tr>
                    <th style="text-align:center">
                        ID
                    </th>
                    <th style="text-align:center">
                        Name
                    </th>
                    <th style="text-align:center">
                        Image
                    </th>
                    <th style="text-align:center">
                        Farm Identifier
                    </th>
                    <th style="text-align:center">
                        Gender
                    </th>
                    <th style="text-align:center">
                        Height
                    </th>
                    <th style="text-align:center">
                        Birthday
                    </th>
                    <th style="text-align:center">
                        Blood Type
                    </th>
                </tr>
                <?php
                if (isset($_GET['searchchild'])) {
                    $searchchild = $_GET['searchchild'];
                    $child = mysqli_query($link, "SELECT * FROM child WHERE is_delete=0 AND observer_name like '%" . $searchchild . "%'");
                } else {
                    $child = mysqli_query($link, "SELECT * FROM child WHERE is_delete=0 ORDER BY child_id ASC");
                }
                while ($item = mysqli_fetch_array($child)) {
                    echo "<tr >";
                    echo "<td style='text-align:center;'>" . $item['child_id'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_name'] . "</td>";
                    echo "<td style='text-align:center;'> <img src='Assets/" . $item['images'] . "' height='230' width='230' </td>";
                    echo "<td style='text-align:center;'>" . $item['child_identifier'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_gender'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_height'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_birthday'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_bloodtype'] . "</td>";
                }
                ?>
            </table>
        </div>

        <h3>Table Join</h3>
        <div class="mx-auto mb-5">
            <table border="10%">
                <tr>
                    <th style='text-align:center;'>Locations Name</th>
                    <th style='text-align:center;'>Locations Status</th>
                    <th style='text-align:center;'>Observer Name</th>
                    <th style='text-align:center;'>Children Name</th>
                </tr>
                <?php
                while ($item = mysqli_fetch_array($locationsJoin)) {
                    echo "<tr>";
                    echo "<td style='text-align:center;'>" . $item['locations_name'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['locations_status'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['observer_name'] . "</td>";
                    echo "<td style='text-align:center;'>" . $item['child_name'] . "</td>";
                }
                ?>
            </table>
        </div>
    </body>

    </html>