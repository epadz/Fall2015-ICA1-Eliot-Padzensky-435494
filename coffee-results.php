<?php
if(!isset($_POST['acoffee'])){
	echo "please input a coffee";
	exit;
}
$coffee = $_POST['acoffee'];

$stmt = $mysqli->prepare("select avg(rating) as avg_rating from ratings join coffees on (coffees.id = ratings.coffeeId) where coffees.name=?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $coffee);
$stmt->execute();
$result = $stmt->get_result();
$rating = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Coffee Results</title>
</head>

<body>
	<h1>Coffee Ratings</h1>
    
</body>
</html>