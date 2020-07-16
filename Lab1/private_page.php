<?php
include_once "DBconnector.php";
session_start();
if(!isset($_SESSION['username']))
{
    header("Location:login.php");
}

function fetchUserApiKey()
{
    $con = new DBconnector();
    $username=$_SESSION['username'];
    $query = "SELECT id FROM users WHERE username = '".$username."'";
    $result = mysqli_query($con->conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_array($result);
        $uid = $row["id"];
    }
    $api = "SELECT api_key FROM api_keys WHERE user_id = '".$uid."'";
    $resultapi = mysqli_query($con->conn,$api);

    if(mysqli_num_rows($resultapi)>0)
    {
        $row = mysqli_fetch_array($resultapi);
        $apikey = $row["api_key"];
        return $apikey;
    }



}


?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="apikey.js"></script>
    <link rel="stylesheet" type = "text/css" href = "validate.css">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <p><a href = "logout.php">Logout</a></p>

<hr>
    <h3>Here, we will create an API that will allow users/Developers to order items from external systems</h3>
<hr>
<h4>We now put this feature of allowing users to generate API key.Click the button to generate API key</h4>

<button class="btn btn-primary" id="api-key-btn" >Generate API key</button><br><br>

<strong>Your API key:</strong>(Note that if your API key is already in use by already running applications,generating a new key will stop the application from functioning)<br>
<textarea cols="100" rows="2" id="api_key" name="api_key" readonly><?php echo fetchUserApiKey();?></textarea>

<h3>Service Description:</h3>
We will have a service/API that allows external applications to order food and also pull all order status by using order id.Lets do it
<hr>
</body>
</html>