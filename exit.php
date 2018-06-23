<?php

require_once 'auth-reg/auth-reg_model.php';

deleteCookie($_COOKIE['t1']);
session_destroy();
header('Location:index.php');