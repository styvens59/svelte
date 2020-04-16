<?php

header("Access-Control-Allow-Origin: *");

$array = ["test1", "test2"];
echo json_encode($array);
