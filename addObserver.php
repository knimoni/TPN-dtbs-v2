<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Observer</title>
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
    <h2 class="text-center mb-4">Add Observer</h2>
    <form action="addObserver.php" method="post" name="form1">
        <table>
            <tr>
                <td>Observer ID: </td>
                <td><input type="number" name="observer_id" class="form-control"></td>
            </tr>
            <tr>
                <td>Observer Name: </td>
                <td><input type="text" name="observer_name" class="form-control"></td>
            </tr>
            <tr>
                <td>Observer Species: </td>
                <td><input type="text" name="observer_species" class="form-control"></td>
            </tr>
            <tr>
                <td>Observer Gender: </td>
                <td><input type="text" name="observer_gender" class="form-control"></td>
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
            $observer_id = $_POST['observer_id'];
            $observer_name = $_POST['observer_name'];
            $observer_species = $_POST['observer_species'];
            $observer_gender = $_POST['observer_gender'];

            // include database connection file 
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($link, "INSERT INTO observer (observer_id, observer_name, observer_species, observer_gender) VALUES('$observer_id','$observer_name','$observer_species','$observer_gender')");

            // Show message when user added
            echo "Successfully added  observer  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
        }
    ?>
</body>
</html>