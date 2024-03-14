<?php
require_once('_config.php');
header("Content-Type: application/json");
echo json_encode(["message" => "Hello World"]);
