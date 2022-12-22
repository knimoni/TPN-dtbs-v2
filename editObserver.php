<?php
// include database connection file
include_once("config.php");
// Check if form is submitted for data update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $observer_id = $_POST['observer_id'];
    $observer_name = $_POST['observer_name'];
    $observer_species = $_POST['observer_species'];
    $observer_gender = $_POST['observer_gender'];
    // update data
    $result = mysqli_query($link, "UPDATE observer SET
        observer_name='$name', observer_species='$observer_species', observer_gender = '$observer_gender' WHERE observer_id=$observer_id");
    // Redirect to homepage to display updated data in list
    header("Location: index.php");
}
// Display selected coffee based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($link, "SELECT * FROM observer WHERE observer_id=$id");
while ($observer = mysqli_fetch_array($result)) {
    $observer_name = $observer['observer_name'];
    $observer_species = $observer['observer_species'];
    $observer_gender = $observer['observer_gender'];
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit observer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        table {
            table-layout: fixed;
            max-width: 100%;
            border-collapse: collapse;
            margin: .25rem auto .5rem auto;
        }

        td {
            padding: 1rem;
        }

        tr td:nth-child(1) {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <a href="index.php" class="btn btn-dark ml-3 mt-3">🔙 Home</a>
    <h2 class="text-center">Edit observer</h2>
    <form name="updateobserver" method="post" action="editobserver.php">
        <table border="0">

            <tr>
                <td>Observer Name:</td>
                <td><input type="text" name="observer_name" value=<?php echo $observer_name; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Observer Species:</td>
                <td><input type="text" name="observer_species" value=<?php echo $observer_species; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Observer Gender:</td>
                <td><input type="text" name="observer_gender" value=<?php echo $observer_gender; ?> class="form-control"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="observer_id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>
</body>

</html>