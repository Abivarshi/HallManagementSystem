<?php include 'Connect/Connect.php';?>
<?php
//check connection

//create a variable
if(isset($_GET['Submit'])) {
    $ID = $_GET['ID'];
    $year = $_GET['year'];
    $month = $_GET['month'];
    $amount = $_GET['amount'];
    mysqli_query($link, "INSERT INTO payment([id],year,month,date,amount) VALUES ('$ID',2011,'January',now(),1000.00)");
    echo 'AAAAAAAAA';
}
?>