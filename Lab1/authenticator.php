<?php

interface Authenticator{
public function hashedPassword();
public function isPasswordCorrect();
public function login();
public function logout();
public function CreateFormErrorSessions();
}
?>