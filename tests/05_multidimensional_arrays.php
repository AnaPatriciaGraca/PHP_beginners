<?php

$values = [
    "message" => "Hello world!",
    "count"   => 150,
    "pi"      => 3.14,
    "status"  => false,
    "result"  => null
];


$count = 3;
$price = 9.99;

$data = [$count, $price];


$articles = [
    ["title" => "First post",   "content" => "This is the first post"],
    ["title" => "Another post", "content" => "Another post to read here"],
    ["title" => "Read this!",   "content" => "You must read this article!"]
];

var_dump($articles);

var_dump($articles[1]["title"]);
