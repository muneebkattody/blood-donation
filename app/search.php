<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register as a doner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen"
            href="../css/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/w3.css">
        <style>
        input{
            margin-bottom:20px;
        }
    </style>
            <link
            href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <div class="w3-container">
        <div class="header">
                    <img src="../images/nss-logo.png" alt="nss-logo" class="logo"/>
                    <a href="../index.html" class="header-nav">Home</a>
                    <a href="../register.html" class="header-nav">Register</a>
                    <a href="../search.html" class="header-nav">Request</a>
                    <a href="../faq.html" class="header-nav">Faq</a>
                    <a href="../contact.html" class="header-nav">Contact</a>
                </div>
                <br><br>
<?php
require 'config.php';

$conn = mysqli_connect($host,$user,$password,$database);
if($conn->connect_error){
    error_log("CONNECTION ERROR IN CONNECTING DB");
}

$blood_group = $_POST['blood_group'];

$sql = "SELECT name,place FROM doners WHERE blood_group='$blood_group'";

$result = $conn->query($sql);

$str="<table class='w3-table-all'>";
$no=0;
$str.="<tr><th>No.</th><th>Name</th><th>Place</th></tr>";
if ($result->num_rows >= 1) {
    while ($row = $result->fetch_assoc()) {
        $no++;
        $str.="<tr><th>$no</th><td>$row[name]</td><td>$row[place]</td></tr>";
    }
}

$str.="</table>";

echo $str;
?>

<a href="../search.html" class="main-quote-btn">Try another</a>
</div>
</body>
</html>