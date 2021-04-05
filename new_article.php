<?php
require 'includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $conn = getDB();

//avoid SQL injection with mysqli_escape_string()
/*  $sql = "INSERT INTO article(title, content, publiched_at)
          VALUES('" . mysqli_escape_string($conn, $_POST['title']) . "', '"
                    . mysqli_escape_string($conn, $_POST['content']) . "', '"
                    . mysqli_escape_string($conn, $_POST['publiched_at']) . "')"; */
    $sql = "INSERT INTO article(title, content, publiched_at)
            VALUES(?, ?, ?)";

//  $results = mysqli_query($conn, $sql);
  $stmt = mysqli_prepare($conn, $sql);


  if ($stmt === false) {
      echo mysqli_error($conn);
  } else {
      mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['publiched_at'] );
      if (mysqli_stmt_execute($stmt)){
        //return the automatic id created
        $id = mysqli_insert_id($conn);
        echo "Inserted record with ID: $id";
      }else{
        echo_stmt_error($stmt);
      }

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
