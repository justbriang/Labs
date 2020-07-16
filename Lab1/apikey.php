<?php
session_start();
include_once "DBconnector.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    header('HTTP/1.0 403 Forbidden');
    echo 'You are Forbidden';
}
else{
    $api_key=null;
    $api_key= generateApiKey(64);
    header("Content-Type: application/json; charset=UTF-8");
//    saveApiKey($api_key);
    echo generateResponse($api_key);

}



function generateApiKey($str_length)
{
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $bytes = openssl_random_pseudo_bytes(3*$str_length/4+1);
    $repl = unpack('C2', $bytes);

    $first = $chars[$repl[1]%62];
    $second = $chars[$repl[2]%62];
    return strtr(substr(base64_encode($bytes), 0, $str_length), '+/', "$first$second");
}



function saveApiKey($api_key)
{
    session_start();
    $db = new DBConnector();
    $user = $_SESSION['username'];
    $myquery = mysqli_query($db->conn, "SELECT * FROM users WHERE username='$user'");
    $user_array = $myquery->fetch_assoc();
    $uid = $user_array['id'];
    $result = mysqli_query($db->conn, "INSERT INTO api_keys(user_id,api_key) VALUES('$uid','$api_key')") or die(mysqli_error($db->conn));
    if ($result === true) {
        return true;
    }
    return false;
}


         function generateResponse($api_key)
        {

            if (saveApiKey($api_key)) {
                $res = ['success' => 1, 'message' => $api_key];
            } else {
                $res = ['success' => 0, 'message' => 'Failure. Please regenerate the API Key'];
            }
            return json_encode($res);





}





