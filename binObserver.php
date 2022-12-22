<?php
// include database connection file
include_once("config.php");

// Fetch data
$observerDel = mysqli_query($link, "SELECT * FROM observer WHERE is_delete=1 ORDER BY observer_id DESC");
?>

<html>

<head>
    <title>Deleted observer list</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        table {
            margin: 1rem auto 1.25rem auto;
        }

        th {
            padding: 1rem;
            text-align: center;
        }

        td {
            padding: 1.5rem 1rem;
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        div {
            width: fit-content;
        }

        a {
            color: purple;
            padding: 7px;
            border: .5px solid purple;
        }
    </style>
</head>

<body>
    <a href="index.php" class="btn btn-dark ml-3 mt-3">🔙 Home</a>
    <br /><br />

    <h3>Deleted observer List</h3>
    <table width='80%' border=1>
        <tr>
            <th>
                Observer ID
            </th>
            <th>
                Observer Name
            </th>
            <th>
                Observer Species
            </th>
            <th>
                Observer Gender
            </th>
            <th>Action</th>
        </tr>
        <?php
        while ($item = mysqli_fetch_array($observerDel)) {
            echo "<tr>";
            echo "<td>" . $item['observer_id'] . "</td>";
            echo "<td>" . $item['observer_name'] . "</td>";
            echo "<td>" . $item['observer_species'] . "</td>";
            echo "<td>" . $item['observer_gender'] . "</td>";
            echo "<td><a href='restoreObserver.php?id=$item[observer_id]'>Restore</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>