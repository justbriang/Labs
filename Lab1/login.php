<?php
include_once 'DBConnector.php';
include_once 'user.php';
$conn = new DBConnector;

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    print($username);
    print($password);
    $instance = new User($username, $password);

    if ($instance->isPasswordCorrect()) {
        echo "password correct";

          $instance->login();
           $conn->closeDatabase();
        // $instance->createUserSession();
     
       
    } else {
        echo "you are wrong";
    }

}

?>
<html>
    <title>Login</title>
    <script type='text/javascript' src='validate.js'></script>
    <link rel="stylesheet" type="text/css" href="validate.css">
    <body>
             <form method="post"onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                <table>
                      <tr>
                    <td>
                        <input type="text" name="username" placeholder="username">
                    </td>
                </tr>
                 <tr>
                    <td>
                        <input type="password" name="password" placeholder="password">
                    </td>
                </tr>
                <tr>
                    <tr>
                        <td>
                            <button type="submit" name="save" value="save"><strong>LOGIN</strong></button>
                        </td>
                    </tr>
                </table>

    </form>
    </body>

</html>