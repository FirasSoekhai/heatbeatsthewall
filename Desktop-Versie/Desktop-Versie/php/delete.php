<?php
require 'db.php';
$id = $_GET['id'];
echo "track delete met ID: $id";

if (!isset($_GET['id'])) {
    echo "geen id opgegeven";
    exit;
}
$connection = dbConnect();
$query = "DELETE FROM `images` WHERE `image_id` = :image_id";
$statement = $connection->prepare($query);
$params = ['image_id'=> $id];
$statement->execute($params);
header("location: index.php")

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Deleted</title>
</head>

<body>
    <h2><a href="index.php">Ga terug</a></h2>
</body>

</html>