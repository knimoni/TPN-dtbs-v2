<?php
    // include database connection file
    include_once("config.php");

    // Fetch data
    $childDel = mysqli_query($link, "SELECT * FROM child WHERE is_delete=1 ORDER BY child_id DESC");
?>

<html>
    <head>
        <title>Deleted child list</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{ font: 14px sans-serif; }
            table {table-layout: fixed; max-width: 100%; border-collapse: collapse; border: 1px solid black; margin: .25rem auto .5rem auto;}
            th { padding: 1rem; }
            td {padding: 1.5rem 1rem;}
            h3 {text-align: center;}
            div {width: fit-content; }
        </style>
    </head>

    <body>
        <a href="index.php" class="btn btn-dark ml-3 mt-3">🔙 Home</a>
        <br/><br/>

            <h3>Deleted child List</h3>
            <table width='80%' border=1>
                <tr>
                    <th>
                        Child ID
                    </th>
                    <th>
                        Child Name
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Child Identifier
                    </th>
                    <th>
                        Child Gender
                    </th>
                    <th>
                        Child Height
                    </th>
                    <th>
                        Child Birthday
                    </th>
                    <th>
                        Child Blood Type
                    </th>
                    <th>Action</th>
                </tr>
                <?php
                    while($item = mysqli_fetch_array($childDel)) {
                    echo "<tr>";
                    echo "<td>".$item['child_id']."</td>";
                    echo "<td>".$item['child_name']."</td>";
                    echo "<td style='text-align:center;'> <img src='Assets/" . $item['images'] . "' height='230' width='230' </td>";
                    echo "<td>".$item['child_identifier']."</td>";
                    echo "<td>" . $item['child_gender'] . "</td>";
                    echo "<td>" . $item['child_height'] . "</td>";
                    echo "<td>" . $item['child_birthday'] . "</td>";
                    echo "<td>" . $item['child_bloodtype'] . "</td>";
                    echo "<td><a href='restoreChild.php?id=$item[child_id]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
    </body>
</html>
