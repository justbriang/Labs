<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
}
?>
<html>
    <head>
        <title>Login</title>
        <script type='text/javascript'src='validate.js'></script>
        <link rel='stylesheet' type="text/css" href="validate.css">

    </head>
    <body>
        <p>this is a private page</p>
        <p>we want to protect it</p>
        <p><a href="logout.php">Logout</a></p>
    </body>
</html>
