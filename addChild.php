<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add child</title>
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
    <a href="index.php" class="btn btn-secondary ml-3 mt-3">🔙 Home</a>
    <br>
    <h2 class="text-center mb-4">Add child</h2>
    <form action="addChild.php" method="post" name="form1">
        <table>
            <tr>
                <td>child ID: </td>
                <td><input type="text" name="child_id" class="form-control"></td>
            </tr>
            <tr>
                <td>child: </td>
                <td><input type="text" name="child_name" class="form-control"></td>
            </tr>
            <tr>
                <td>images: </td>
                <td><input type="file" name="images" class="form-control"></td>
            </tr>
            <tr>
                <td>Identifier: </td>
                <td><input type="text" name="child_identifier" class="form-control"></td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td><input type="text" name="child_gender" class="form-control"></td>
            </tr>
            <tr>
                <td>Height: </td>
                <td><input type="text" name="child_height" class="form-control"></td>
            </tr>
            <tr>
                <td>Birthday: </td>
                <td><input type="text" name="child_birthday" class="form-control"></td>
            </tr>
            <tr>
                <td>Blood Type: </td>
                <td><input type="text" name="child_bloodtype" class="form-control"></td>
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
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check If form submitted, insert form data into users table. 
    if (isset($_POST['submit'])) {
        $child_id = $_POST['child_id'];
        $child_name = $_POST['child_name'];
        $child_identifier = $_POST['child_identifier'];
        $child_gender = $_POST['child_gender'];
        $child_height = $_POST['child_height'];
        $child_birthday = $_POST['child_birthday'];
        $child_bloodtype = $_POST['child_bloodtype'];
        $images = $_FILES['images']['name'];
        $folder = "../Assets/".$images;
    
    
        if (isset($images)) {
            $fileName = $_FILES["images"]["name"];
            $fileSize = $_FILES["images"]["size"];
            $error = $_FILES["images"]["error"];
            $tempName = $_FILES["images"]["tmp_name"];
    
            //cek apakah tidak ada gambar yg diupload
            if ($error === 4) {
                echo "<script>
                            alert('Please upload an images.');
                            </script>";
                return false;
            }
            //cek yg diupload harus gambar
            $imgValidation = ['jpg', 'jpeg', 'png'];
            $imgExt = explode('.', $fileName);
            $imgExt = strtolower(end($imgExt));
            if (!in_array($imgExt, $imgValidation)) {
                echo "<script>
                        alert('Please upload a file with images extension (jpg, jpeg, or png).');
                        </script>";
                return false;
            }
    
            //cek limit ukuran file
            if ($fileSize > 1000000) {
                echo "<script>
                        alert('File size is too big!');
                        </script>";
                return false;
            }
    
            //kalo lolos smua validasi maka generate nama images baru
            //biar user yg beda bisa upload dgn nama file yg sama
            $newFileName = uniqid();
    
            $newFileName .= ".";
            $newFileName .= "$imgExt";
            // var_dump($newFileName); die;
    
            move_uploaded_file($tempName, '../Assets/' . $newFileName);
    
            return $newFileName;
        }
    


        // include database connection file 
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($link, "INSERT INTO child (child_id, child_name, child_identifier, child_gender, child_height, child_birthday, child_bloodtype, images) VALUES('$child_id','$child_name','$child_identifier', '$child_gender', '$child_height', '$child_birthday', '$child_bloodtype', '$images')");

        // Show message when user added
        echo "Successfully added  child  <a href='index.php' class='btn btn-secondary'>Back to Home</a>";
    }   
}
?>
</body>

</html>