<?php

$articles = [
  'a' => "first post",
  'b' => "another post",
  'c' => "read this!"
];

echo "FOREACH loop\n";
foreach ($articles as $index => $post) {
  echo $index . " - " . $post . ", ";
}


$nr = 1;
$nr2 = 20;
echo "\n\nloop WHILE\n";
while ($nr <=20){
  echo $nr . ", ";
  $nr += 1;
}


echo "\n\nFOR statement\n";


for ($i = 1; $i <= 10; $i++){
  echo $i . ", ";
}











?>
