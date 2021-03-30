<?php

echo "SWITCH\n";

$day = "Sun";

switch ($day){
  case "Mon": echo "Monday\n"; break;
  case "Tue": echo "Tuesday\n"; break;
  case "Wed": echo "Wednesday\n"; break;
  case "Thu": echo "Thursday\n"; break;
  case "Fri": echo "Friday\n"; break;
  case "Sat": echo "Saturday\n"; break;
  case "Sun"; echo "Sunday\n"; break;
  default: echo "No information available for that day.";
}



$array = [];

for ($i = 1; $i <= 10; $i++) {

    if ($i < 4){
        $array[] = "a";
    }elseif ( $i>=4 && $i <=7) {
        $array[] = "b";
    }else {
        $array[] = "c";
    }

}
var_dump($array);

?>
