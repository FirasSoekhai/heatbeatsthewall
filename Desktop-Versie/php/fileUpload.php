<?php
    include "dbVars.php";
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";
    $errors =  array();
    $fileExtensions = array('jpeg','jpg','png');
    if (isset($_POST['submit'])) {
        $image_title = filter_var($_POST['image_title'], FILTER_SANITIZE_STRING);
        $image_description = filter_var($_POST['image_description'], FILTER_SANITIZE_STRING);
        $image_tag = filter_var($_POST['image_tag'], FILTER_SANITIZE_STRING);
        $fileName = $_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName  = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];
        $fileExtension = strtolower(end(explode('.', $fileName)));
        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);
        if (! in_array($fileExtension, $fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file ";
        }
        if ($fileSize > 3000000) {
            $errors[] = "This file is more than 3MB. Sorry, it has to be less than or equal to 3MB";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            try {
                $database = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Fout bij verbinding maken: ' . $e->getMessage();
                exit;
            }
            if ($didUpload) {
                $sql = 'INSERT INTO `images` (`image_title`, `image_description`, `image_tag`, `image_url`) VALUES (?, ?, ?, ?)';
                $statement = $database->prepare($sql);
                $data = array(
                $image_title,
                $image_description,
                $image_tag,
                $fileName
              );
                $statement->execute($data);
                header("Location: index.php");
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
                echo "You will be safely redirected to the homescreen in about 5 to 10 seconds. ";
                sleep(5);
                header("Location: index.php");
            }
        } else {
            foreach ($errors as $error) {
                echo $error . ", These are the errors ( Please contact Brian Loman or Tim van Osch if you believe this is not correct)" . "\n";
                echo "You will be safely redirected to the homescreen in about 5 to 10 seconds. ";
                echo "Please don't try to upload other files then: JPG, PNG or JPEG. This won't work";
                sleep(5);
                header("Location: index.php");
            }
        }
    }
?>
