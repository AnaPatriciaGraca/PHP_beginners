<?php
require 'includes/database.php';
//de claração de variaveis
$errors=[];
$title = '';
$content = '';
$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  if ($title == ''){
    $errors[] = 'Title is required';
  }
  if($content == ''){
    $errors[] = 'Content is required';
  }
  if($published_at != ''){
    // expected format -> see documentation (YYYY-MM-DD HH:MM:SS) retorna falso se nao conseguiu fazer o parsing
    $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);
    if ($date_time === false) {
      $errors[] = 'Please enter a valid form "yyyy-mm-dd hh:mm:ss"';
    }else{
      //varifica se a data existe (exemplo: 30 de Fevereiro)
      $date_errors = date_get_last_errors();
      if ($date_errors['warning_count'] > 0){
        $errors[] = 'Invalid date and time';
      }
    }
  }


  if(empty($errors)){
    $conn = getDB();
    var_dump($errors);

    //avoid SQL injection with mysqli_escape_string()
    /*  $sql = "INSERT INTO article(title, content, publiched_at)
    VALUES('" . mysqli_escape_string($conn, $_POST['title']) . "', '"
    . mysqli_escape_string($conn, $_POST['content']) . "', '"
    . mysqli_escape_string($conn, $_POST['publiched_at']) . "')"; */
    $sql = "INSERT INTO article(title, content, published_at)
    VALUES(?, ?, ?)";

    //  $results = mysqli_query($conn, $sql);
    //alternative to mysqli_escape_string()
    $stmt = mysqli_prepare($conn, $sql);


    if ($stmt === false) { 
      echo mysqli_error($conn);
    } else {
      //para nao inserir a data 0000-00-00 00:00 na base de dados (tem de ser antes do bind)
      if ( $published_at == ''){
        $published_at = null;
      }

      // use stmt to insert the 3 strings (se a ultima for null o servidor reconhece)
      mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);
      if (mysqli_stmt_execute($stmt)){
        //return the automatic id created
        $id = mysqli_insert_id($conn);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
          $protocol = 'https';
      } else {
          $protocol = 'http';
      }

      header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/article.php?id=$id");
      exit;

      }else{
        echo_stmt_error($stmt);
      }
    }
  }
}

 ?>

<?php require 'includes/header.php';?>

<h2>New Article</h2>
<?php
  if (!empty($errors)):?>
    <ul>
      <?php
        foreach ($errors as $error):?>
          <li><?=$error ?></li>
        <?php endforeach; ?>
    </ul>
  <?php endif; ?>

<form method="post">

  <div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value=<?= htmlspecialchars($title)?>>
  </div>

  <div>
    <label for="content">Content</label>
    <textarea name="content" rows="4" cols="40" id="content" placeholder="Article Content"><?= htmlspecialchars($content)?></textarea>
  </div>

  <div>
    <label for="published_at">Publication date and time</label>
    <input type="datetime-local" name="published_at" id="published_at" value=<?= $published_at?>>
  </div>

  <button>Add</button>



</form>


<?php require 'includes/footer.php';?>
