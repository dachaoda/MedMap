<?php
$id = $_GET['ID'];
if(isset($_GET['ID'])){
    include 'dbconnect.php';
    $query = 'DROP TABLE '.$id.'temp';
    mysqli_query($db, $query);
    header("Location: index.php");

}else{
    header("Location: index.php");
}

?>

<html>

<head>
</head>

<body>
</body>

</html>