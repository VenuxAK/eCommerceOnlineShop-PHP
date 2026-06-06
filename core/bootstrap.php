<?php

session_start();
require "core/Helpers.php";
require "core/ServiceContainer.php";
require "core/CSRF-cover.php";

$server_name = $_SERVER["SERVER_NAME"];
$server_port = $_SERVER["SERVER_PORT"];
define("BASE_URL", "http://$server_name:$server_port");
define("BASE_DIR", __DIR__);

