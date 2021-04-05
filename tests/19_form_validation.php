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
<!-- <form method="post" novalidate> nao valida dados mas apresenta alterações no teclado dos dispositivos moveis-->

<!-- One way of doing labels-->
  <fieldset>
    <legend> Article </legend>
    <div>
      <label for="title">Title:</label>
      <input id="title" type="text" name="title" value="Title" readonly>
    </div>
    <div>
      <label for="content">Content:</label>
      <textarea autofocus id="content" name="content" rows="4" cols="40" placeholder="Content"></textarea>
    </div>
    <div>
      <label for="lang">Language</label>
        <select name="lang" id="lang" disabled>
          <option value="en">English</option>
          <option value="fr">French</option>
          <option value="es">Spanish</option>
        </select>
      </label>
    </div>
  </fieldset>
  <br>

<!-- Another way of doing labels >> ONLY VALID FOR RADIO AND CHECKBOXES-->

  <fieldset>
    <legend>Which food do you like the most?</legend>
    <div>
        <label><input type="radio" name="food" value="fish" checked>Fish</label><br>
        <label><input type="radio" name="food" value="vegetables">Vegetables</label><br>
        <label><input type="radio" name="food" value="bief">Bief</label><br>
        <label><input type="radio" name="food" value="fruit">Fruit</label>
    </div>
  </fieldset>
  <br>

  <fieldset>
    <legend>For validation</legend>
    <div><!-- https://www.html5pattern.com/Postal_Codes -->
      postcode: <input name="postcode"
      pattern="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}"
      title="Please enter a valid UK postcode">
    </div>
    <div>
      email: <input name="email" type="email" required>
    </div>
    <div>
      url: <input name="url" type="url">
    </div>
    <div>
      number: <input name="count" type="number" min="1" max="10">
    </div>

  </fieldset>
    <br><button>Send</button>

</form><!--exemplo: SW1A 1AA-->

</body>
</html>
