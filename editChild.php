<?php
// include database connection file
include_once("config.php");
// Check if form is submitted for data update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $child_id = $_POST['child_id'];
    $child_name = $_POST['child_name'];
    $child_identifier = $_POST['child_identifier'];
    $child_gender = $_POST['child_gender'];
    $child_height = $_POST['child_height'];
    $child_birthday = $_POST['child_birthday'];
    $child_bloodtype = $_POST['child_bloodtype'];
    $images = $_POST['images'];
    // update data
    $result = mysqli_query($link, "UPDATE child SET images = '$images', child_gender='$child_gender',  child_name='$child_name', child_identifier='$child_identifier' WHERE child_id=$child_id");
    // Redirect to homepage to display updated data in list
    header("Location: index.php");
}
// Display selected coffee based on id
// Getting id from url
$id = $_GET['id'];
// Fetch data based on id
$result = mysqli_query($link, "SELECT * FROM child WHERE child_id=$id");
while ($child = mysqli_fetch_array($result)) {
    $child_name = $child['child_name'];
    $child_identifier = $child['child_identifier'];
    $child_gender = $child['child_gender'];
    $child_height = $child['child_height'];
    $child_birthday = $child['child_birthday'];
    $child_bloodtype = $child['child_bloodtype'];
    $images = $child['images'];
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit child</title>
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
    <h2 class="text-center">Edit child</h2>
    <form name="updatechild" method="post" action="editchild.php">
        <table border="0">

            <tr>
                <td>Child Name:</td>
                <td><input type="text" name="child_name" value=<?php echo $child_name; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Child Identifier:</td>
                <td><input type="text" name="child_identifier" value=<?php echo $child_identifier; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="images" value=<?php echo $images; ?> class="form-control">
                <img src="../../Assets/<?php echo $mhs["image"] ?>" alt=""></td>
            </tr>
            <tr>
                <td>Child Gender:</td>
                <td><input type="text" name="child_gender" value=<?php echo $child_gender; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Child Height:</td>
                <td><input type="text" name="child_height" value=<?php echo $child_height; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Child Birthday:</td>
                <td><input type="text" name="child_birthday" value=<?php echo $child_birthday; ?> class="form-control"></td>
            </tr>
            <tr>
                <td>Child Blood Tyoe:</td>
                <td><input type="text" name="child_bloodtype" value=<?php echo $child_bloodtype; ?> class="form-control"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="child_id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
            </tr>
        </table>
    </form>

</body>

</html>