<?php
include_once 'DBConnector.php';
include 'crud.php';
include 'authenticator.php';
class User implements Crud, Authenticator
{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;
    private $username;
    private $password;

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct' . $numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    public function __contruct0()
    {

    }

    public function __construct2($username, $password)
    {
        print('conts2 called');

        $this->username = $username;
        $this->password = $password;
    }
    public function __construct5($first_name, $last_name, $city_name, $username, $password)
    {
        print('conts5 called');
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
        $this->username = $username;
        $this->password = $password;

    }

    public static function create($username, $password)
    {
        $instance = new self($username, $password);
        return $instance;
    }
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    public function getPassword()
    {
        return $this->$password;
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->$user_id;
    }
    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }
    public function isPasswordCorrect()
    {
        $con = new DBConnector;
        $found = false;
        $uname = $this->username;
        $pass = $this->password;
        $sql = "SELECT * FROM `user` WHERE username='$uname'";

        $result = mysqli_query($con->conn, $sql);

        $count = MYSQLI_NUM_ROWS($result);
        if ($count > 0) {
            $data = MYSQLI_FETCH_ARRAY($result, MYSQLI_ASSOC);
            $verify = PASSWORD_VERIFY($pass, $data['password']);

            if ($verify) {
                $found = true;

            }

        }
        $con->closeDatabase();
        return $found;
    }
    public function login()
    {
        if ($this->isPasswordCorrect()) {
            session_start();
            $_SESSION['username']=$this->getUsername();
            header("Location:private_page.php");
        }
    }

    public function save($con)
    {

        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        $username = $this->username;
        $this->hashPassword();
        $pass = $this->password;
        if (empty($fn) || empty($ln) || empty($city) || empty($pass) || empty($username)) {
            echo '<b>missing details, please fill in all the details to proceed </b>';
        }

        $sql = "INSERT INTO `user`(first_name,last_name,user_city,username,password) VALUES('$fn','$ln','$city','$username','$pass')";
        $res = mysqli_query($con, $sql) or die("Error" . mysqli_error($con));
        return $res;

    }
    public function readAll()
    {
        return null;
    }
    public function readUnique()
    {
        return null;
    }
    public function search()
    {
        return null;
    }
    public function update()
    {
        return null;
    }
    public function removeOne()
    {

        return null;
    }
    public function removeAll()
    {

        return null;
    }
    public function validateForm()
    {
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city = $this->city_name;
        if ($fn == "" || $ln == "" || $city == "") {
            return false;
        }
        return true;
    }
    public function createFormErrorSessions()
    {
        session_start();
        $_SESSION['form_errors'] = 'All fields are required';
    }
    public function createUserSession()
    {
        session_start();
        $_SESSION['username']->$this->getUsername();

    }
    public function logout()
    {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header('location:lab1.php');

    }
}
