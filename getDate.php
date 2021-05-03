<?php
$id = $_GET['ID'];
if(isset($_GET['today'])){
  header("Location: Dashboard.php?ID=". $id . "&today=". $_GET['today'] . "&weekday=" . $_GET['weekday']);
}
?>

<html>
<head>
</head>
    <body>
        <form id="date">
            <input type="hidden" name="ID" value=<?php echo $id;?>></input>
            <input id="1" type="text" name="today"></input>
            <input id="2" type="text" name="weekday"></input>

        </form>
    </body>


    <script type="text/javascript" src="js/getDate.js"></script>
</html>