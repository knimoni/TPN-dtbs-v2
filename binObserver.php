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
                    while($item = mysqli_fetch_array($observerDel)) {
                    echo "<tr>";
                    echo "<td>".$item['observer_id']."</td>";
                    echo "<td>".$item['observer_name']."</td>";
                    echo "<td>".$item['observer_species']."</td>";
                    echo "<td>".$item['observer_gender']."</td>";
                    echo "<td><a href='restoreobserver.php?id=$item[observer_id]'>Restore</a></td></tr>";
                    }
                ?>
            </table>
    </body>
</html>
