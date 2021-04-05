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

<!-- One way of doing labels-->
  <fieldset>
    <legend> Article </legend>
    <div>
      <label for="title">Title:</label>
      <input id="title" type="text" name="title" placeholder="Article title">
    </div>
    <div>
      <label for="content">Content:</label>
      <textarea id="content" name="content" rows="4" cols="40" placeholder="Content"></textarea>
    </div>
  </fieldset>
  <br>

<!-- Another way of doing labels >> ONLY VALID FOR RADIO AND CHECKBOXES-->
  <fieldset>
    <legend>Attributes</legend>
    <div>
      <label><input type="checkbox" name="visible" value="yes">Visible</label>
    </div>
  </fieldset>
  <br>

  <fieldset>
    <legend>Which food do you like the most?</legend>
    <div>
        <label><input type="radio" name="food" value="fish" checked>Fish</label><br>
        <label><input type="radio" name="food" value="vegetables">Vegetables</label><br>
        <label><input type="radio" name="food" value="bief">Bief</label><br>
        <label><input type="radio" name="food" value="fruit">Fruit</label>
    </div>
  </fieldset>
    <br><button>Send</button>

</form>

</body>
</html>
