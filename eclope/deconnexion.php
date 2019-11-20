<?php
require_once('inc/init.php');
session_start();

session_destroy();

header('location:' . URL );