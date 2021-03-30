<?php

echo "IF statement\n";

$teste = ["cenas"];
if (empty($teste)){
  echo "array 'teste' vazio.\n\n";
}else{
  echo "array 'teste2' nao vazio.\n\n";
}


echo "ELSEIF statement\n";
$hour = 21;

if($hour < 12){
  echo "Good Morning!\n\n";
}
elseif ($hour < 18){
  echo "Good afternnon!\n\n";
}
elseif ($hour < 22){
  echo "Good evening!\n\n";
}
else {
  echo "Good night!\n\n";
}


?>
