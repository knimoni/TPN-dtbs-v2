<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Locations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        table {table-layout: fixed; max-width: 100%; border-collapse: collapse; margin: .25rem auto .5rem auto;}
        td {padding: 1rem;}
        tr td:nth-child(1) {font-weight: bold;}
    </style>
</head>
<body>
    <a href="index.php" class="btn btn-secondary ml-3 mt-3">🔙 Home</a>
    <br>
    <h2 class="text-center mb-4">Add location</h2>
    <form action="addLocations.php" method="post" name="form1">
        <table>
            <tr>
                <td>location ID: </td>
                <td><input type="number" name="locations_id" class="form-control"></td>
            </tr>
            <tr>
                <td>location Name: </td>
                <td><input type="text" name="locations_name" class="form-control"></td>
            </tr>
            <tr>
                <td>location Status: </td>
                <td><input type="text" name="locations_status" class="form-control"></td>
            </tr>
            <tr>
                <td>location Type: </td>
                <td><input type="text" name="locations_type" class="form-control"></td>
            </tr>
            <tr>
                <td>location Observer ID: </td>
                <td><input type="number" name="observer_id" class="form-control"></td>
            </tr>
            <tr>
                <td>location Child ID: </td>
                <td><input type="number" name="child_id" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" class="btn btn-primary">
                </td>
            </tr>
        </table>
    </form>

    <?php
        // Check If form submitted, insert form data into users table. 
        if(isset($_POST['submit'])) {
            $locations_id = $_POST['locations_id'];
            $locations_name = $_POST['locations_name'];
            $locations_status = $_POST['locations_status'];
            $locations_type = $_POST['locations_type'];
            $observer_id = $_POST['observer_id'];
            $child_id = $_POST['child_id'];

            // include database connection file 
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($link, "INSERT INTO locations (locations_id, locations_name, locations_status, locations_type, observer_id, child_id) VALUES('$locations_id','$locations_name','$locations_status','$locations_type','$observer_id', '$child_id')");

            // Show message when user added
            echo "Successfully added  location  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
        }
    ?>
</body>
</html>