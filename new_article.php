<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

require 'includes/database.php';

  $sql = "INSERT INTO article(title, content, publiched_at)
          VALUES('" . $_POST['title'] . "', '"
                    . $_POST['content'] . "', '"
                    . $_POST['publiched_at'] . "')";


  $results = mysqli_query($conn, $sql);


  if ($results === false) {
      echo mysqli_error($conn);
  } else {
      //return the automatic id created
      $id = mysqli_insert_id($conn);
      echo "Inserted record with ID: $id";
  }

}

 ?>

<?php require 'includes/header.php';?>

<h2>New Article</h2>

<form method="post">

  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title">
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="4" cols="40" id="content" placeholder="Article Content"></textarea>
  </div>

  <div>
    <label for="published_at">Publication date and time</label>
    <input type="datetime-local" name="publiched_at" id="published_at">
  </div>

  <button>Add</button>



</form>


<?php require 'includes/footer.php';?>
