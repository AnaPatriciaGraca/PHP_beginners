<?php
//only print the array if the form was submited
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  var_dump($_POST);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Forms</title>
    <meta charset="utf-8">
</head>
<body>

<form method="post">

    <p>Which colours do you like?</p>
    <div>
        <input type="checkbox" name="colours[]" value="red"> Red
    </div>
    <div>
        <input type="checkbox" name="colours[]" value="green"> Green
    </div>
    <div>
        <input type="checkbox" name="colours[]" value="blue"> Blue
    </div>
    <p></p>

    <div>
        <input type="checkbox" name="terms" value="yes" checked> I agree to the terms
    </div>

    <p>Which food do you like the most?</p>
    <div>
        <input type="radio" name="food" value="fish" checked>Fish<br>
        <input type="radio" name="food" value="vegetables">Vegetables<br>
        <input type="radio" name="food" value="bief">Bief<br>
        <input type="radio" name="food" value="fruit">Fruit
    </div>

    <button>Send</button>

</form>

</body>
</html>
