<?php
header("Access-Control-Allow-Origin: http://localhost:5000");
header("Access-Control-Allow-Credentials: true");

session_start();

function generate_courses($amount) {
    $i = 0;

    if (!isset($_SESSION['articles'])) {
        while ($i < $amount)
        {
            $i++;
            $array[] = array(
                "name"=>"Article $i",
                "purchased"=>false
            );
        }

        $_SESSION['articles'] = $array;
    }

    $articles = $_SESSION['articles'];
    return $articles;
}

$courses = json_encode(generate_courses(30));

echo $courses;
