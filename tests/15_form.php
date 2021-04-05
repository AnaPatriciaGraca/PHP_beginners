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
    <!-- name atribute allows to submit to the server and not to itself -->
    <div>
      <input name="search" value="username">
      <input name="password" type="password">
    </div>
    <!--input types: https://devdocs.io/html/element/input -->
    <div>
      date : <input name="date" type="date">
    </div>
    <!-- you can see the value on page source code! DO NOT USE FOR SENSITIVE DATA-->
    <div>
      hidden : <input name="hidden" type="hidden" value="1234">
    </div>
    <div>
      textarea: <textarea name="content" rows="7" cols="50">Hello</textarea>
    </div>
    <button>Send</button>

</form>

</body>
</html>
