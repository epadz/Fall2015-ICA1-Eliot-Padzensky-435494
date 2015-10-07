<?php
if(!isset($_POST['user']) || !isset($_POST['coffee']) || !isset($_POST['userRating']) || !isset($_POST['comments'])){
	echo "error: please fill out all required fields";
	exit;
}
$user = $_POST['user'];
$coffee = $_POST['coffee'];
$userRating = floatval($_POST['userRating']);
$comments = $_POST['comments'];

echo $userRating + '';

$mysqli = new mysqli("localhost", "epadz", "epadz", "coffee");
$stmt = $mysqli->prepare("insert into coffees (name) values (?)");
if(!$stmt){
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}
$stmt->bind_param('s', $coffee);
$stmt->execute();
$cId = $stmt->insert_id;
$stmt->close();

$stmt = $mysqli->prepare("insert into ratings (coffeeId, user, rating) values (?,?,?)");
if(!$stmt){
    printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
}
$stmt->bind_param('isd', $cId, $coffee, $userRating);
$stmt->execute();
$stmt->close();
header("Location: coffee-main.html");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>